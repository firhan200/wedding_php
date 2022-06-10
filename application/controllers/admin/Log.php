<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends MY_Controller {
	//constructor
	public function __construct(){
        parent::__construct();

		$this->isLoggedIn();
    }

	public function index()
	{
		$guest_id = null;
		if($this->input->get('guest_id') != null){
			$guest_id = $this->input->get('guest_id');
		}

		//get guest
		$guest = null;
		if($guest_id != null){
			$guest = $this->db->query('SELECT * FROM guest WHERE id='.$guest_id)->row();
			if(empty($guest)){
				//throw error
				$this->session->set_flashdata('error', 'Guest not found');
			}
		}

		$data['guest'] = $guest;

		//get all query
		$query = 'SELECT gl.*, g.name FROM guest_log gl LEFT JOIN guest g ON gl.guest_id=g.id';

		//check if by guest
		if($guest_id != null){
			$query .= ' WHERE gl.guest_id='.$guest_id;
		}

		//query for order
		$query .= ' ORDER BY gl.id DESC';

		$data['list'] = $this->db->query($query)->result();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/guest/log', $data);
		$this->load->view('admin/layout/footer');
	}
}
