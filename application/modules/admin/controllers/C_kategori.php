<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class C_kategori extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->library('session');
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('M_kategori');

		//validasi jika user belum login
	    if($this->session->userdata('loged_in') != TRUE){
            $url = base_url();
            redirect($url);
	    }
	}

	function index() {
		$data['kategori'] = $this->M_kategori->get_data(FALSE);
		$data['kategori_nonaktif'] = $this->M_kategori->get_data(TRUE);
		$this->template->load('admin_template', 'kategori/kategori_index_view', $data);
	}

	function save() {
		$this->form_validation->set_rules('kategori_nama', 'Nama Kategori', 'required');
		if ($this->form_validation->run() == FALSE) {
			echo "
			    <script>
			        alert('Gagal menyimpan data!');
			        window.location.href='".base_url('admin/C_kategori')."';
			    </script>";
		}
		else {
			$slug = url_title($this->input->post('kategori_nama'), 'dash', TRUE);

			$data = array(
				'kategori_nama' => $this->input->post('kategori_nama'),
				'kategori_slug' => $slug,
				'kategori_soft_delete' => FALSE,
				'kategori_log_time' => date('Y-m-d H:i:s')
			);

			$this->M_kategori->save_data('artikel_kategori', $data);
			echo "
			    <script>
			        alert('Sukses menyimpan data!');
			        window.location.href='".base_url('admin/C_kategori')."';
			    </script>";
		}
	}

	function delete() {
	    $data = array('kategori_soft_delete' => TRUE, 'kategori_log_time' => date('Y-m-d H:i:s'));
	    $where = array('kategori_id' => $this->input->get('id'));

	    $this->M_kategori->update_data('artikel_kategori', $where, $data);
	    echo "
	        <script>
	            alert('Sukses menghapus data!');
	            window.location.href='".base_url('admin/C_kategori')."';
	        </script>";
	}

	function restore() {
	    $data = array('kategori_soft_delete' => FALSE, 'kategori_log_time' => date('Y-m-d H:i:s'));
	    $where = array('kategori_id' => $this->input->get('id'));

	    $this->M_kategori->update_data('artikel_kategori', $where, $data);
	    echo "
	        <script>
	            alert('Sukses memulihkan data!');
	            window.location.href='".base_url('admin/C_kategori')."';
	        </script>";
	}
}