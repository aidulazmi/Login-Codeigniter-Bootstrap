<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	function proses(){
	$post = $this->input->post(null, true);
	if (isset($post['login'])) {
		$this->load->model('mlogin');
		$query = $this->mlogin->login($post);
		if($query ->num_rows()> 0 ){
			$row = $query->row();
			$parameter = array (
			'id' => $row->id,
			'level' => $row->level
			);
			$this->session->set_userdata($parameter);
			echo "Login Berhasil";
		}else{
		redirect('c_login/index');
		}
		
	}
	}
	
}
