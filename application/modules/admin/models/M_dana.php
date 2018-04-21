<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dana extends Model_Utama
{	

	function __construct() {
		parent::__construct();
		$this->table = "dana_masuk";
		$this->primary_key = "id";
		//$this->like = "nama_sumber";
		$this->order_by = "id";
	}

	public function get_by_field($val)
	{
		$this->db->from($this->table);
		$this->db->like("id_sumberdana", $val);
		$query = $this->db->get();

		return $query->row();
	}
}
