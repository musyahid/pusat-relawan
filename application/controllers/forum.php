<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forum_relawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('tanggal');
		$this->load->model('model_forum_relawan', 'forum');
    }
	
	public function detail_forum()
	{
		$id_forum = $_GET['id_forum'];
		$data['data_forum'] = $this->forum->getForumById($id_forum);
		$this->load->view('front/forum/detail_forum', $data);
	}
}
