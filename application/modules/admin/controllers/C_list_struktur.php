<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_list_struktur extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_struktur");
		    $this->load->helper(array('form', 'url'));
		    $this->load->library('upload');
		    $this->load->library('form_validation');
		    $this->load->library('image_lib');
		    ini_set('display_errors', 0);
		}

    public function index()
    {
 		$data['struktur'] = $this->M_struktur->get_data_list();
 		$this->template->load('admin_template', 'list_struktur', $data);
    }

    public function insert()
    {
    	
    	$this->form_validation->set_rules('Nama', 'Nama', 'required');
 		$this->form_validation->set_rules('Jabatan', 'Jabatan', 'required');
 		$this->form_validation->set_rules('child', 'Parent Id', 'required');

 		$config['upload_path'] = FCPATH.'/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
        $config['max_size']  = '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
 		$nama_foto = date("D/m/Y h:i:sa");
 		$config['file_name'] = $nama_foto;

        $this->load->library('upload', $config);

        	if ( ! $this->upload->do_upload('files')){
	            $status = "error";
	            $msg = $this->upload->display_errors();
	            echo json_encode($msg);
	        }
	        else{
	        	$config['image_library'] = 'gd2';
				$config['source_image'] = FCPATH.'/uploads/'.$nama_foto;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 75;
				$config['height']       = 50;
				$config['new_image'] = FCPATH.'/uploads/thumbnails/'."new_image".$nama_foto;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				if (!$this->image_lib->resize()){
					echo $this->image_lib->display_errors();
				}else{
					
					echo json_encode("success");   	
				}
	        }

 		/*if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(validation_errors());
        }
        else
        {

        }*/
    }

    public function update()
    {
    	
    	$this->form_validation->set_rules('Nama', 'Nama', 'required');
 		$this->form_validation->set_rules('Jabatan', 'Jabatan', 'required');
 		$this->form_validation->set_rules('child', 'Parent Id', 'required');

 		$config['upload_path'] = FCPATH.'/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
        $config['max_size']  = '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
 		$nama_foto = date("D/m/Y h:i:sa");
 		$config['file_name'] = $nama_foto;

        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('files')){
            $status = "error";
            $msg = $this->upload->display_errors();
        }
        else{
        	$config['image_library'] = 'gd2';
			$config['source_image'] = FCPATH.'/uploads/'.$nama_foto;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 75;
			$config['height']       = 50;
			$config['new_image'] = FCPATH.'/uploads/thumbnails/'."new_image".$nama_foto;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if (!$this->image_lib->resize()){
				echo $this->image_lib->display_errors();
			}else{
				
				echo json_encode("success");   	
			}
        }
    }

}