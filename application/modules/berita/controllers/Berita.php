<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Berita extends MY_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('admin/M_kategori');
    	$this->load->model('M_berita');
	}

	public function index() {
		$data['kategori'] = $this->M_kategori->get_data();
		// $data['berita'] = $this->M_berita->get_data();
		$data['berita'] = $this->M_berita->get_artikel();
		$this->template->load('homepage_template', 'berita_view', $data);
	}

	public function read($slug = NULL) {
		$data['kategori'] = $this->M_kategori->get_data();
		// $data['berita'] = $this->M_berita->get_artikel_by_id($id);
		$data['berita'] = $this->M_berita->get_artikel($slug);
		if (empty($data['berita'])) {
			show_404();
		}
		$this->template->load('homepage_template', 'read_berita_view', $data);
	}
}