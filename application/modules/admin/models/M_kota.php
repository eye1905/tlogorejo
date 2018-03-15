<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kota extends CI_Model
{	

	var $table = "propinsi";

	public function index($number, $offset)
	{
	$this->db->where('status', '1');
	$this->db->order_by('nama_provinsi', 'asc');
	return $this->db->get($this->table, $number,$offset)->result_array();
	}

	public function get_filter($value ,$number, $offset)
	{
	$this->db->where('status', '1');
	$this->db->like('nama_provinsi', $value);
	$this->db->order_by('nama_provinsi', 'asc');
	return $this->db->get($this->table, $number,$offset)->result();
	}

	public function tambah($data)
	{
		$insert = $this->db->insert('propinsi', $data);
		return $insert;
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_provinsi',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function kota_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function jumlah_data()
	{
		return $this->db->get('propinsi')->num_rows();
	}
}
