<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_akun', 'akun');

    }
	
	public function index()
	{
		$this->load->view('admin/login');
	}

	public function aksi_login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', '{field} mohon diisi');

		if ($this->form_validation->run() != false) {
			//CEK INPUTAN USER
			$email      = $this->input->post('email');
			$password    = $this->input->post('password');

			//UBAH PASSWORD KE MD5 AGAR TERBACA DDENGAN PASSWORD DI DATABASE
			$passwordMD5 = MD5($password);

			//CEK AKUN KE MODEL (model_akun)
			$data_akun = $this->akun->cek_autentikasi($email, $passwordMD5);

			//CEK KEMBALIAN DATA
			//JIKA HASIL 0 ARTINYA DATA AKUN TIDAK DITEMUKAN
			//JIKA HASIL 1 ARTINYA DATA DITEMUKAN
			$hasil = count($data_akun);

			//JIKA HASIL > 0 ARTINYA DATA DITEMUKAN 
			if ($hasil > 0 ) {
				$id_akun = $data_akun[0]->id_akun;
				
				$id_akun = $this->akun->get_data_admin($id_akun)[0]->id_akun;
				$id_admin = $this->akun->get_data_admin($id_akun)[0]->id_admin;
				$nama_lengkap = $this->akun->get_data_admin($id_akun)[0]->nama_lengkap;
				$data_session = array(
                    'id_akun' => $id_akun,
                    'id_admin' => $id_admin,
                    'nama_lengkap' => $nama_lengkap,
					'login' => TRUE
                );
             
                $this->session->set_userdata($data_session);

				redirect(base_url('admin/dashboard'));
			}else {
				//TAMPILKAN PESAN KETIKA GAGAL LOGIN
				$this->session->set_flashdata('msg', '
				<div class="alert alert-block alert-danger"></i></button>
				<i class="ace-icon fa fa-bullhorn green"></i> EMAIL ATAU PASSWORD SALAH
				</div>');
				redirect(base_url('admin/login'));
			}
		} else {
			$this->load->view('admin/login');
		}
	}

}
