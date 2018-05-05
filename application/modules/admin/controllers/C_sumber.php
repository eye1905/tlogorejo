<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_sumber extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model('M_sumber_dana');
		    $this->load->library('form_validation');
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
 		$data['sumber'] = $this->M_sumber_dana->get_data_list();
 		$this->template->load('admin_template', 'sumber_dana_view', $data);
    }

    public function save()
    {
 		$this->form_validation->set_rules('Nama', 'Nama Sumber Dana', 'required');

 		if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(strip_tags(validation_errors()));
        }
        elseif ($this->input->post("Nama") ==  "The Nama Sumber Dana field is required.") {
            echo json_encode(strip_tags(validation_errors()));
        }
        else
        {
            $select = $this->M_sumber_dana->get_by_field($this->input->post("Nama"));
            if (count($select) >0 ) {
            	echo json_encode("Nama Sudah Ada !");
            } else{

            	$data = array('nama_sumber' => $this->input->post("Nama"));

	            $this->M_sumber_dana->tambah_data($data);

	            echo json_encode("success");
            }
        }
	}

	public function select_sumber($id)
	{
		$data = $this->M_sumber_dana->get_by_id($id);

		echo json_encode($data);
	}

	public function delete_sumber($id)
	{
		$update = $this->M_sumber_dana->delete(array('id_sumber' => $id), $data);
		if ($update) {
			echo json_encode("success");
		}
	}

	 public function update()
    {
 		$this->form_validation->set_rules('Nama', 'Nama Prioritas', 'required');

 		if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(validation_errors());
        }
         elseif ($this->input->post("Nama") ==  "The Nama Sumber Dana field is required.") {
            echo json_encode(strip_tags(validation_errors()));
        }
        else
        {
            	$data = array('nama_sumber' => $this->input->post("Nama"));

	            $update = $this->M_sumber_dana->update(array('id_sumber' => $this->input->post("Id")), $data);

	           if ($update) {
					echo json_encode("success");
					}
        }
	}
}