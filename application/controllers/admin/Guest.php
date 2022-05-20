<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends MY_Controller {
	//constructor
	public function __construct(){
        parent::__construct();

		$this->isLoggedIn();
    }

	public function index()
	{
		$data['list'] = $this->db->query('SELECT * FROM guest')->result();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/guest/list', $data);
		$this->load->view('admin/layout/footer');
	}

	public function addedit($id = null)
	{
		$data = array(
			'id' => null,
			'name' => null,
			'email' => null,
			'link' => null,
		);

		if($id != null){
			$data = $this->db->query('SELECT * FROM guest WHERE id='.$id)->row();
		}

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/guest/addedit', $data);
		$this->load->view('admin/layout/footer');
	}

	public function addedit_process($id = null)
	{
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		
		if($id == null){
			//get last data
			$number = 1;
			$last = $this->db->query('SELECT * FROM guest ORDER BY id DESC LIMIT 1')->row();
			if($last != null){
				$number = $last->id + 1;
			}
			$data['token'] = sha1($number);

			$this->db->insert('guest', $data);

			//get last id
			$id = $this->db->insert_id();
		}else{
			$this->db->where('id', $id);
			$this->db->update('guest', $data);
		}

		redirect('admin/guest/addedit/'.$id);
	}
}
