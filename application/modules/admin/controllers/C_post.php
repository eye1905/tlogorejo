<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class C_post extends MY_Controller {

	function __construct() {
    	parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
    	$this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');

        // Load Model

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('/', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
	}

    public function index() {
        $data['icon'] = 'fa fa-link';
        $data['header'] = 'Daftar Postingan';
        $this->template->load('admin_template', 'post/post_index_view', $data);
    }

    public function create() {
        $data['icon'] = 'fa fa-link';
        $data['header'] = 'Membuat Postingan';
        $this->template->load('admin_template', 'post/post_create_view', $data);
    }

    public function edit($id = 0) {
        $data['icon'] = 'fa fa-link';
        $data['header'] = 'Edit Postingan';
        $this->template->load('admin_template', 'post/post_edit_view', $data);
    }

}