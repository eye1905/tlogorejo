<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kota extends Model_Utama
{	

	function __construct() {
		parent::__construct();
		$this->table = "propinsi";
		$this->primary_key = "id_provinsi";
		$this->like = "nama_provinsi";
		$this->order_by = "nama_provinsi";
	}
	
}
