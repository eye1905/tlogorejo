<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_berita extends CI_Model
{
	var $table = 'artikel_post';
	
	function get_data() {
		$query = $this->db->query("SELECT * FROM $this->table");
		return $query->result();
	}
}