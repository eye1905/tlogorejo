<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_blog extends CI_Model {
	
	var $table = 'artikel_post';

	function get_data()
	{
	    $query = $this->db->query("SELECT * FROM $this->table WHERE artikel_status = '1'");
	    return $query->result();
	}
}