<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_struktur extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_struktur");
		    ini_set('display_errors', 0);

		    //validasi jika user belum login
		    	if($this->session->userdata('loged_in') != TRUE){
		         $url = base_url();
		         redirect($url);
		    }
		}

    public function index()
    {
 		$data['struktur'] = $this->M_struktur->get_data_list();
 		$this->template->load('admin_template', 'struktur_view', $data);
    }
}