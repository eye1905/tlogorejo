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

            //validasi jika user belum login
            //     if($this->session->userdata('loged_in') != TRUE){
            //      $url = base_url();
            //      redirect($url);
            // }
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

            if ($this->form_validation->run() == FALSE)
                {
                    echo json_encode(validation_errors());
                }
                else
                {
 		        $config['upload_path']          = FCPATH.'/assets/img/uploads';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|GIF|PNG|JPEG';
                $config['max_size']             = 2048;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $new_name = time().$_FILES["file"]['name'];
                $config['file_name'] = $new_name; 

                $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload('file'))
                    {
                            $error = array('error' => $this->upload->display_errors());
                            echo json_encode($error);
                    }
                    else
                    {
                            $config2['image_library'] = 'gd2';
                            $config2['source_image'] = FCPATH.'/assets/img/uploads/'.$this->upload->file_name;
                            $config2['new_image'] = FCPATH.'/assets/img/uploads/thumbnails/'.$this->upload->file_name;
                            $config2['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
                            $config2['width'] = 272;
                            $config2['height'] = 409;
                            $nama_foto = date("D/m/Y h:i:sa");
                            $config2['file_name'] = $nama_foto;

                            $this->image_lib->initialize($config2);

                            if ($this->image_lib->resize()){
                                $hapus = unlink(FCPATH.'/assets/img/uploads/'.$this->upload->file_name);

                                if ($hapus) {
                                    $data = array('Jabatan' => $this->input->post("Jabatan"),
                                        'nama' => $this->input->post("Nama"),
                                        'foto' => $this->upload->file_name,
                                        'id_role' => $this->input->post("child")
                                        );

                                    $this->M_struktur->tambah_data($data);

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
                }
     }

    public function update()
    {
    	
    	$this->form_validation->set_rules('Nama', 'Nama', 'required');
 		$this->form_validation->set_rules('Jabatan', 'Jabatan', 'required');
 		$this->form_validation->set_rules('child', 'Parent Id', 'required');

                $config['upload_path']          = FCPATH.'/assets/img/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|GIF|PNG|JPEG';
                $config['max_size']             = 2048;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $new_name = time().$_FILES["file"]['name'];
                $config['file_name'] = $new_name; 
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
			                $config2['source_image'] = FCPATH.'/assets/img/uploads/'.$this->upload->file_name;
			                $config2['new_image'] = FCPATH.'/assets/img/uploads/thumbnails/'.$this->upload->file_name;
			                $config2['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
			                $config2['width'] = 272;
			                $config2['height'] = 409;
			                $this->image_lib->initialize($config2);

			                if ($this->image_lib->resize()){
			                	$hapus = unlink(FCPATH.'/assets/img/uploads/'.$this->upload->file_name);
                                
			                	if ($hapus) {
			                		$data = array('Jabatan' => $this->input->post("Jabatan"),
			            				'nama' => $this->input->post("Nama"),
			            				'id_role' => $this->input->post("child"),
			            				'foto' => $this->upload->file_name
			            				);

							        $update = $this->M_struktur->update(array('id' => $this->input->post("ide")), $data);

						           if ($update) {
						           		if ($this->input->post("file_asli") != null) {
						           			$delete = unlink($path.'thumbnails/'.$this->input->post("file_asli"));
						           		}
										echo json_encode("success");
										}
			                	}else{
			                		$data = array('Jabatan' => $this->input->post("Jabatan"),
                                        'nama' => $this->input->post("Nama"),
                                        'id_role' => $this->input->post("child"),
                                        'foto' => $this->upload->file_name
                                        );

                                    $update = $this->M_struktur->update(array('id' => $this->input->post("ide")), $data);

                                   if ($update) {
                                        if ($this->input->post("file_asli") != null) {
                                            $delete = unlink($path.'thumbnails/'.$this->input->post("file_asli"));
                                        }
                                        echo json_encode("success");
                                        }
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
        		$data = array('Jabatan' => $this->input->post("Jabatan"),
            				'nama' => $this->input->post("Nama"),
            				'id_role' => $this->input->post("child")
            				);

		        $update = $this->M_struktur->update(array('id' => $this->input->post("ide")), $data);

	           if ($update) {
					echo json_encode("success");
					}
        	}
        }
    }

    public function select_foto($Id)
    {
    	$foto = $this->M_struktur->get_by_id($Id);
    	$url =  base_url().'assets/img/uploads/thumbnails/'.$foto->foto;
    	echo json_encode($url);
    }

    public function select_data($id)
    {
    	$foto = $this->M_struktur->get_by_id($id);

    	echo json_encode($foto);
    }

    public function delete_data($id)
    {
		      $update = $this->M_struktur->delete(array('id' => $id), $data);
	           if ($update) {
					echo json_encode("success");
				}
    }
}