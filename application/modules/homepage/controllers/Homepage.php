<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Homepage extends MY_Controller {


	function __construct() {
		    parent::__construct();
		    $this->load->model("M_struktur");
		    ini_set('display_errors', 0);
	}

	public function index() {
		$data['struktur'] = $this->M_struktur->get_data_list();
		$this->template->load('homepage_template', 'homepage/homepage_view', $data);
	}
}