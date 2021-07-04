<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_bencana', 'bencana');
		$this->load->model('model_forum_relawan', 'forum');
    }
	
	public function index()
	{
		$data['data_bencana'] = $this->bencana->getAllBencanaPublish();
		$data['data_forum'] = $this->forum->getAllForum();
		$this->load->view('beranda', $data);
	}
}
