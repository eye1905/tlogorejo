<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_kabupaten extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_kabupaten");
		    $this->load->model("M_kota");
		    $this->load->library('form_validation');
		    $this->load->library('pagination');
		    $this->load->database();
		    $this->load->helper(array('url'));
		}

    public function index()
    {
 		error_reporting(0);
 		$jumlah_data = $this->M_kabupaten->jumlah_data();
 		$config['base_url'] = base_url().'admin/C_kabupaten/index/';
		$config['total_rows'] = $jumlah_data;

		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['provinsi'] = $this->M_kota->index($config['per_page'],$from);
		$kabupaten = $this->M_kabupaten->index();

		foreach ($kabupaten as $key => $value) {
				$k_data[] = $value;
		}

		$data['kabupaten'] = $k_data;
 		$this->template->load('admin_template', 'kabupaten_view', $data);
    }

    public function get_provinsi()
    {
 		$data = $this->M_kabupaten->get_provinsi();
 		echo json_encode($data);
    }

    public function insert()
    {
    	$this->form_validation->set_rules('pilih_provinsi','Nama Provinsi', 'required');
    	$this->form_validation->set_rules('nama_kabupaten','Nama kabupaten', 'required');

    	if ($this->form_validation->run() == FALSE){
    	$id = strip_tags($this->input->post('id_kabupaten'));

    	$data = array('id_provinsi' => strip_tags($this->input->post('pilih_provinsi')),
    					'nama_kabupaten' => strip_tags($this->input->post('nama_kabupaten')),
 						'status' => '1',
 						'log_time' => date("Y-m-d h:i:sa")
 					);
    		$insert = $this->M_kabupaten->tambah($data);
    		redirect('admin/C_kabupaten/index');
    	}
    }

}