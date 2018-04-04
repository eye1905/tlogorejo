<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class C_lembaga extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		// $this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->library('session');
		// $this->load->library(array('form_validation', 'session', 'upload'));
		$this->load->model('M_lembaga');
		date_default_timezone_set('Asia/Jakarta');
	}

	function index() {
		$data['lembaga'] = $this->M_lembaga->get_data(0);
		$data['lembaga_nonaktif'] = $this->M_lembaga->get_data(1);
		$this->template->load('admin_template', 'lembaga/lembaga_index_view', $data);
	}

	function edit() {
		$where = array('lembaga_id' => $this->input->get('id'));
		$data['lembaga'] = $this->M_lembaga->get_lembaga_by_id('lembaga', $where);
		$this->template->load('admin_template', 'lembaga/lembaga_edit_view', $data);
	}

	public function get_data_lembaga() {
        $soft_del = $this->input->post('soft_delete'); // Kondisi tidak terhapus
        $list = $this->M_lembaga->get_datatables($soft_del);
        $data = array();
        $no = $_POST['start'];

        $status = 1;

        foreach ($list as $field) {
            $no++;
            $row = array();

            $row[] = '<div class="text-center"><input type="checkbox" name="id[]" value="'.$field->lembaga_id.'"></div>';
            $row[] = '<span class="text-primary">'.$field->lembaga_nama.'</span><br>
                      <a href="'.base_url('admin/C_lembaga/edit?id='.$field->lembaga_id).'" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                      '.($field->lembaga_soft_delete != FALSE ? 
                        '<a name="id" href="'.base_url('admin/C_lembaga/restore?id='.$field->lembaga_id).'" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Restore</a>' 
                        :
                        '<a name="id" href="'.base_url('admin/C_lembaga/delete?id='.$field->lembaga_id).'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>').'
                      ';

            $row[] = '<em class="text-warning">'.($field->lembaga_soft_delete != 1 ? 'Tidak Tampil' : 'Tampil').'</em>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_lembaga->count_all(),
            "recordsFiltered" => $this->M_lembaga->count_filtered($soft_del),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	function save() {
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

	function update() {
		$this->form_validation->set_rules('lembaga_nama', 'Nama Lembaga');
		$this->form_validation->set_rules('lembaga_deskripsi', 'Deskripsi');
		if ($this->form_validation->run() == FALSE) {
			echo "
				<script>
					alert('Gagal mengperbarui artikel!');
					window.location.href='".base_url('admin/C_lembaga')."';
				</script>";
		}
		else {
			$slug = url_title($this->input->post('lembaga_nama'), 'dash', TRUE);
			
			$data = array(
				'lembaga_nama' => $this->input->post('lembaga_nama'),
				'lembaga_slug' => $slug,
				'lembaga_deskripsi' => $this->input->post('lembaga_deskripsi'),
				'lembaga_log_time' => date('Y-m-d H:i:s')
			);

			$where = array(
				'lembaga_id' => $this->input->post('lembaga_id')
			);

			$this->M_lembaga->update_data('lembaga', $where, $data);
			echo "
				<script>
					alert('Sukses mengperbarui data!');
					window.location.href='".base_url('admin/C_lembaga')."';
				</script>";
		}	
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