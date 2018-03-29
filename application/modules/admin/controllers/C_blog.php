<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class C_blog extends MY_Controller {

	function __construct() {
    	parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
    	$this->load->library('upload');
    	$this->load->model('M_blog');
    	$this->load->model('M_kategori');
        date_default_timezone_set('Asia/Jakarta');
	}

	public function index() {
		$this->template->load('admin_template', 'blog/blog_index_post_view');
	}

    public function recycle_bin() {
        $this->template->load('admin_template', 'blog/blog_nonaktif_post_view');
    }

	// form add
	public function form() {
		$data['kategori'] = $this->M_kategori->get_data();
		$this->template->load('admin_template', 'blog/blog_add_post_view', $data);
	}

	// form edit
	public function edit() {
		$where = array('artikel_id' => $this->input->get('id'));
		$data['artikel'] = $this->M_blog->get_artikel_by_id('artikel_post', $where);
        $data['kategori'] = $this->M_kategori->get_data();
		$this->template->load('admin_template', 'blog/blog_edit_post_view', $data);
	}

	public function kategori() {
		$this->template->load('admin_template', 'blog/blog_kategori_view');
	}

	function get_data_artikel() {
        $soft_del = $this->input->post('soft_delete'); // Kondisi tidak terhapus
        $list = $this->M_blog->get_datatables($soft_del);
        $data = array();
        $no = $_POST['start'];

        $status = 1;

        foreach ($list as $field) {
            $no++;
            $row = array();

            $row[] = '<div class="text-center"><input type="checkbox" name="id[]" value="'.$field->artikel_id.'"></div>';
            $row[] = '<span class="text-primary">'.$field->artikel_judul.'</span><br>
                      <a href="'.base_url('admin/C_blog/edit?id='.$field->artikel_id).'" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                      '.($field->artikel_soft_delete != 1 ? 
                        '<a name="id" href="'.base_url('admin/C_blog/restore?id='.$field->artikel_id).'" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Restore</a>' 
                        :
                        '<a name="id" href="'.base_url('admin/C_blog/delete?id='.$field->artikel_id).'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>').'
                      ';

                      // <a name="id" href="'.base_url('admin/blog/delete?id='.$field->artikel_id).'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>';
            $row[] = '<em class="text-warning">'.($field->artikel_status != 1 ? 'Draft' : 'Publikasi').'</em>';
            $row[] = '<span class="text-primary">'.$field->artikel_author.'</span>';
            $row[] = $field->artikel_tanggal;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_blog->count_all(),
            "recordsFiltered" => $this->M_blog->count_filtered($soft_del),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function save() {
    	$config['upload_path'] = './assets/img/berita'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
        if(!empty($_FILES['artikel_image']['name'])){
            if ($this->upload->do_upload('artikel_image')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/img/upload'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                // $config['width']= 710;
                $config['height']= 420;
                $config['new_image']= './assets/img/upload'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $slug = url_title($this->input->post('artikel_judul'), 'dash', TRUE);

                $data = array(
                	'artikel_judul' => $this->input->post('artikel_judul'),
                    'artikel_slug' => $slug,
                	'artikel_isi' => $this->input->post('artikel_isi'),
                	'artikel_tanggal' => date('d/m/Y'),
                	'artikel_image' => $gbr['file_name'],
                	'artikel_author' => 'Admin',
                	'artikel_kategori' => $this->input->post('artikel_kategori'),
                	'artikel_status' => 1,
                	'artikel_log_time' => date('Y-m-d H:i:s'),
                );

                $this->M_blog->save_data('artikel_post', $data);
                echo "
                	<script>
                		alert('Sukses menyimpan artikel!');
                		window.location.href='".base_url('admin/C_blog')."';
                	</script>";
            }else{
	            redirect('admin/C_blog');
	        }
                      
        }else{
        	echo "
        		<script>
        			alert('Gagal menambahkan artikel!');
        			window.location.href='".base_url('admin/C_blog/form')."';
        		</script>";
        }
    }

    function change_banner() {
    	$config['upload_path'] = './assets/img/berita'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
        if(!empty($_FILES['artikel_image']['name'])){
            if ($this->upload->do_upload('artikel_image')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/img/upload'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                // $config['width']= 710;
                $config['height']= 420;
                $config['new_image']= './assets/img/upload'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                	'artikel_image' => $gbr['file_name'],
                	'artikel_log_time' => date('Y-m-d H:i:s'),
                );

                $where = array(
                	'artikel_id' => $this->input->post('artikel_id')
                );

                $this->M_blog->update_data('artikel_post', $where, $data);
                echo "
                	<script>
                		alert('Sukses menyimpan artikel!');
                		window.location.href='".base_url('admin/C_blog')."';
                	</script>";
                // redirect('admin/blog');
	        }
	        else{
	            redirect('admin/C_blog');
	        }
                      
        }
        else{
        	echo "
    		<script>
    			alert('Gagal memperbarui artikel!');
    			window.location.href='".base_url('admin/C_blog/form')."';
    		</script>";
            // redirect('admin/blog/form');
        }
    }

    function update() {
        $slug = url_title($this->input->post('artikel_judul'), 'dash', TRUE);

    	$data = array(
            'artikel_judul' => $this->input->post('artikel_judul'),
    		'artikel_slug' => $slug,
    		'artikel_isi' => $this->input->post('artikel_isi'),
            'artikel_author' => 'Admin',
            'artikel_kategori' => $this->input->post('artikel_kategori'),
            'artikel_log_time' => date('Y-m-d H:i:s'),
    	);

    	$where = array(
    		'artikel_id' => $this->input->post('artikel_id')
    	);

    	$this->M_blog->update_data('artikel_post', $where, $data);
    	echo "
    		<script>
    			alert('Sukses mengperbarui artikel!');
    			window.location.href='".base_url('admin/C_blog')."';
    		</script>";
    	// redirect('admin/blog');
    }

    function delete() {
        $data = array('artikel_soft_delete' => 0, 'artikel_log_time' => date('Y-m-d H:i:s'));
        $where = array('artikel_id' => $this->input->get('id'));

        $this->M_blog->update_data('artikel_post', $where, $data);
        echo "
            <script>
                alert('Sukses menghapus artikel!');
                window.location.href='".base_url('admin/blog')."';
            </script>";
    }

    function restore() {
        $data = array('artikel_soft_delete' => 1, 'artikel_log_time' => date('Y-m-d H:i:s'));
        $where = array('artikel_id' => $this->input->get('id'));

        $this->M_blog->update_data('artikel_post', $where, $data);
        echo "
            <script>
                alert('Sukses memulihkan artikel!');
                window.location.href='".base_url('admin/C_blog/recycle_bin')."';
            </script>";
    }

    function delete_permannent() 
    {
    	$where = array('artikel_id' => $this->input->get('id'));
    	$this->M_blog->delete_data('artikel_post', $where);
    	echo "
    		<script>
    			alert('Sukses menghapus artikel!');
    			window.location.href='".base_url('admin/C_blog')."';
    		</script>";
    	// redirect('admin/blog');
    }

    public function multiple_delete()
    {
    	$this->M_blog->multi_delete_data();
    }

    public function multiple_restore()
    {
        $this->M_blog->multi_restore_data();
    }
}