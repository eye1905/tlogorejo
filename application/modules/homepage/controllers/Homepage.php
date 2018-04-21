<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Homepage extends MY_Controller {


	function __construct() {
		    parent::__construct();
		    $this->load->model("M_struktur");
		    $this->load->model("M_slider");
		    $this->load->model("berita/M_berita");
		    $this->load->model("admin/M_lembaga");
		    ini_set('display_errors', 0);
	}

	public function index() {
		$data['struktur'] = $this->M_struktur->get_data_list();
		$data['slider'] = $this->M_slider->get_data_list();
		$data['berita'] = $this->M_berita->get_artikel_limit(6);
		$data['lembaga'] = $this->M_lembaga->get_data(0);
		$this->template->load('homepage_template', 'homepage/homepage_view', $data);
	}
}