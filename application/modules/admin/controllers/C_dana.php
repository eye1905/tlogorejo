<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_dana extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model('M_sumber_dana');
            $this->load->model('M_dana');
            $this->load->model('M_struktur');
		    $this->load->library('form_validation');
		    ini_set('display_errors', 0);

            //validasi jika user belum login
            if($this->session->userdata('loged_in') != TRUE){
                $url = base_url();
                redirect($url);
            }
		}

    public function index()
    {
 		$data['sumber'] = $this->M_sumber_dana->get_data_list();
        $data['dana'] = $this->M_dana->get_data_list();
        $data['stuktur'] = $this->M_struktur->get_data_list();
 		$this->template->load('admin_template', 'dana_desa', $data);
    }

    public function save()
    {
 		$this->form_validation->set_rules('sumberdana', 'Nama Sumber Dana', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('nama_struktur', 'Nama Strukutr', 'required');
        $this->form_validation->set_rules('keterangandana', 'keterangan', 'required');

 		if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(strip_tags(validation_errors()));
        }
        else
        {
            $data = array('id_sumberdana' => strip_tags($this->input->post("sumberdana")),
                            'id_user' => strip_tags($this->input->post("nama_struktur")),
                            'jumlah' => strip_tags($this->input->post("nominal")),
                            'keterangan' => strip_tags($this->input->post("keterangandana"))
                            );
                
                $this->M_dana->tambah_data($data);

                echo json_encode("success");
        }
	}

	public function select_dana($id)
	{
		$data = $this->M_dana->get_by_id($id);

		echo json_encode($data);
	}

	public function delete_dana($id)
	{
		$update = $this->M_dana->delete(array('id' => $id), $data);
		if ($update) {
			echo json_encode("success");
		}
	}

	 public function update()
    {
 		$this->form_validation->set_rules('sumberdana', 'Nama Sumber Dana', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('nama_struktur', 'Nama Strukutr', 'required');
        $this->form_validation->set_rules('keterangandana', 'keterangan', 'required');

 		if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(validation_errors());
        }
        else
        {
            	$data = array('id_sumberdana' => strip_tags($this->input->post("sumberdana")),
                            'id_user' => strip_tags($this->input->post("nama_struktur")),
                            'jumlah' => strip_tags($this->input->post("nominal")),
                            'keterangan' => strip_tags($this->input->post("keterangandana"))
                            );

	            $update = $this->M_dana->update(array('id' => strip_tags($this->input->post("id_dana"))), $data);

	           if ($update) {
					echo json_encode("success");
					}
        }
	}
}