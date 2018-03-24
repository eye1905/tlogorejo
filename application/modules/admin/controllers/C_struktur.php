<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_struktur extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_struktur");
		    ini_set('display_errors', 0);
		}

    public function index()
    {
 		$data['struktur'] = $this->M_struktur->index();
 		$this->template->load('admin_template', 'struktur_view', $data);
    }
}