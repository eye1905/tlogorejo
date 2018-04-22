<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_slider extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_slider");
		    $this->load->helper(array('form', 'url'));
		    $this->load->library('upload');
		    $this->load->library('form_validation');
		    $this->load->library('image_lib');
		    ini_set('display_errors', 0);

            //validasi jika user belum login
                if($this->session->userdata('loged_in') != TRUE){
                 $url = base_url();
                 redirect($url);
            }
		}

    public function index()
    {
 		$data['struktur'] = $this->M_slider->get_data_list();
 		$this->template->load('admin_template', 'slider', $data);
    }

    public function insert()
    {
    	$this->form_validation->set_rules('Judul', 'Judul', 'required');
 		$this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required');
 		$this->form_validation->set_rules('foto', 'Foto', 'required');

 		$config['upload_path']          = FCPATH.'/assets/img/slider/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|GIF|PNG|JPEG';
        $config['max_size']  = 5000;
 		$nama_foto = time().$_FILES["file"]['name'];
 		$config['file_name'] = $nama_foto;
 		$this->upload->initialize($config);

 		if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(validation_errors());
        }
        else
        {
        	if ($this->upload->do_upload('file')){
        		$config2['image_library'] = 'gd2';
                $config2['source_image'] = FCPATH.'/assets/img/slider/'.$this->upload->file_name;
                $config2['new_image'] = FCPATH.'/assets/img/slider/thumbnails/'.$this->upload->file_name;
                $config2['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
                $config2['width'] = 3366;
                $config2['height'] = 1500;
                $this->image_lib->initialize($config2);

                if ($this->image_lib->resize()){
                	$hapus = unlink(FCPATH.'/assets/img/slider/'.$this->upload->file_name);

                	if ($hapus) {
                		$data = array('judul' => $this->input->post("Judul"),
            				'deskripsi' => $this->input->post("Deskripsi"),
            				'foto' => $this->upload->file_name
            				);

		            	$this->M_slider->tambah_data($data);

	                	echo json_encode("success"); 
                	}else{
                		echo json_encode("tak ada data !");
                	}
              	}else{
	              	$status = "error";
		            $msg = $this->image_lib->display_errors('', '');
		            echo json_encode($msg);  
              	}        		
	        }
	        else{
	        	$status = "error";
	            $msg = $this->upload->display_errors();
	            echo json_encode($msg);
	        }
        }
    }

    public function update()
    {
    	
    	$this->form_validation->set_rules('Judul', 'Judul', 'required');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required');

 		
        $config['upload_path']          = FCPATH.'/assets/img/slider/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|GIF|PNG|JPEG';
        $config['max_size']  = 5000;
        $nama_foto = time().$_FILES["file"]['name'];
        $config['file_name'] = $nama_foto;
 		$this->upload->initialize($config);

 		if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(validation_errors());
        }
        else
        {
        	
        	if ($this->input->post("foto") != null) {
        			if ($this->upload->do_upload('file')){
			        		$config2['image_library'] = 'gd2';
                            $config2['source_image'] = FCPATH.'/assets/img/slider/'.$this->upload->file_name;
                            $config2['new_image'] = FCPATH.'/assets/img/slider/thumbnails/'.$this->upload->file_name;
                            $config2['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
                            $config2['width'] = 3366;
                            $config2['height'] = 1500;
			                $this->image_lib->initialize($config2);

			                if ($this->image_lib->resize()){
			                	$hapus = unlink(FCPATH.'/assets/img/slider/'.$this->upload->file_name);

			                	if ($hapus) {
			                		$data = array('judul' => $this->input->post("Judul"),
                                                    'deskripsi' => $this->input->post("Deskripsi"),
                                                    'foto' => $this->upload->file_name
                                                    );


							        $update = $this->M_slider->update(array('id_slider' => $this->input->post("ide")), $data);

						           if ($update) {
						           		if ($this->input->post("file_asli") != null) {
						           			$delete = unlink(FCPATH.'/assets/img/slider/thumbnails/'.$this->input->post("file_asli"));
						           		}
										echo json_encode("success");
										}
			                	}else{
			                		echo json_encode("tak ada data !");
			                	}
			              	}else{
				              	$status = "error";
					            $msg = $this->image_lib->display_errors('', '');
					            echo json_encode($msg);  
				              	}        		
					        }
					        else{
				        	$status = "error";
				            $msg = $this->upload->display_errors();
				            echo json_encode($msg);
		        }	
        	}else{
            	$data = array('judul' => $this->input->post("Judul"),
                            'deskripsi' => $this->input->post("Deskripsi")
                            );

		        $update = $this->M_slider->update(array('id_slider' => $this->input->post("ide")), $data);

	           if ($update) {
					echo json_encode("success");
					}
        	}
        }
    }

    public function select_foto($Id)
    {
    	$foto = $this->M_slider->get_by_id($Id);
    	$url =  base_url().'assets/img/slider/thumbnails/'.$foto->foto;
    	echo json_encode($url);
    }

    public function select_data($id)
    {
    	$foto = $this->M_slider->get_by_id($id);

    	echo json_encode($foto);
    }

    public function delete_data($id)
    {
		        $update = $this->M_slider->delete(array('id_slider' => $id), $data);
	           if ($update) {
					echo json_encode("success");
				}
    }
}