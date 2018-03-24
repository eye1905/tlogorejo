<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_role_struktur extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model('M_role_struktur');
		    $this->load->library('form_validation');
		    ini_set('display_errors', 0);
		}

    public function index()
    {
 		$data['role'] = $this->M_role_struktur->get_data_list();
 		$this->template->load('admin_template', 'role_struktur', $data);
    }

    public function save_role()
    {
 		$this->form_validation->set_rules('Nama', 'Nama Prioritas', 'required');
 		$this->form_validation->set_rules('Prioritas', 'Prioritas', 'required');

 		if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(validation_errors());
        }
        else
        {
            $select = $this->M_role_struktur->get_by_field($this->input->post("Prioritas"));
            if (count($select) >0 ) {
            	echo json_encode("Prioritas");
            } else{
            	$data = array('nama_role' => $this->input->post("Nama"),
            				'prioritas_role' => $this->input->post("Prioritas"),
            				'head_color' => $this->input->post("Warna"),
            				'soft_delete' => "1",
            				'log_time' =>  date("Y-m-d h:i:sa")
            				);

	            $this->M_role_struktur->tambah_data($data);

	            echo json_encode("success");
            }
        }
	}

	public function select_role($id)
	{
		$data = $this->M_role_struktur->get_by_id($id);

		echo json_encode($data);
	}

	public function delete_role($id)
	{
		$data = array('soft_delete' => "0",
            			'log_time' =>  date("Y-m-d h:i:sa")
            			);

		$update = $this->M_role_struktur->update(array('id_role' => $id), $data);
		if ($update) {
			echo json_encode("success");
		}
	}

	 public function update_role()
    {
 		$this->form_validation->set_rules('Nama', 'Nama Prioritas', 'required');
 		$this->form_validation->set_rules('Prioritas', 'Prioritas', 'required');

 		if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(validation_errors());
        }
        else
        {
            	$data = array('nama_role' => $this->input->post("Nama"),
            				'prioritas_role' => $this->input->post("Prioritas"),
            				'head_color' => $this->input->post("Warna"),
            				'soft_delete' => "1",
            				'log_time' =>  date("Y-m-d h:i:sa")
            				);

	            $update = $this->M_role_struktur->update(array('id_role' => $this->input->post("id_role")), $data);

	           if ($update) {
					echo json_encode("success");
					}
        }
	}
}