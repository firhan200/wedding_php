<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	//constructor
	public function __construct(){
        parent::__construct();
    }

	public function index()
	{
		$this->isLoggedIn();

		//get latest log
		$data['latest_logs'] = $this->db->query('SELECT gl.*, g.name FROM guest_log gl LEFT JOIN guest g ON gl.guest_id=g.id ORDER BY gl.id DESC LIMIT 0, 20')->result();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/layout/footer');
	}
}
