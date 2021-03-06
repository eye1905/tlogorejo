<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

	/**
	 * Class constructor
	 *
	 * @link	https://github.com/bcit-ci/CodeIgniter/issues/5332
	 * @return	void
	 */
	public function __construct() {}

	/**
	 * __get magic
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string	$key
	 */
	public function __get($key)
	{
		// Debugging note:
		//	If you're here because you're getting an error message
		//	saying 'Undefined Property: system/core/Model.php', it's
		//	most likely a typo in your model code.
		return get_instance()->$key;
	}

}
class Model_Utama extends CI_Model
{	

	public $table, $primary_key , $like, $order_by;

	public function index($number, $offset)
	{
	$this->db->order_by($this->order_by, 'asc');
	return $this->db->get($this->table, $number, $offset)->result();
	}

	public function get_filter($value)
	{
	$this->db->like($this->like, $value);
	return $this->db->get($this->table)->result();
	}

	public function tambah_data($data)
	{
		$a_data = [];

		foreach ($data as $key => $value) {
			 $a_data[$key] = $value;
		}

		$a_data['soft_delete'] = "1";
		$a_data['log_time'] = date("Y-m-d h:i:sa");

		$insert = $this->db->insert($this->table, $a_data);
		return $insert;
	}

	public function get_by_id($ide)
	{
		$this->db->from($this->table);
		$this->db->where($this->primary_key, $ide);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_data_list()
	{
		$this->db->where("soft_delete", "1");
		$this->db->order_by($this->order_by, 'asc');
		return $this->db->get($this->table)->result();
	}

	public function get_row()
	{
		$this->db->order_by($this->order_by, 'asc');
		return $this->db->get($this->table)->row_array();
	}


	public function update($where, $data)
	{
		$a_data = [];
		
		foreach ($data as $key => $value) {
			 $a_data[$key] = $value;
		}

		$a_data['soft_delete'] = "1";
		$a_data['log_time'] = date("Y-m-d h:i:sa");

		$this->db->update($this->table, $a_data, $where);
		return $this->db->affected_rows();
	}

	public function delete($where, $data)
	{
		$a_data = [];
		
		foreach ($data as $key => $value) {
			 $a_data[$key] = $value;
		}

		$a_data['soft_delete'] = "0";
		$a_data['log_time'] = date("Y-m-d h:i:sa");

		$this->db->update($this->table, $a_data, $where);
		return $this->db->affected_rows();
	}

	public function jumlah_data()
	{
		return $this->db->get($this->table)->num_rows();
	}

}
