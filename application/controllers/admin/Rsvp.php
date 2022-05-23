<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rsvp extends MY_Controller {
	//constructor
	public function __construct(){
        parent::__construct();

		$this->isLoggedIn();
    }

	public function index()
	{
		$data['list'] = $this->db->query('SELECT r.*, g.name as name FROM rsvp r LEFT JOIN guest g ON r.guest_id=g.id ORDER BY r.id DESC')->result();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/rsvp/list', $data);
		$this->load->view('admin/layout/footer');
	}

	public function delete($id = null){
		if($id != null){
			//get data
			$guest = $this->db->query('SELECT * FROM rsvp WHERE id='.$id)->row();
			if($guest != null){
				//delete
				$this->db->where('id', $id);
				$this->db->delete('rsvp');
			}
		}

		//show flashdata message
		$this->session->set_flashdata('success', 'Successfully delete data');

		redirect('admin/rsvp/index');
	}
}
