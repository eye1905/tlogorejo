<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_struktur extends Model_Utama
{	

	function __construct() {
		parent::__construct();
		$this->table = "struktur";
		$this->primary_key = "id";
		$this->like = "nama";
		$this->order_by = "id";
	}

	public function getStruktur()
	{
		$this->db->where("soft_delete", "1");
		$this->db->order_by($this->order_by, 'asc');
		return $this->db->get($this->table)->result();
	}
}
