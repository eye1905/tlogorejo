<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_setting extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
            $this->load->model('M_setting');
		    $this->load->library('form_validation');
		    ini_set('display_errors', 0);

            //validasi jika user belum login
            // if($this->session->userdata('loged_in') != TRUE){
            //     $url = base_url();
            //     redirect($url);
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
 		$data['setting'] = $this->M_setting->get_data_list();
        $this->template->load('admin_template', 'setting_view', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('Nama', 'Nama Setting', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telepon', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(strip_tags(validation_errors()));
        }
        else
        {
            $data = array('nama' => strip_tags($this->input->post("Nama")),
                            'deskripsi' => strip_tags($this->input->post("deskripsi")),
                            'alamat' => strip_tags($this->input->post("alamat")),
                            'telp' => strip_tags($this->input->post("telp")),
                            'email' => strip_tags($this->input->post("email")),
                            'wa' => strip_tags($this->input->post("wa")),
                            'twitter' => strip_tags($this->input->post("twitter")),
                            'fb' => strip_tags($this->input->post("fb")),
                            'ig' => strip_tags($this->input->post("ig")),
                            'google' => strip_tags($this->input->post("google")),
                            'linkedin' => strip_tags($this->input->post("linkedin"))
                            );
            
                $this->M_setting->tambah_data($data);

                echo json_encode("success");
        }
    }
}