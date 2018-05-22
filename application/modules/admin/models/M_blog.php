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
	var $order = array('artikel_tanggal' => 'desc');
	
	function _get_datatables_query($soft_del)
    {
         
        $this->db->from($this->table);
        $this->db->where('artikel_soft_delete', $soft_del);
 
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
        return $this->db->insert_id();
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

    function get_artikel_by_id($table, $where) {
        return $this->db->get_where($table, $where)->result();
    }

    // Multi Delete
    function multi_delete_data() {
        $this->form_validation->set_rules('id[]','id[]','required');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('message', 'Tidak Ada Data!');
            redirect('admin/C_blog');
        } 
        else {
            $del = $this->input->post('id');
            for ($i=0; $i < count($del) ; $i++) { 
                $data = array('artikel_soft_delete' => TRUE, 'artikel_log_time' => date('Y-m-d H:i:s'));
                $this->db->where('artikel_id', $del[$i]);
                $this->db->update($this->table, $data);
            }
            $rows = count($del);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', 'Berhasil Menghapus '.$rows.' Data!');
                redirect('admin/C_blog');
            }
            else {
                $this->session->set_flashdata('message', 'Gagal Menghapus '.$rows.' Data!');
                redirect('admin/C_blog');
            }
        }
    }

    function multi_restore_data() {
        $this->form_validation->set_rules('id[]','id[]','required');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('message', 'Tidak Ada Data!');
            redirect('admin/C_blog');
        } else {
            $del = $this->input->post('id');
            for ($i=0; $i < count($del) ; $i++) { 
                $data = array('artikel_soft_delete' => FALSE, 'artikel_log_time' => date('Y-m-d H:i:s'));
                $this->db->where('artikel_id', $del[$i]);
                $this->db->update($this->table, $data);
            }
            $rows = count($del);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', 'Berhasil Memulihkan '.$rows.' Data!');
                redirect('admin/C_blog');
            }
            else {
                $this->session->set_flashdata('message', 'Gagal Memulihkan '.$rows.' Data!');
                redirect('admin/C_blog');
            }
        }
    }

    public function create_unique_slug($string, $table, $field, $key=NULL, $value=NULL)
    {
        $t =& get_instance();
        $slug = url_title($string);
        $slug = strtolower($slug);
        $i = 0;
        $params = array ();
        $params[$field] = $slug;
     
        if($key)$params["$key !="] = $value; 
     
        while ($t->db->where($params)->get($table)->num_rows())
        {   
            if (!preg_match ('/-{1}[0-9]+$/', $slug ))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
             
            $params [$field] = $slug;
        }

        var_dump($slug);
        return $slug;   
    }
}