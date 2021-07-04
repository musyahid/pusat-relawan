<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelatihan extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pelatihan', 'pelatihan');
		if($this->session->userdata('login_forum') == FALSE) {
	    	redirect(base_url("login"));
	    }
    }
	
	public function index()
	{
		$this->load->view('back/forum_relawan/pelatihan/list_pelatihan');
	}


    public function tambah_pelatihan()
    {
        if(isset($_POST['kirim'])) {
            $this->form_validation->set_rules('nama_bencana', 'Nama Bencana', 'required');
            $this->form_validation->set_rules('kategori_bencana', 'Kategori Bencana', 'required');
            $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
            $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
            $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'required');
            $this->form_validation->set_rules('link_berita_bencana', 'Link Berita', 'required');
            $this->form_validation->set_rules('latitude', 'Latitude', 'required');
            $this->form_validation->set_rules('longitude', 'Longitude', 'required');
            $this->form_validation->set_rules('warna', 'Warna', 'required');
            $this->form_validation->set_rules('gambar', 'Gambar', 'callback_file_selected');
			$this->form_validation->set_message('required', '{field} mohon diisi');

		    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if($this->form_validation->run() != false) {

                $config['upload_path'] 		= './assets/images/gambar_bencana'; //path folder
                $config['allowed_types']	= 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['max_size']         = 1024; // 1MB
                $config['encrypt_name'] 	= TRUE; //nama yang terupload nantinya
        
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar'))
                {
                    $gambar = $this->upload->data();
				    $gambar_name = $gambar['file_name'];

                    $data_bencana = array(
                        'nama_bencana' 		    => $this->input->post('nama_bencana'), 
                        'id_kategori_bencana'   => $this->input->post('kategori_bencana'), 
                        'kecamatan' 			=> $this->input->post('kecamatan'),
                        'kabupaten'         	=> $this->input->post('kabupaten'),
                        'provinsi'          	=> $this->input->post('provinsi'),
                        'alamat_lengkap'	    => $this->input->post('alamat_lengkap'),
                        'link_berita'	        => $this->input->post('link_berita'),
                        'latitude'	            => $this->input->post('latitude'),
                        'longitude'	            => $this->input->post('longitude'),
                        'warna'	                => $this->input->post('warna'),
                        'gambar'                => $gambar_name
                    );

                    //INSERT KE TABEL BENCANA
				  $this->bencana->input_bencana($data_bencana);
                echo $this->session->set_flashdata('msg','Ditambah');
                redirect('forum/bencana');

                } else {
                    $this->session->set_flashdata('msg',  $this->upload->display_errors());
                    $data['kategori_bencana'] = $this->bencana->getAllKategoriBencana();
                    $this->load->view('back/forum_relawan/bencana/tambah_bencana', $data);
                }
            }else { 
                $data['kategori_bencana'] = $this->bencana->getAllKategoriBencana();
                $this->load->view('back/forum_relawan/bencana/tambah_bencana', $data);
            }
        }else { 
            $data['kategori_bencana'] = $this->bencana->getAllKategoriBencana();
            $this->load->view('back/forum_relawan/bencana/tambah_bencana', $data);
        }
    }

    public function file_selected(){

        $this->form_validation->set_message('file_selected', 'Gambar Harus Diisi');
        if (empty($_FILES['gambar']['name'])) {
                return false;
            }else{
                return true;
            }
	}

}
