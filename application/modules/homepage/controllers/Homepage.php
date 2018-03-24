<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Homepage extends MY_Controller {

	public function index() {
		$this->template->load('homepage_template', 'homepage/homepage_view');
	}
}