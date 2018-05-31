<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_base extends CI_Model {

	// Insert
	function save_data($table, $data)
	{
	    $this->db->insert($table, $data);
	    return $this->db->affected_rows();
	}

	// Update
	function update_data($table, $where, $data)
	{
	    $this->db->where($where);
	    $this->db->update($table, $data);
	    return $this->db->affected_rows();
	}

	// Delete
	function delete_data($table, $where)
	{
	    $this->db->where($where);
	    $this->db->delete($table);
	    return $this->db->affected_rows();
	}
}