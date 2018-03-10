<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		}

    public function index()
    {
 		
 		$data['aku'] = "Siapa Saja Yang Mau Makan nasi !";
 		$this->template->load('admin_template', 'dashboard_view', $data);
    }
    public function homepage()
    {
 		
 		$data['aku'] = "Siapa Saja Yang Mau Makan nasi !";
 		$this->template->load('admin_template', 'dashboard_view', $data);
    }
}