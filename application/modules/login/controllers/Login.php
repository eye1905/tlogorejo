<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Login extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_login');
    	if ($this->session->userdata('loged_in') != null){
    		redirect('admin');
	    }
	}

	function index() {
		$this->load->view('login_index_view');
	}

	function auth(){
	    $username = htmlspecialchars($this->input->post('user_id',TRUE),ENT_QUOTES);
	    $password = htmlspecialchars($this->input->post('user_password',TRUE),ENT_QUOTES);

	    $check_user = $this->M_login->auth_user($username, $password);

	    if ($check_user->num_rows() > 0){ // jika login sebagai admin
		    $data = $check_user->row_array();
		    $this->session->set_userdata('loged_in', TRUE);
		    if($data['user_level'] == '1'){ // Akses admin
		        $this->session->set_userdata('ses_akses', 'Admin');
		        $this->session->set_userdata('ses_id', $data['user_id']);
		        $this->session->set_userdata('ses_nama', $data['user_nama']);
		        redirect('admin', $data);
		    }
	    }
	    else {
	    	redirect('login');
	    }
	}

	function logout(){
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }
}