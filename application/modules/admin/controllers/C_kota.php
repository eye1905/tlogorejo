<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class C_kota extends MY_Controller {
 	
 		function __construct() {
		    parent::__construct();
		    $this->load->model("M_kota");
		    $this->load->library('form_validation');
		}

    public function index()
    {
 		
 		$data['aku'] = $this->M_kota->index();;
 		$this->template->load('admin_template', 'kota_view', $data);
    }
    public function simpan_provinsi()
    {
 		$this->form_validation->set_rules('provinsi','Nama Provinsi', 'required');
 		$data = array('nama_provinsi' => $this->input->post('provinsi'));

 		if ($this->form_validation->run() == FALSE){
				echo json_encode("Jangan Kosongi Kolom");
			}else{
				$insert = $this->M_kota->tambah($data);
				if ($insert) {
 					echo json_encode("success");
 				}
            }
    }
}