<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class C_lembaga extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library(array('form_validation', 'session', 'upload'));
		$this->load->model('M_lembaga');
		date_default_timezone_set('Asia/Jakarta');
	}

	function index() {
		$data['lembaga'] = $this->M_lembaga->get_data(0);
		$this->template->load('admin_template', 'lembaga/lembaga_index_view', $data);
	}

	function save() {
		$this->form_validation->set_rules('lembaga_nama', 'Nama Lembaga', 'required');
		$this->form_validation->set_rules('lembaga_deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('lembaga_gambar', 'Gambar', 'required');
		
		$config['upload_path'] = './assets/img/lembaga'; //path folder
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
	            redirect('admin/C_lembaga');
	        }
		}
	}
}