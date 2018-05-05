<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends MY_Controller {
    // attr.
    private $data; // fix for HMVC

	function __construct() {
		parent::__construct();
		//validasi jika user belum login
	    /*if($this->session->userdata('loged_in') != TRUE){
            $url = base_url();
            redirect($url);
	    }*/
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');

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

    public function index()
    {
        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

        //list the users
        $this->data['users'] = $this->ion_auth->users()->result();
        foreach ($this->data['users'] as $k => $user)
        {
            $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }

        // $this->_render_page('auth/index', $this->data);
        $this->template->load('admin_template', 'admin/dashboard_view', $this->data);
    }
    public function homepage()
    {
 		
 		$data['aku'] = "Siapa Saja Yang Mau Makan nasi !";
 		$this->template->load('admin_template', 'dashboard_view', $data);
    }

	function logout(){
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }
}