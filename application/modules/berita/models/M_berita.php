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

	function get_artikel($slug = FALSE) {
		if($slug === FALSE) {
			$query = $this->db->get('artikel_post');
			return $query->result();
		}

		$query = $this->db->get_where('artikel_post', array('artikel_slug' => $slug));
		return $query->result();
	}

	function get_artikel_by_kategori($slug = FALSE) {
		if($slug === FALSE) {
			$query = $this->db->query("
				SELECT * FROM artikel_post JOIN artikel_kategori ON 
				artikel_kategori.kategori_id = artikel_post.artikel_kategori 
				WHERE artikel_kategori.kategori_slug = '$slug'
				");
			return $query->result();
		}

		$query = $this->db->query("
			SELECT * FROM artikel_post JOIN artikel_kategori 
			ON artikel_kategori.kategori_id = artikel_post.artikel_kategori 
			WHERE artikel_kategori.kategori_slug = '$slug'
			");
		return $query->result();
	}
}