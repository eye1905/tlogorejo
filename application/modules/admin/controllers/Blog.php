<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Blog extends MY_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('M_blog');
	}

	public function index() {
		$this->template->load('admin_template', 'blog/blog_index_post_view');
	}

	public function draft() {
		$this->template->load('admin_template', 'blog/blog_draft_post_view');
	}

	public function form() {
		$this->template->load('admin_template', 'blog/blog_add_post_view');
	}

	public function kategori() {
		$this->template->load('admin_template', 'blog/blog_kategori_view');
	}

	function get_data_blog()
    {
        $list = $this->M_blog->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();

            $row[] = '<div class="text-center"><input type="checkbox" name="id" value=['.$field->artikel_id.']></div>';
            $row[] = '<span class="text-primary">'.$field->artikel_judul.'</span><br>
                      <a href="'.base_url('admin/blog/edit/'.$field->artikel_id).'" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                      <a name="id" href="'.base_url('admin/blog/delete/'.$field->artikel_id).'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>';
            $row[] = '<em class="text-warning">'.$field->artikel_status.'</em>';
            $row[] = '<span class="text-primary">'.$field->artikel_author.'</span>';
            $row[] = $field->artikel_tanggal;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_blog->count_all(),
            "recordsFiltered" => $this->M_blog->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function delete($artikel_id) {
    	
    }
}