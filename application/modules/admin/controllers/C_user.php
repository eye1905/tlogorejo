<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class C_user extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('M_user');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index() {
		$data['user_lock'] = $this->M_user->get_data(1);
		$data['user_unlock'] = $this->M_user->get_data(0);
		$this->template->load('admin_template', 'user/user_index_view', $data);
	}

	public function save() {
		$this->form_validation->set_rules('user_id', 'User ID', 'required');
		$this->form_validation->set_rules('user_nama', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('user_password', 'Password', 'required');
		$this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'required|matches[password]');
		
		if ($this->form_validation->run() == FALSE) {
			$error = validation_errors();
			echo json_encode($error);
			//redirect('admin/C_user');
		}
		else {

			$data = array(
				'user_id' => $this->input->post('user_id'),
				'user_nama' => $this->input->post('user_nama'),
				'user_password' => md5($this->input->post('user_password')),
				'user_soft_delete' => "0",
				'user_log_time' => date('Y-m-d H:i:s')
			);
			var_dump($data);die;

			$this->M_user->tambah_data($data);
			//redirect('admin/C_user');
			// if ($this->input->post('user_password') == $this->input->post('user_confirm_password')) {
			// 	$data = array(
			// 		'user_id' => $this->input->post('user_id'),
			// 		'user_nama' => $this->input->post('user_nama'),
			// 		'user_password' => md5($this->input->post('user_password')),
			// 		'user_status' => TRUE,
			// 		'user_soft_delete' => FALSE,
			// 		'user_log_time' => date('Y-m-d H:i:s'),
			// 	);

			// 	$this->M_user->save_data('users', $data);
			// 	redirect('admin/C_user');	
			// }
			// else {
			// 	redirect('admin/C_user');
			// }
		}
	}
}