<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Lembaga extends MY_Controller
{
	
	function __construct() {
    	parent::__construct();
    	$this->load->model('admin/M_lembaga');
	}

	function r($slug = NULL) {
		$data['lembaga'] = $this->M_lembaga->get_lembaga_by_slug($slug);
		if (empty($data['lembaga'])) {
			$this->template->load('homepage_template', 'lembaga_read_view', $data);	
		}
		else {
			$this->template->load('homepage_template', 'lembaga_read_view', $data);
		}
	}
}