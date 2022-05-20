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

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layout/footer');
	}
}
