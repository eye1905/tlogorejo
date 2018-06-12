<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Home extends MY_Controller {


	function __construct() {
		$this->load->model('admin/M_kategori');
		$this->load->model('M_berita');
	}

	public function index() {
		$data['kategori'] = $this->M_kategori->get_kategori();
		$data['berita'] = $this->M_berita->get_artikel();
		$this->template->load('sites_template', 'home', $data);
	}

	public function read($slug = NULL) {
		if (!empty($slug)) {
			$data['kategori'] = $this->M_kategori->get_kategori();
			$berita = $this->M_berita->get_artikel($slug);
			if (!empty($berita)) {
				foreach ($berita as $row) {
					$data['artikel_judul'] = $row->judul;
					$data['artikel_isi'] = $row->konten;
					$data['artikel_image'] = $row->thumb;
					$data['artikel_author'] = $row->author;
					$data['artikel_tanggal'] = $row->created_at;
				}
				$this->template->load('sites_template', 'post', $data);
			}
			else {
				show_error('404');
			}
		}
		else {

		}
	}

	public function category($slug = NULL) {
		$data['kategori'] = $this->M_kategori->get_kategori();
		$data['berita_kategori'] = $this->M_berita->get_artikel_by_kategori($slug);
		if (empty($data['berita_kategori'])) {
			// show_404();
			$this->template->load('sites_template', 'kategori', $data);
		}
		else {
			$this->template->load('sites_template', 'kategori', $data);
		}
	}
}