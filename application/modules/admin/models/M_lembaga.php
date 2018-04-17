<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_lembaga extends CI_Model {

	var $table = 'lembaga';

	var $column_order = array(
        'lembaga_id', 
		'lembaga_nama', 
		'lembaga_deskripsi', 
		'lembaga_gambar', 
		'lembaga_soft_delete', 
		'artikel_log_time');
	var $column_search = array(
		'lembaga_nama',
	);
	var $order = array('lembaga_nama' => 'asc');
	
	function _get_datatables_query($soft_del)
    {
         
        $this->db->from($this->table);
        $this->db->where('lembaga_soft_delete', $soft_del);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	 
    function get_datatables($soft_del) {
        $this->_get_datatables_query($soft_del);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($soft_del) {
        $this->_get_datatables_query($soft_del);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	
	// Read
	function get_data($status) {
		$query = $this->db->query("SELECT * FROM $this->table WHERE lembaga_soft_delete = '$status'");
		return $query->result();
	}

	// Insert
	function save_data($table, $data)
	{
	    $this->db->insert($table, $data);
	}

	// Update
	function update_data($table, $where, $data)
	{
	    $this->db->where($where);
	    $this->db->update($table, $data);
	}

	// Delete
	function delete_data($table, $where)
	{
	    $this->db->where($where);
	    $this->db->delete($table);
	}

	function get_lembaga_by_id($table, $where) {
	    return $this->db->get_where($table, $where)->result();
	}

    function get_lembaga_by_slug($slug = FALSE) {
        if($slug === FALSE) {
            $query = $this->db->query("SELECT * FROM lembaga WHERE lembaga_soft_delete = 0");
            return $query->result();
        }

        $query = $this->db->get_where('lembaga', array('lembaga_slug' => $slug,  'lembaga_soft_delete' => FALSE));
        return $query->result();
    }
}