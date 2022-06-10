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

				//insert log
				$this->db->insert('guest_log', array(
					'guest_id' => $guest->id,
					'action' => 'Visit Page'
				));
			}
		}

		$this->load->view('layout/header');

		if($data['is_valid']){
			$data['guest'] = $guest;
			$this->load->view('home', $data);
		}else{
			$this->load->view('invitation_not_found');
		}

		$this->load->view('layout/footer');
	}

	public function open_invitation(){
		$res = array(
			'error' => null,
			'data' => null
		);

		$token = $this->input->post('token');
		$log = $this->input->post('log');

		//check if token is valid
		$guest = $this->db->query('SELECT * FROM guest WHERE token="'.$token.'"')->row();
		if($guest){
			//insert log
			$this->db->insert('guest_log', array(
				'guest_id' => $guest->id,
				'action' => $log
			));
		}else{
			$res['error'] = 'Invalid Token';
		}

		echo json_encode($res);
	}
}
