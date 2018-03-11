<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_kabupaten extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_kabupaten");
		    $this->load->library('form_validation');
		    $this->load->library('pagination');
		    $this->load->database();
		    $this->load->helper(array('url'));
		}

    public function index()
    {
 		$jumlah_data = $this->M_kabupaten->jumlah_data();
 		$config['base_url'] = base_url().'admin/C_kabupaten/index/';
		$config['total_rows'] = $jumlah_data;

		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['provinsi'] = $this->M_kabupaten->get_provinsi();
 		$data['aku'] = $this->M_kabupaten->index($config['per_page'],$from);
 		$this->template->load('admin_template', 'kabupaten_view', $data);
    }

    public function get_provinsi()
    {
 		$data = $this->M_kabupaten->get_provinsi();
 		echo json_encode($data);
    }

}