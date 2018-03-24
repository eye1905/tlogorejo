<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_daerah extends Model_Utama
{	

	function __construct() {
		parent::__construct();
		$this->table = "provinces";
		$this->primary_key = "id";
		$this->like = "name";
		$this->order_by = "name";
	}

	public function get_kabupaten()
	{
		$this->db->order_by("name", 'asc');
		return $this->db->get("regencies")->result();
	}

	public function get_kecamatan($number, $offset)
	{
		$this->db->order_by("name", 'asc');
		return $this->db->get("districts", $number, $offset)->result();
	}

	public function get_desa($number, $offset)
	{
		$this->db->order_by("name", 'asc');
		return $this->db->get("villages")->result();
	}

	public function jumlah_data()
	{
		return $this->db->get("villages")->num_rows();
	}

	public function get_by_id_provinsi($id)
	{
		$this->db->from("regencies");
		$this->db->where("province_id", $id);
		return $this->db->get()->result();
	}

	public function get_by_id_kabupaten($id)
	{
		$this->db->from("regencies");
		$this->db->where("province_id", $id);
		return $this->db->get()->result();
	}
}
