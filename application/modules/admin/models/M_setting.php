<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends Model_Utama
{	

	function __construct() {
		parent::__construct();
		$this->table = "setting";
		$this->primary_key = "id";
		$this->like = "nama";
		$this->order_by = "id";
	}
}
