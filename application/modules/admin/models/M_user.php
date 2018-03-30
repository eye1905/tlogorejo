<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_user extends CI_Model {

	var $table = 'users';
	
	// Read
	function get_data($status) {
		$query = $this->db->query("SELECT * FROM $this->table WHERE user_status = '$status'");
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
}