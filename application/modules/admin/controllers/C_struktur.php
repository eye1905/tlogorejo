<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_struktur extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_struktur");
		    ini_set('display_errors', 0);

		    //validasi jika user belum login
		    // 	if($this->session->userdata('loged_in') != TRUE){
		    //      $url = base_url();
		    //      redirect($url);
		    // }
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
 		$data['struktur'] = $this->M_struktur->get_data_list();
 		$this->template->load('admin_template', 'struktur_view', $data);
    }
}