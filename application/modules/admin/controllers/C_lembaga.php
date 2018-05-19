<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class C_lembaga extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->library('session');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_lembaga');

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');

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

	function index() {
		$data['lembaga'] = $this->M_lembaga->get_data(0);
		$data['lembaga_nonaktif'] = $this->M_lembaga->get_data(1);
		$this->template->load('admin_template', 'lembaga/lembaga_index_view', $data);
	}

    public function recycle_bin() {
        $data['lembaga'] = $this->M_lembaga->get_data(1);
        $this->template->load('admin_template', 'lembaga/lembaga_non_view', $data);
    }

    public function form() {
        $data = "";
        $this->template->load('admin_template', 'lembaga/lembaga_add_view', $data);
    }

	function edit() {
		$where = array('lembaga_id' => $this->input->get('id'));
		$data['lembaga'] = $this->M_lembaga->get_lembaga_by_id('lembaga', $where);
		$this->template->load('admin_template', 'lembaga/lembaga_edit_view', $data);
	}

    function save() {
    	$config['upload_path'] = FCPATH.'/assets/img/lembaga'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
        if(!empty($_FILES['lembaga_gambar']['name'])){
            if ($this->upload->do_upload('lembaga_gambar')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']= FCPATH.'/assets/img/upload'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                // $config['width']= 710;
                $config['height']= 420;
                $config['new_image']= FCPATH.'/assets/img/upload'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $slug = url_title($this->input->post('lembaga_nama'), 'dash', TRUE);

                $data = array(
                	'lembaga_nama' => $this->input->post('lembaga_nama'),
                    'lembaga_slug' => $slug,
                	'lembaga_deskripsi' => $this->input->post('lembaga_deskripsi'),
                	'lembaga_gambar' => $gbr['file_name'],
                	'lembaga_soft_delete' => FALSE,
                	'lembaga_log_time' => date('Y-m-d H:i:s'),
                );

                $this->M_lembaga->save_data('lembaga', $data);
                echo "
                	<script>
                		alert('Sukses menyimpan artikel!');
                		window.location.href='".base_url('admin/C_lembaga')."';
                	</script>";
            }else{
	            redirect('admin/C_lembaga');
	        }
                      
        }else{
        	echo "
        		<script>
        			alert('Gagal menambahkan artikel!');
        			window.location.href='".base_url('admin/C_blog/form')."';
        		</script>";
        }
    }

	function savee() {
		$this->form_validation->set_rules('lembaga_nama', 'Nama Lembaga');
		$this->form_validation->set_rules('lembaga_deskripsi', 'Deskripsi');
		$this->form_validation->set_rules('lembaga_gambar', 'Gambar');
		
		$config['upload_path'] = FCPATH.'/assets/img/lembaga'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	    $this->upload->initialize($config);

		if ($this->form_validation->run() == FALSE) {
			$error = validation_errors();
			echo "
				<script>
					alert('Gagal menyimpan!');
					window.location.href='".base_url('admin/C_lembaga')."';
				</script>";
		}
		else {
            if ($this->upload->do_upload('lembaga_gambar')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']= FCPATH.'/assets/img/lembaga'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                // $config['width']= 710;
                $config['height']= 420;
                $config['new_image']= FCPATH.'/assets/img/lembaga'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $slug = url_title($this->input->post('lembaga_nama'), 'dash', TRUE);

                $data = array(
                	'lembaga_nama' => $this->input->post('lembaga_nama'),
                    'lembaga_slug' => $slug,
                	'lembaga_deskripsi' => $this->input->post('lembaga_deskripsi'),
                	'lembaga_gambar' => $gbr['file_name'],
                	'lembaga_soft_delete' => FALSE,
                	'lembaga_log_time' => date('Y-m-d H:i:s'),
                );

                $this->M_lembaga->save_data('lembaga', $data);
                echo "
                	<script>
                		alert('Sukses menyimpan!');
                		window.location.href='".base_url('admin/C_lembaga')."';
                	</script>";
            }
            else {
	            $slug = url_title($this->input->post('lembaga_nama'), 'dash', TRUE);

	            $data = array(
	            	'lembaga_nama' => $this->input->post('lembaga_nama'),
	                'lembaga_slug' => $slug,
	            	'lembaga_deskripsi' => $this->input->post('lembaga_deskripsi'),
	            	'lembaga_soft_delete' => FALSE,
	            	'lembaga_log_time' => date('Y-m-d H:i:s'),
	            );

	            $this->M_lembaga->save_data('lembaga', $data);
	            echo "
	            	<script>
	            		alert('Sukses menyimpan!');
	            		window.location.href='".base_url('admin/C_lembaga')."';
	            	</script>";
	        }
		}
	}

    function change_banner() {
    	$config['upload_path'] = FCPATH.'/assets/img/lembaga'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
        if(!empty($_FILES['lembaga_gambar']['name'])){
            if ($this->upload->do_upload('lembaga_gambar')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']=FCPATH.'/assets/img/upload'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 710;
                $config['height']= 420;
                $config['new_image']= FCPATH.'/assets/img/upload'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                	'lembaga_gambar' => $gbr['file_name'],
                	'lembaga_log_time' => date('Y-m-d H:i:s'),
                );

                $where = array(
                	'lembaga_id' => $this->input->post('lembaga_id')
                );

                $this->M_lembaga->update_data('lembaga', $where, $data);
                echo "
                	<script>
                		alert('Sukses menyimpan gambar!');
                		window.location.href='".base_url('admin/C_lembaga')."';
                	</script>";
                // redirect('admin/blog');
	        }
	        else{
	            redirect('admin/C_lembaga');
	        }
                      
        }
        else{
        	echo "
    		<script>
    			alert('Gagal memperbarui gambar!');
    			window.location.href='".base_url('admin/C_lembaga/form')."';
    		</script>";
            // redirect('admin/blog/form');
        }
    }

    function update() {
        $slug = url_title($this->input->post('lembaga_nama'), 'dash', TRUE);

    	$data = array(
            'lembaga_nama' => $this->input->post('lembaga_nama'),
    		'lembaga_slug' => $slug,
    		'lembaga_deskripsi' => $this->input->post('lembaga_deskripsi'),
            'lembaga_log_time' => date('Y-m-d H:i:s'),
    	);

    	$where = array(
    		'lembaga_id' => $this->input->post('lembaga_id')
    	);

    	$this->M_lembaga->update_data('lembaga', $where, $data);
    	echo "
    		<script>
    			alert('Sukses mengperbarui artikel!');
    			window.location.href='".base_url('admin/C_lembaga')."';
    		</script>";
    }

	function delete() {
	    $data = array('lembaga_soft_delete' => TRUE, 'lembaga_log_time' => date('Y-m-d H:i:s'));
	    $where = array('lembaga_id' => $this->input->get('id'));

	    $this->M_lembaga->update_data('lembaga', $where, $data);
	    echo "
	        <script>
	            alert('Sukses menghapus data!');
	            window.location.href='".base_url('admin/C_lembaga')."';
	        </script>";
	}

	function restore() {
	    $data = array('lembaga_soft_delete' => FALSE, 'lembaga_log_time' => date('Y-m-d H:i:s'));
	    $where = array('lembaga_id' => $this->input->get('id'));

	    $this->M_lembaga->update_data('lembaga', $where, $data);
	    echo "
	        <script>
	            alert('Sukses memulihkan data!');
	            window.location.href='".base_url('admin/C_lembaga')."';
	        </script>";
	}

}