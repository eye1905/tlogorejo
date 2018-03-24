<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_role_struktur extends Model_Utama
{	

	function __construct() {
		parent::__construct();
		$this->table = "role_struktur";
		$this->primary_key = "id_role";
		$this->like = "nama_role";
		$this->order_by = "prioritas_role";
	}

	public function get_by_field($ide)
	{
		$this->db->from($this->table);
		$this->db->where($this->order_by, $ide);
		$query = $this->db->get();

		return $query->row();
	}
}
