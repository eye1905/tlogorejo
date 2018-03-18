<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_blog extends CI_Model {

	var $table = 'artikel_post';
	var $column_order = array(
        'artikel_id', 
		'artikel_judul', 
		'artikel_isi', 
		'artikel_tanggal', 
		'artikel_image', 
		'artikel_author', 
		'artikel_status', 
		'artikel_log_time');
	var $column_search = array(
		'artikel_judul',
		'artikel_status'
	);
	var $order = array('artikel_judul' => 'asc');
	
	private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
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
	 
    function get_datatables() {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function count_all_by_status()
    {
        $query = $this->db->query("
            SELECT COUNT(*) AS data FROM artikel_post
            ");
        return $query;
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

    // Multi Delete
    function multi_delete_data()
    {
        $this->form_validation->set_rules('id[]','id[]','required');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Gagal menyimpan data');
            redirect('admin/blog');
        } else {
            $del = $this->input->post('id');
            for ($i=0; $i < count($del) ; $i++) { 
                $this->db->where('artikel_id', $del[$i]);
                $this->db->delete($this->table);
            }
            $this->session->set_flashdata('sukses','<strong>'.count($del).'</strong> Data sukses dinonaktifkan');
            redirect('admin/blog');
        }
    }

    function get_artikel_by_id($table, $where)
    {
        return $this->db->get_where($table, $where)->result();
    }
}