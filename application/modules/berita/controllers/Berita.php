<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Berita extends MY_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('admin/M_kategori');
	}

	public function index() {
		$data['kategori'] = $this->M_kategori->get_data();
		$this->template->load('homepage_template', 'berita_view', $data);
	}

	public function read($id) {
		$data['kategori'] = $this->M_kategori->get_data();
		if(isset($id)) {
			$this->template->load('homepage_template', 'read_berita_view', $data);
		}
	}
}