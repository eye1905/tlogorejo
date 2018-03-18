<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Homepage extends MY_Controller {

	function __construct() {
	    parent::__construct();
	    $this->load->model('M_blog');
	}
 
    public function index()
    {
    	$data['artikel'] = $this->M_blog->get_data();
       	$this->load->view('homepage_template', $data);
    }
}