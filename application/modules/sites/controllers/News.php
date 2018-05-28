<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class News extends MY_Controller {


	function __construct() {
	}

	public function index() {
		$this->template->load('sites_template', 'post');
	}
}