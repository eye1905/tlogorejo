<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Blog extends MY_Controller {

	function __construct() {
    	parent::__construct();
	}

	public function index() {
		$this->template->load('admin_template', 'blog/blog_index_post_view');
	}

	public function draft() {
		$this->template->load('admin_template', 'blog/blog_draft_post_view');
	}

	public function form() {
		$this->template->load('admin_template', 'blog/blog_add_post_view');
	}

	public function kategori() {
		$this->template->load('admin_template', 'blog/blog_kategori_view');
	}
}