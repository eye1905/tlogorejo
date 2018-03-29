<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sumber_dana extends Model_Utama
{	

	function __construct() {
		parent::__construct();
		$this->table = "sumber_dana";
		$this->primary_key = "id_sumber";
		$this->like = "nama_sumber";
		$this->order_by = "nama_sumber";
	}

	public function get_by_field($val)
	{
		$this->db->from($this->table);
		$this->db->like("nama_sumber", $val);
		$query = $this->db->get();

		return $query->row();
	}
}
