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
			$query = $this->db->query("SELECT * FROM $this->table WHERE artikel_status = 1 AND artikel_soft_delete = 0 ORDER BY artikel_tanggal ASC");
			return $query->result();
		}

		$query = $this->db->get_where('artikel_post', array('artikel_slug' => $slug, 'artikel_status' => TRUE, 'artikel_soft_delete' => FALSE));
		return $query->result();
	}

	function get_artikel_by_kategori($slug = FALSE) {
		if($slug === FALSE) {
			$query = $this->db->query("
				SELECT * FROM artikel_post JOIN artikel_kategori ON 
				artikel_kategori.kategori_id = artikel_post.artikel_kategori 
				WHERE artikel_kategori.kategori_slug = '$slug'
				AND artikel_status = '1' AND artikel_soft_delete = '0'
				ORDER BY artikel_tanggal ASC
				");
			return $query->result();
		}

		$query = $this->db->query("
			SELECT * FROM artikel_post JOIN artikel_kategori 
			ON artikel_kategori.kategori_id = artikel_post.artikel_kategori 
			WHERE artikel_kategori.kategori_slug = '$slug'
			AND artikel_status = '1' AND artikel_soft_delete = '0'
			");
		return $query->result();
	}

	function get_artikel_limit($limit) {
		$query = $this->db->query("SELECT * FROM artikel_post WHERE artikel_status = 1 AND artikel_soft_delete = 0 ORDER BY artikel_tanggal ASC LIMIT $limit");
		return $query->result();
	}
}