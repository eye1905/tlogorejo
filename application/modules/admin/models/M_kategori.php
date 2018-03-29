<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
	
	var $table = 'artikel_kategori';

	public function get_data() {
		$query = $this->db->query("SELECT * FROM $this->table");
		return $query->result();
	}

	function get_kategori($slug = FALSE) {
		if($slug === FALSE) {
			$query = $this->db->get($this->table);
			return $query->result();
		}

		$query = $this->db->get_where($this->table, array('kategori_slug' => $slug));
		return $query->result();
	}	
}