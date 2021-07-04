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

	public function input_pengajuan_relawan()
	{
		$data = array(
			'id_forum' 			=> $this->input->post('id_forum'), 
			'id_relawan'		=> $this->session->userdata('id_relawan'),
			'alasan_bergabung' 	=> $this->input->post('alasan_bergabung')
		);


		$this->forum->inputPengajuanRelawan($data);
		$this->session->set_flashdata('msg', '
		<div class="alert alert-block alert-success"></i></button>
		<i class="ace-icon fa fa-bullhorn green "></i> <p class="text-center"> PENGAJUAN BERGABUNG SEDANG DIPROSES. SILAHKAN MENUNGGU INFORMASI SELANJUTNYA </p>
		</div>');
		redirect(base_url('forum_relawan/detail_forum?id_forum='.$data['id_forum']));
	}

}
