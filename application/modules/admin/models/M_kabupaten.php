<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kabupaten extends Model_Utama
{	
	function __construct() {
		parent::__construct();
		$this->table = "kabupaten";
		$this->primary_key = "id_kabupaten";
		$this->like = "nama_kabupaten";
		$this->order_by = "nama_kabupaten";
	}
	
}