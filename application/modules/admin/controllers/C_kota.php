<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_kota extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_daerah");
		    $this->load->library('form_validation');
		    $this->load->library('pagination');
		    $this->load->database();
		    $this->load->helper(array('url'));
		    ini_set('display_errors', 0);

		    //validasi jika user belum login
		   	if($this->session->userdata('loged_in') != TRUE){
		        $url = base_url();
		        redirect($url);
		    }
		}

    public function index()
    {
 		$config['base_url'] = base_url().'admin/C_kota/index/';
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);	

 		$data['provinsi'] = $this->M_daerah->index();
 		$data['kabupaten'] = $this->M_daerah->get_kabupaten();
 		
 		$data['kecamatan'] = $this->M_daerah->get_kecamatan($config['per_page'], $from);
 		$data['desa'] = $this->M_daerah->get_desa();
 		$this->template->load('admin_template', 'kota_view', $data);
    }

    public function get_kabupaten()
    {
    	$id = $this->input->post('pilih_provinsi');
 		$data = $this->M_daerah->get_by_id_provinsi($id);
 		
 		echo json_encode($data);
    }

    public function get_kecamatan()
    {
    	$id = $this->input->post('pilih_kabupaten');
 		$data = $this->M_daerah->get_by_id_provinsi($id);
 		
 		echo json_encode($data);
    }
}