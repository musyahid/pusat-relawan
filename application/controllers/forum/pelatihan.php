<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelatihan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pelatihan', 'pelatihan');
		$this->load->model('model_kategori_pelatihan', 'kategori_pelatihan');
		if($this->session->userdata('login_forum') == FALSE) {
	    	redirect(base_url("login"));
	    }
    }
	
	public function index()
	{
        $data['data_pelatihan'] = $this->pelatihan->getAllPelatihan();
		$this->load->view('back/forum_relawan/pelatihan/list_pelatihan', $data);
	}


    public function tambah_pelatihan()
    {
        if(isset($_POST['kirim'])) {
            $this->form_validation->set_rules('nama_pelatihan', 'Nama Peltihan', 'required');
            $this->form_validation->set_rules('kategori_pelatihan', 'Kategori pelatihan', 'required');
            $this->form_validation->set_rules('id_jenis_pelatihan', 'Jenis Pelatihan', 'required');
            $this->form_validation->set_rules('tanggal_pelatihan', 'Tanggal Pelatihan', 'required');
            $this->form_validation->set_rules('waktu_pelatihan', 'Waktu Pelatihan', 'required');
            $this->form_validation->set_rules('kuota_pelatihan', 'Kuota ', 'required');
            $this->form_validation->set_rules('deskripsi_pelatihan', 'Deskripsi Pelatihan ', 'required');
			$this->form_validation->set_message('required', '{field} mohon diisi');

		    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if($this->form_validation->run() != false) {

            $tanggal_pelatihan = $this->input->post('tanggal_pelatihan');

            $tanggal_pelatihan_array = explode("-", $tanggal_pelatihan);

            $index_tanggal = $tanggal_pelatihan_array['0'];

            $pecah_tanggal = explode("/", $index_tanggal);

            $convert_tanggal = str_replace(' ','', $pecah_tanggal['2']."-".$pecah_tanggal['0']."-".$pecah_tanggal['1']);
            
            $data_pelatihan = array(
                'id_forum'                  => $this->session->userdata('id_forum'),
                'nama_pelatihan' 		    => $this->input->post('nama_pelatihan'), 
                'id_kategori_pelatihan'     => $this->input->post('kategori_pelatihan'), 
                'id_jenis_pelatihan' 		=> $this->input->post('id_jenis_pelatihan'),
                'tanggal_pelatihan'         => $convert_tanggal,
                'deskripsi_pelatihan'       => $this->input->post('deskripsi_pelatihan'),
                'waktu'          	        => $this->input->post('waktu_pelatihan'),
                'kuota'	                    => $this->input->post('kuota_pelatihan')
            );

            //INSERT KE TABEL PELATIHAN
            $this->pelatihan->inputPelatihan($data_pelatihan);
            echo $this->session->set_flashdata('msg','Ditambah');
            redirect('forum/pelatihan');

            }else { 
                $data['kategori_pelatihan'] = $this->pelatihan->getAllKategoriPelatihan();
                $data['jenis_pelatihan'] = $this->pelatihan->getAllJenisPelatihan();
                $this->load->view('back/forum_relawan/pelatihan/tambah_pelatihan', $data);
            }
        }else { 
            $data['kategori_pelatihan'] = $this->pelatihan->getAllKategoriPelatihan();
            $data['jenis_pelatihan'] = $this->pelatihan->getAllJenisPelatihan();
            $this->load->view('back/forum_relawan/pelatihan/tambah_pelatihan', $data);
        }
    }

    public function edit_pelatihan()
    {
        if (isset($_POST['kirim'])) {
            $tanggal_pelatihan = $this->input->post('tanggal_pelatihan');

            $tanggal_pelatihan_array = explode("-", $tanggal_pelatihan);

            $index_tanggal = $tanggal_pelatihan_array['0'];

            $pecah_tanggal = explode("/", $index_tanggal);

            $convert_tanggal = str_replace(' ','', $pecah_tanggal['2']."-".$pecah_tanggal['0']."-".$pecah_tanggal['1']);

            $data_pelatihan = array(
                'id_pelatihan' 		    => $this->input->post('id_pelatihan'), 
                'nama_pelatihan' 		    => $this->input->post('nama_pelatihan'), 
                'id_kategori_pelatihan'     => $this->input->post('kategori_pelatihan'), 
                'id_jenis_pelatihan' 			=> $this->input->post('id_jenis_pelatihan'),
                'tanggal_pelatihan'         => $convert_tanggal,
                'deskripsi_pelatihan'       => $this->input->post('deskripsi_pelatihan'),
                'waktu'          	        => $this->input->post('waktu_pelatihan'),
                'kuota'	                    => $this->input->post('kuota_pelatihan')
            );

            print_r($data_pelatihan);
            die();

            $this->pelatihan->editPelatihan($data_pelatihan);
            echo $this->session->set_flashdata('msg','Diubah');
            redirect('forum/pelatihan');

        }else {
            $id_pelatihan = $_GET['id_pelatihan'];
            $data['kategori_pelatihan'] = $this->pelatihan->getAllKategoriPelatihan();
            $data['jenis_pelatihan'] = $this->pelatihan->getAllJenisPelatihan();
            $data['data_pelatihan'] = $this->pelatihan->getPelatihanById($id_pelatihan);
            $this->load->view('back/forum_relawan/pelatihan/edit_pelatihan', $data);
        }
        
    }

    public function hapus_pelatihan()
    {
       $id_pelatihan = $_GET['id_pelatihan'];
       $this->pelatihan->hapusPelatihan($id_pelatihan);
       echo $this->session->set_flashdata('msg','Dihapus');
       redirect('forum/pelatihan');
    }

    public function list_kategori_pelatihan()
    {
        $data['data_kategori_pelatihan'] = $this->kategori_pelatihan->getAllKategoriPelatihan();
        $this->load->view('back/forum_relawan/kategori_pelatihan/list_kategori_pelatihan', $data);
    }

    public function tambah_kategori_pelatihan()
    {
        $nama_kategori_pelatihan = $this->input->post('nama_kategori_pelatihan');
        $data = array(
            'nama_kategori_pelatihan' => $nama_kategori_pelatihan
        );
        $this->kategori_pelatihan->inputKategoriPelatihan($data);
        echo $this->session->set_flashdata('msg','Ditambah');
        redirect('forum/pelatihan/list_kategori_pelatihan');
    }

    public function hapus_kategori_pelatihan()
    {
        $id_kategori_pelatihan = $_GET['id_kategori_pelatihan'];
        $this->kategori_pelatihan->hapusKategoriPelatihan($id_kategori_pelatihan);
        echo $this->session->set_flashdata('msg','Dihapus');
        redirect('forum/pelatihan/list_kategori_pelatihan');
    }

    public function list_pengajuan_pelatihan()
	{
		$id_forum = $this->session->userdata('id_forum');
        $data['data_pengajuan'] = $this->pelatihan->getAllPengajuanPelatihanByForumId($id_forum);
		$this->load->view('back/forum_relawan/pelatihan/list_pengajuan', $data);
	}

	public function detail_pengajuan_pelatihan()
	{
		$id_relawan = $_GET['id_relawan'];
		$data['data_pengajuan_pelatihan'] = $this->pelatihan->getDetailPengajuanPelatihanById($id_relawan);
		$this->load->view('back/forum_relawan/pelatihan/detail_pengajuan', $data);
	}

	public function acc_pengajuan_pelatihan()
	{
		$id_relawan = $_GET['id_relawan'];
		$this->pelatihan->accPengajuanPelatihanRelawan($id_relawan);
		echo $this->session->set_flashdata('msg','Disetujui');
		redirect('forum/pelatihan');
	}

	public function tolak_pengajuan_pelatihan()
	{
		$id_relawan = $_GET['id_relawan'];
		$this->pelatihan->tolakPengajuanPelatihanRelawan($id_relawan);
		echo $this->session->set_flashdata('msg','Ditolak');
		redirect('forum/relawan/list_pengajuan_relawan');
	}

    

}
