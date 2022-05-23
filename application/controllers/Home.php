<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['is_valid'] = false;

		//check token
		$token = $this->input->get('token');
		//check if valid
		if($token != null){
			$guest = $this->db->query('SELECT * FROM guest WHERE token="'.$token.'"')->row();
			if($guest != null){
				$data['is_valid'] = true;
			}
		}

		$this->load->view('layout/header');

		if($data['is_valid']){
			$this->load->view('home');
		}else{
			$this->load->view('invitation_not_found');
		}

		$this->load->view('layout/footer');
	}
}
