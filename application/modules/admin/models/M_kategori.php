<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
	
	var $table = 'artikel_kategori';

	// Read
	public function get_data($status) {
		$query = $this->db->query("SELECT * FROM $this->table WHERE kategori_soft_delete = '$status'");
		return $query->result();
	}

	// Insert
	function save_data($table, $data)
	{
	    $this->db->insert($table, $data);
	}

	// Update
	function update_data($table, $where, $data)
	{
	    $this->db->where($where);
	    $this->db->update($table, $data);
	}

	// Delete
	function delete_data($table, $where)
	{
	    $this->db->where($where);
	    $this->db->delete($table);
	}

	function get_kategori($slug = FALSE) {
		if($slug === FALSE) {
			$query = $this->db->query("SELECT * FROM $this->table WHERE kategori_soft_delete = '0'");
			return $query->result();
		}

		$query = $this->db->get_where($this->table, array('kategori_slug' => $slug, 'kategori_soft_delete' => FALSE));
		return $query->result();
	}	
}