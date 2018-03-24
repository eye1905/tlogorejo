<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Read extends MY_Controller {

	public function index() {
		$this->template->load('homepage_template', 'read_berita_view');
	}
}