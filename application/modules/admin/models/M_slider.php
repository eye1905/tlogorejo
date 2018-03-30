<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_slider extends Model_Utama
{	

	function __construct() {
		parent::__construct();
		$this->table = "slider";
		$this->primary_key = "id_slider";
		$this->like = "judul";
		$this->order_by = "judul";
	}
}
