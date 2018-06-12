<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Blog extends MY_Controller {

	function __construct() {
    	parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
    	$this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');

        // Load Model
        $this->load->model('M_base');
        $this->load->model('M_blog');
        $this->load->model('M_kategori');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('/', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
	}

    public function index() {
        $data['icon'] = 'fa fa-link';
        $data['header'] = 'Daftar Postingan';
        $data['blog'] = $this->M_blog->get_data();
        $this->template->load('admin_template', 'post/blog_index_view', $data);
    }

    public function create_blog() {
        $data['icon'] = 'fa fa-link';
        $data['header'] = 'Membuat Postingan';
        $data['kategori'] = $this->M_kategori->get_data(1);
        $this->template->load('admin_template', 'post/blog_create_view', $data);
    }

    public function edit_blog($id = 0) {
        if (!empty($id)) {
            $data['kategori'] = $this->M_kategori->get_data(1);
            $blog = $this->M_blog->get_blog_by_id($id);
            foreach ($blog as $key => $row) {
                $data['id'] = $row->id;
                $data['judul'] = $row->judul;
                $data['thumb'] = $row->thumb;
                $data['preview'] = $row->preview;
                $data['konten'] = $row->konten;
                $data['tag'] = $row->tag;
                $data['id_kategori'] = $row->id_kategori;
                $data['status'] = $row->status;
            }

            $data['icon'] = 'fa fa-link';
            $data['header'] = 'Edit Postingan';
            $this->template->load('admin_template', 'post/blog_edit_view', $data);
        }
        else {
            $this->session->set_flashdata('message', 'Gagal Membaca Data');
            redirect('admin/blog');
        }
    }

    public function save_blog() {
        $config['upload_path'] = FCPATH.'/uploads/thumbs/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 1024;
    
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')){
            $imgdata = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = FCPATH.'/uploads/thumbs/'.$imgdata['file_name'];
            $config['new_image']        = FCPATH.'/uploads/berita/'.$imgdata['file_name']; // Copy image to ...
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 800;
            // $config['height']           = 600;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $title = $this->input->post('judul');
            $slug = $this->M_blog->create_unique_slug($title, 'post', 'slug');
            $thumbnail = $imgdata['raw_name'].'_thumb'.$imgdata['file_ext'];

            $status = $this->input->post('status');

            $data = array(
                'judul'         => $title,
                'slug'          => date('Ymd').'-'.$slug,
                'thumb'         => $thumbnail,
                'konten'        => $this->input->post('konten'),
                'id_kategori'   => $this->input->post('id_kategori'),
                'status'   => ($status == TRUE) ? '1' : '0',
                'created_at'    => date('Y-m-d H:i:s'),
            );

            $result = $this->M_blog->save_data('post', $data);
            if ($result) {
                $this->session->set_flashdata('message', 'Berhasil Menyimpan Data!');
                redirect('admin/blog/create_blog');
            }
            else {
                $this->session->set_flashdata('message', 'Kesalahan Menyimpan Data!');
                redirect('admin/blog/create_blog');
            }
        }
        else {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('message', $errors);
            redirect('admin/blog/create_blog');
        }
    }

    public function update_blog() {
        $id = $this->input->post('id');

        if (isset($_POST['submit'])) {
            $title = $this->input->post('judul');
            $slug = $this->M_blog->create_unique_slug($title, 'post', 'slug');

            $where = array('id' => $this->input->post('id'));
            $data = array(
                'judul'         => $title,
                'slug'          => $slug,
                'konten'        => $this->input->post('konten'),
                'id_kategori'   => $this->input->post('id_kategori'),
                'updated_at'    => date('Y-m-d H:i:s'),
            );

            $result = $this->M_base->update_data('post', $where, $data);
            if ($result) {
                $this->session->set_flashdata('message', 'Berhasil Mengupdate Data!');
                redirect('admin/blog/edit_blog/'.$id);
            }
            else {
                $this->session->set_flashdata('message', 'Gagal Mengupdate Data!');
                redirect('admin/blog/edit_blog/'.$id);
            }
        }
    }

    public function delete_blog($id = 0) {
        if (!empty($id)) {
            $where = array('id' => $id);
            $data = array('status' => FALSE);
            $result = $this->M_base->update_data('post', $where, $data);
            if ($result) {
                $this->session->set_flashdata('message', 'Berhasil Menghapus Data!');
                redirect('admin/blog');
            }
            else {
                $this->session->set_flashdata('message', 'Kesalahan Menghapus Data!');
                redirect('admin/blog');
            }
        }
        else {
            $this->session->set_flashdata('message', 'Kesalahan Membaca Data!');
            redirect('admin/blog');
        }
    }

    public function restore_blog($id = 0) {
        if (!empty($id)) {
            $where = array('id' => $id);
            $data = array('status' => TRUE);
            $result = $this->M_base->update_data('post', $where, $data);
            if ($result) {
                $this->session->set_flashdata('message', 'Berhasil Memulihkan Data!');
                redirect('admin/blog');
            }
            else {
                $this->session->set_flashdata('message', 'Kesalahan Memulihkan Data!');
                redirect('admin/blog');
            }
        }
        else {
            $this->session->set_flashdata('message', 'Kesalahan Membaca Data!');
            redirect('admin/blog');
        }
    }

    public function trash_blog($id = 0) {
        if (!empty($id)) {
            $where = array('id' => $id);
            $result = $this->M_base->delete_data('post', $where);
            if ($result) {
                $this->session->set_flashdata('message', 'Berhasil Menghapus Data!');
                redirect('admin/blog');
            }
            else {
                $this->session->set_flashdata('message', 'Kesalahan Menghapus Data!');
                redirect('admin/blog');
            }
        }
        else {
            $this->session->set_flashdata('message', 'Kesalahan Membaca Data!');
            redirect('admin/blog');
        }
    }

    public function categories() {
        $data['icon'] = 'fa fa-link';
        $data['header'] = 'Data Kategori';
        $data['kategori'] = $this->M_kategori->get_all();
        $this->template->load('admin_template', 'post/kategori_data_view', $data);
    }

    public function save_categories() {
        $this->form_validation->set_rules('kategori', '', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', 'Gagal Menyimpan Data!');
            redirect('admin/blog/categories');
        }
        else {
            $slug = url_title($this->input->post('kategori'), 'dash', TRUE);
            $data = array(
                'kategori'  => $this->input->post('kategori'),
                'slug'      => $slug,
            );

            $row = $this->M_base->save_data('kategori', $data);
            if ($row == TRUE) {
                $this->session->set_flashdata('message', 'Berhasil Menyimpan Data!');
                redirect('admin/blog/categories');
            }
            else {
                $this->session->set_flashdata('message', 'Kesalahan Menyimpan Data!');
                redirect('admin/blog/categories');
            }
        }
    }

    public function update_categories() {
        $this->form_validation->set_rules('kategori', '', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/blog/categories');
        }
        else {
            $slug = url_title($this->input->post('kategori'), 'dash', TRUE);
            $where = array('id' => $this->input->post('id'));
            $data = array(
                'kategori'  => $this->input->post('kategori'),
                'slug'      => $slug,
            );

            $result = $this->M_base->update_data('kategori', $where, $data);
            if ($result == TRUE) {
                $this->session->set_flashdata('message', 'Berhasil Memperbarui Data!');
                redirect('admin/blog/categories');
            }
            else {
                $this->session->set_flashdata('message', 'Kesalahan Memperbarui Data!');
                redirect('admin/blog/categories');
            }
        }
    }

    public function delete_categories($id) {
        $where = array('id' => $id);
        $data = array('status' => FALSE);
        $result = $this->M_base->update_data('kategori', $where, $data);
        if ($result) {
            $this->session->set_flashdata('message', 'Berhasil Menghapus Data!');
            redirect('admin/blog/categories');
        }
        else {
            $this->session->set_flashdata('message', 'Kesalahan Menghapus Data!');
            redirect('admin/blog/categories');
        }
    }

    public function restore_categories($id) {
        $where = array('id' => $id);
        $data = array('status' => TRUE);
        $result = $this->M_base->update_data('kategori', $where, $data);
        if ($result) {
            $this->session->set_flashdata('message', 'Berhasil Memulihkan Data!');
            redirect('admin/blog/categories');
        }
        else {
            $this->session->set_flashdata('message', 'Kesalahan Memulihkan Data!');
            redirect('admin/blog/categories');
        }
    }

}