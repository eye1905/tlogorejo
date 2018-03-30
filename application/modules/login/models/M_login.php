<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_login extends CI_Model
{
	
	function auth_user($user_id, $user_password) {
		$query = $this->db->query("
			SELECT * FROM users 
			WHERE user_id = '$user_id' 
			AND user_password = md5('$user_password') 
			AND user_status = '1' 
			AND user_soft_delete = '0'"
		);
		return $query;
	}
}