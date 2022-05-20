<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public function isLoggedIn(){
        if(!$this->session->userdata('administrator')){
            redirect('admin/auth/login');
        }
    }

    public function isGuest(){
        if($this->session->userdata('administrator')){
            redirect('admin/dashboard');
        }
    }
}
