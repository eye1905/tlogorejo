<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_kota extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_kota");
		    $this->load->library('form_validation');
		    $this->load->library('pagination');
		    $this->load->database();
		    $this->load->helper(array('url'));
		}

    public function index()
    {
 		$jumlah_data = $this->M_kota->jumlah_data();
 		$config['base_url'] = base_url().'admin/C_kota/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 4;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);	

 		$data['aku'] = $this->M_kota->index($config['per_page'],$from);
 		$this->template->load('admin_template', 'kota_view', $data);
    }
    public function simpan_provinsi()
    {
 		$this->form_validation->set_rules('provinsi','Nama Provinsi', 'required');
 		$data = array('nama_provinsi' => $this->input->post('provinsi'),
 						'status' => '1',
 						'log_time' => date("Y-m-d h:i:sa")
 						);

 		if ($this->form_validation->run() == FALSE){
				echo json_encode("Jangan Kosongi Kolom");
			}else{
				$insert = $this->M_kota->tambah($data);
				if ($insert) {
 					echo json_encode("success");
 				}
            }
    }

    public function select_provinsi()
    {
 		$id = $this->input->post('id_provinsi');
 		$data = $this->M_kota->get_by_id($id);

		echo json_encode($data);
    }

    public function update_provinsi()
    {
 		$this->form_validation->set_rules('provinsi','Nama Provinsi', 'required');
 		$data = array('nama_provinsi' => $this->input->post('provinsi'),'id_provinsi' => $this->input->post('id_provinsi'));

 		if ($this->form_validation->run() == FALSE){
				echo json_encode("Jangan Kosongi Kolom");
			}else{
				$insert = $this->M_kota->kota_update(array('id_provinsi' => $this->input->post('id_provinsi')), $data);				
 				echo json_encode("success");
        }
    }

    public function delete_provinsi()
    {
 		$data = array('id_provinsi' => $this->input->post('id_provinsi'),
 						'status' => '0',
 						'log_time' => date("Y-m-d h:i:sa")
 						);
 		$insert = $this->M_kota->kota_update(array('id_provinsi' => $this->input->post('id_provinsi')), $data);				
 		
 		echo json_encode("success");
    }
}