<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_lembaga extends CI_Model {

	var $table = 'lembaga';
	
	// Read
	function get_data($status) {
		$query = $this->db->query("SELECT * FROM $this->table WHERE lembaga_soft_delete = '$status'");
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

	function get_lembaga_by_id($lembaga_id, $status) {
		$query = $this->db->query("SELECT * FROM $this->table WHERE lembaga_id = '$lembaga_id' AND lembaga_soft_delete = '$status'");
		return $query->result();
	}
}