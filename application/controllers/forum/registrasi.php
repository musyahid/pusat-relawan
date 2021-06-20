<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_registrasi', 'registrasi');
		$this->load->model('model_forum', 'forum');
    }

	public function index()
	{
		$this->load->view('forum/registrasi_forum');
	}

    public function registrasi_forum() 
    {
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap Pendaftar', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('nomor_handphone', 'Nomor Handphone', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required');
		$this->form_validation->set_rules('nama_forum', 'Nama Forum Relawan', 'required');
		$this->form_validation->set_rules('tanggal_berdiri', 'Tanggal Pendirian', 'required');
		$this->form_validation->set_rules('logo_forum', 'Logo Forum', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
		$this->form_validation->set_rules('website', 'Website Organisasi', 'required');
		
		$this->form_validation->set_message('required', '{field} mohon diisi');


		$data['validation'] = array(
			'nama_lengkap' 		=> $this->input->post('nama_lengkap'), 
			'email'				=> $this->input->post('email'), 
			'password' 			=> md5($this->input->post('password')),
			'nomor_handphone'	=> $this->input->post('nomor_handphone'),
			'nama_forum' 		=> $this->input->post('nama_forum'), 
			'tanggal_berdiri' 	=> $this->input->post('tanggal_berdiri'), 
			'logo' 				=> 'tes', 
			'lokasi' 			=> $this->input->post('lokasi'), 
			'provinsi' 			=> $this->input->post('provinsi'), 
			'kabupaten'			=> $this->input->post('kabupaten'), 
			'kecamatan' 		=> $this->input->post('kecamatan'), 
			'kode_pos' 			=> $this->input->post('kode_pos'),
			'website' 			=> $this->input->post('website'),
		);

		$data_forum['forum'] = array(

		);

		
		if($this->form_validation->run() != false){

			$data = array(
				'nama_lengkap' 		=> $this->input->post('nama_lengkap'), 
				'email'				=> $this->input->post('email'), 
				'password' 			=> md5($this->input->post('password')),
				'nomor_handphone'	=> $this->input->post('nomor_handphone'),
				'role'				=> 'Forum'
			);

			//INSERT KE TABEL AKUN AND GET LAST ID AUTO INCREMENT
			$last_id_akun = $this->registrasi->input_akun($data);

			$data = array(
				'id_akun' 			=> $last_id_akun,
				'nama_forum' 		=> $this->input->post('nama_forum'),  
				'tanggal_berdiri' 	=> $this->input->post('tanggal_berdiri'), 
				'logo' 				=> 'tes', 
				'lokasi' 			=> $this->input->post('lokasi'), 
				'provinsi' 			=> $this->input->post('provinsi'), 
				'kabupaten'			=> $this->input->post('kabupaten'), 
				'kecamatan' 		=> $this->input->post('kecamatan'), 
				'kode_pos' 			=> $this->input->post('kode_pos'),
				'website' 			=> $this->input->post('website'),
			);
			//INSERT KE TABEL FORUM
			$this->forum->input_forum($data);

		}else{
			$this->load->view('forum/registrasi_forum', $data);
		}
    }
}
