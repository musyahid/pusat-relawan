<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bencana extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_bencana', 'bencana');
    }
	
	public function detail_bencana()
	{
		$id_bencana = $_GET['id_bencana'];
		$data['data_bencana'] = $this->bencana->getBencanaById($id_bencana);
		$this->load->view('front/bencana/detail_bencana', $data);
	}
}
