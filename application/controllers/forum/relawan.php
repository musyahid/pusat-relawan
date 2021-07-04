<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class relawan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_akun', 'akun');
		$this->load->model('model_forum_relawan', 'relawan');
		$this->load->model('model_relawan', 'forum_relawan');
		if($this->session->userdata('login_forum') == FALSE) {
	    	redirect(base_url("login"));
	    }
    }

	public function index()
	{
		$data['data_relawan'] = $this->forum_relawan->getAllRelawan();
		$this->load->view('back/forum_relawan/relawan/list_relawan', $data);
	}
	
	public function detail_relawan()
	{
		$id_relawan = $_GET['id_relawan'];
		$data['data_relawan'] = $this->forum_relawan->getRelawanById($id_relawan);
		$this->load->view('back/forum_relawan/relawan/detail_relawan', $data);
	}
	public function list_pengajuan_relawan()
	{
        $data['data_pengajuan'] = $this->relawan->getAllPengajuanRelawan();
		$this->load->view('back/forum_relawan/relawan/list_pengajuan', $data);
	}

	public function detail_pengajuan_relawan()
	{
		$id_relawan = $_GET['id_relawan'];
		$data['pengajuan_relawan'] = $this->relawan->getPengajuanRelawanById($id_relawan);
		$this->load->view('back/forum_relawan/relawan/detail_pengajuan', $data);
	}

	public function acc_pengajuan_relawan()
	{
		$id_relawan = $_GET['id_relawan'];
		$this->relawan->accPengajuanRelawan($id_relawan);
		echo $this->session->set_flashdata('msg','Ditambah');
		redirect('forum/relawan');
	}


}
