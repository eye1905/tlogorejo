<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_berita extends CI_Model
{
	
	function get_data() {
		$query = $this->db->query("SELECT * FROM post");
		return $query->result();
	}

	function get_artikel($slug = FALSE) {
		if($slug === FALSE) {
			$query = $this->db->query("SELECT * FROM post WHERE status = 1 ORDER BY created_at ASC");
			return $query->result();
		}

		$query = $this->db->get_where('post', array('slug' => $slug, 'status' => TRUE));
		return $query->result();
	}

	function get_artikel_by_kategori($slug = FALSE) {
		if($slug === FALSE) {
			$query = $this->db->query("
				SELECT * FROM post JOIN kategori ON 
				kategori.id = post.id_kategori 
				WHERE kategori.slug = '$slug'
				AND post.status = '1'
				ORDER BY created_at ASC
				");
			return $query->result();
		}

		$query = $this->db->query("
			SELECT * FROM post JOIN kategori 
			ON kategori.id = post.id_kategori 
			WHERE kategori.slug = '$slug'
			AND post.status = '1'
			");
		return $query->result();
	}

	function get_artikel_limit($limit) {
		$query = $this->db->query("SELECT * FROM artikel_post WHERE artikel_status = 1 AND artikel_soft_delete = 0 ORDER BY artikel_tanggal ASC LIMIT $limit");
		return $query->result();
	}
}