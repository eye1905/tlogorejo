<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_dana extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model('M_sumber_dana');
		    $this->load->library('form_validation');
		    ini_set('display_errors', 0);
		}

    public function index()
    {
 		$data['sumber'] = $this->M_sumber_dana->get_data_list();
 		$this->template->load('admin_template', 'dana_desa', $data);
    }

    public function save()
    {
 		$this->form_validation->set_rules('Nama', 'Nama Sumber Dana', 'required');

 		if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(strip_tags(validation_errors()));
        }
        else
        {
            $select = $this->M_sumber_dana->get_by_field($this->input->post("Nama"));
            if (count($select) >0 ) {
            	echo json_encode("Nama Sudah Ada !");
            } else{
            	$data = array('nama_sumber' => $this->input->post("Nama"),
            				'soft_delete' => "1",
            				'log_time' =>  date("Y-m-d h:i:sa")
            				);

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
		$data = array('soft_delete' => "0",
            			'log_time' =>  date("Y-m-d h:i:sa")
            			);

		$update = $this->M_sumber_dana->update(array('id_sumber' => $id), $data);
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
        else
        {
            	$data = array('nama_sumber' => $this->input->post("Nama"),
            				'soft_delete' => "1",
            				'log_time' =>  date("Y-m-d h:i:sa")
            				);

	            $update = $this->M_sumber_dana->update(array('id_sumber' => $this->input->post("Id")), $data);

	           if ($update) {
					echo json_encode("success");
					}
        }
	}
}