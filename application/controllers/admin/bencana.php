<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bencana extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_akun', 'akun');
		if($this->session->userdata('login_forum') == FALSE) {
	    	redirect(base_url("login"));
	    }
    }
	
	public function index()
	{
		$this->load->view('admin/forum_relawan/');
	}

    

}
