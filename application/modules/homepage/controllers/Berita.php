<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Berita extends MY_Controller {

	public function index() {
		$this->template->load('homepage_template', 'berita/berita_view');
	}
}