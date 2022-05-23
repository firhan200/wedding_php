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
		$data['list'] = $this->db->query('SELECT * FROM guest ORDER BY id DESC')->result();

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
		$is_add = true;

		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		
		if($id == null){
			$is_add = true;

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
			$is_add = false;

			$this->db->where('id', $id);
			$this->db->update('guest', $data);
		}

		//show flashdata message
		$this->session->set_flashdata('success', 'Successfully saved');

		if($is_add){
			redirect('admin/guest/index');
		}else{
			redirect('admin/guest/addedit/'.$id);
		}
	}

	public function delete($id = null){
		if($id != null){
			//get data
			$guest = $this->db->query('SELECT * FROM guest WHERE id='.$id)->row();
			if($guest != null){
				//delete
				$this->db->where('id', $id);
				$this->db->delete('guest');
			}
		}

		//show flashdata message
		$this->session->set_flashdata('success', 'Successfully delete data');

		redirect('admin/guest/index');
	}
}
