<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	//constructor
	public function __construct(){
        parent::__construct();
    }

	public function login()
	{
		$this->isGuest();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/login');
		$this->load->view('admin/layout/footer');
	}

	public function login_process(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//query
		$administrator = $this->db->query('SELECT * FROM administrator WHERE username="'.$username.'" AND password="'.sha1($password).'"')->row();
		if($administrator != null){
			$this->session->set_userdata('administrator', $administrator);
			redirect('admin/dashboard');
		}else{
			$this->session->set_flashdata('error', 'Username atau password salah');
			redirect('admin/auth/login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('administrator');
		redirect('admin/auth/login');
	}
}
