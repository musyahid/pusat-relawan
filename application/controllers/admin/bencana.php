<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bencana extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_bencana', 'bencana');
		if($this->session->userdata('login_admin') == FALSE) {
	    	redirect(base_url("login"));
	    }
    }

	public function list_bencana()
	{
		$data['data_bencana'] = $this->bencana->getAllBencana();
		$this->load->view('back/admin/bencana/list_pengajuan', $data);
	}
	
	public function list_pengajuan_bencana()
	{
		$data['data_pengajuan'] = $this->bencana->getAllPengajuan();
		$this->load->view('back/admin/bencana/list_pengajuan', $data);
	}

	public function detail_pengajuan_bencana()
	{
		$id_bencana = $_GET['id_bencana'];
		$data['data_bencana'] = $this->bencana->getBencanaById($id_bencana);
		$this->load->view('back/admin/bencana/detail_pengajuan', $data);
	}

	public function hapus_pengajuan_bencana()
	{
		$id_bencana = $_GET['id_bencana'];
		$this->bencana->hapus_bencana($id_bencana);
		echo $this->session->set_flashdata('msg','Dihapus');
		redirect('admin/bencana/list_pengajuan_bencana');
	}

}
