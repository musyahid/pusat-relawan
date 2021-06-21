<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_akun', 'akun');
		if($this->session->userdata('login') == FALSE) {
	    	redirect(base_url("admin/login"));
	    }
    }
	
	public function index()
	{
		$this->load->view('admin/dashboard');
	}

}
