<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_kecamatan extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_kabupaten");
		    $this->load->model("M_kota");
		    $this->load->model("M_kecamatan");
		    $this->load->library('form_validation');
		    $this->load->library('pagination');
		    $this->load->database();
		    $this->load->helper(array('url'));
		    ini_set('display_errors', 0);
		}

    public function index()
    {
 		$jumlah_data = $this->M_kabupaten->jumlah_data();
 		$config['base_url'] = base_url().'admin/C_kabupaten/index/';
		$config['total_rows'] = $jumlah_data;

		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);


		$data['provinsi'] = $this->M_kota->get_data_list();
		$data['kabupaten'] = $this->M_kabupaten->index();
 		$this->template->load('admin_template', 'kecamatan_view', $data);
    }

    public function get_provinsi()
    {
 		$data = $this->M_kota->get_data_list();
 		foreach ($data as $key => $value) {
 				$a_data[$key]['ideprov']= $value->id_provinsi;
 				$a_data[$key]['namaprov']= $value->nama_provinsi;
 		}

 		echo json_encode($a_data);
    }

    public function insert()
    {
    	$this->form_validation->set_rules('pilih_provinsi','Nama Provinsi', 'required');
    	$this->form_validation->set_rules('nama_kabupaten','Nama kabupaten', 'required');

    	if ($this->form_validation->run() == FALSE){
				echo json_encode("Jangan Kosongi Kolom !");
			}else{

				$data = array('id_provinsi' => strip_tags($this->input->post('pilih_provinsi')),
						'nama_kabupaten' => strip_tags($this->input->post('nama_kabupaten')),
 						'status' => '1',
 						'log_time' => date("Y-m-d h:i:sa")
 						);

				$insert = $this->M_kabupaten->tambah_data($data);
				if ($insert) {
 					echo json_encode("success");
 				}
        }
    }

     public function select_kabupaten()
    {
 		$id = $this->input->post('id_provinsi');
 		$data = $this->M_kabupaten->get_by_id_provinsi($id);

		echo json_encode($data);

    }

     public function update()
    {
 		$this->form_validation->set_rules('pilih_provinsi','Nama Provinsi', 'required');
    	$this->form_validation->set_rules('nama_kabupaten','Nama kabupaten', 'required');

 		$data = array('nama_kabupaten' => strip_tags($this->input->post('nama_kabupaten')),
 						'id_provinsi' => strip_tags($this->input->post('pilih_provinsi')),
 						'log_time' => date("Y-m-d h:i:sa")
 					);

 		if ($this->form_validation->run() == FALSE){
				echo json_encode("Jangan Kosongi Kolom");
			}else{
				$insert = $this->M_kabupaten->update(array('id_kabupaten' => $this->input->post('id_kabupaten')), $data);	
				if ($insert) {
					echo json_encode("success");
				}	
        }
    }

    public function delete_kabupaten()
    {
 		$data = array('id_kabupaten' => $this->input->post('id_kabupaten'),
 						'status' => '0',
 						'log_time' => date("Y-m-d h:i:sa")
 						);

 		$insert = $this->M_kabupaten->update(array('id_kabupaten' => $this->input->post('id_kabupaten')), $data); 		
 		echo json_encode("success");
    }

    public function get_value()
    {
 		$viewpage = $this->input->post('page');
 		
 		echo json_encode($viewpage);
    }

    public function reload($value)
    {
		$config['per_page'] = $value;

		if ($value>500) {
			$config['per_page'] = $jumlah_data;
		}

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);	

		$data['provinsi'] = $this->M_kota->get_data_list();
		$data['kabupaten'] = $this->M_kabupaten->index($config['per_page'], $from);
 		$this->template->load('admin_template', 'kecamatan_view', $data);
    }

    public function view_nama($value)
    {
		$data['provinsi'] = $this->M_kota->get_data_list();
		$data['kabupaten'] = $this->M_kabupaten->get_filter($value);
 		$this->template->load('admin_template', 'kecamatan_view', $data);
    }
}