<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rsvp extends CI_Controller {
	public function submit()
	{
		$res = array(
			'error' => null,
			'message' => null
		);

		//get data
		$token = $this->input->post('token');
		$message = $this->input->post('message');

		//validate token
		$guest = $this->db->query('SELECT * FROM guest WHERE token="'.$token.'"')->row();
		if($guest == null){
			$res['error'] = 'Undangan tidak ditemukan.';
		}

		//check message
		if($res['error'] == null){
			//validate message
			if($message == null || strlen($message) < 1){
				$res['error'] = 'Mohon tulis pesan yang ingin dikirimkan.';
			}
		}

		//check if already sent message
		if($res['error'] == null){
			$rsvps = $this->db->query('SELECT * FROM rsvp WHERE guest_id="'.$guest->id.'"')->result();
			if(count($rsvps) > 2){
				$res['error'] = 'Anda sudah mencapai batas maksimal mengirimkan pesan.';
			}
		}

		//save message
		if($res['error'] == null){
			$this->db->insert('rsvp', array(
				'guest_id' => $guest->id,
				'message' => $message
			));

			$res['message'] = 'Pesan berhasil dikirimkan.';
		}

		echo json_encode($res);
	}

	public function list(){
		//get list of rsvp
		$rsvps = $this->db->query('SELECT rsvp.*, guest.name as name FROM rsvp LEFT JOIN guest ON rsvp.guest_id=guest.id ORDER BY rsvp.id DESC')->result();

		echo json_encode($rsvps);
	}
}
