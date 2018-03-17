<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kecamatan extends Model_Utama
{	
	function __construct() {
		parent::__construct();
		$this->table = "kecamatan";
		$this->primary_key = "id_kecamatan";
		$this->like = "nama_kecamatan";
		$this->order_by = "nama_kecamatan";
	}
	
}