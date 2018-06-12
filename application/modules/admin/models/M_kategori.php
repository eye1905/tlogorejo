<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
	
	var $table = 'kategori';

	// Read
	public function get_all() {
		$query = $this->db->query("SELECT * FROM $this->table");
		return $query->result();
	}

	public function get_data($status) {
		$query = $this->db->query("SELECT * FROM $this->table WHERE status = '$status'");
		return $query->result();
	}

	function get_kategori($slug = FALSE) {
		if($slug === FALSE) {
			$query = $this->db->query("SELECT * FROM $this->table WHERE status = '1'");
			return $query->result();
		}

		$query = $this->db->get_where($this->table, array('slug' => $slug, 'status' => TRUE));
		return $query->result();
	}	
}