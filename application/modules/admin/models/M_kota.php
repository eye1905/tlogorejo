<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kota extends CI_Model
{	

	public function index()
	{
	$this->db->from('propinsi');
	$query=$this->db->get();
	return $query->result();
	}


	public function tambah($data)
	{
		$insert = $this->db->insert('propinsi', $data);
		return $insert;
	}
}
