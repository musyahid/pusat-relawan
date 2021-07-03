<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_bencana extends CI_Model {

    public function getAllBencana(){
        $this->db->from('bencana a');
        $this->db->join('kategori_bencana b', 'a.id_kategori_bencana = b.id_kategori_bencana');
   
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllKategoriBencana(){
        $this->db->from('kategori_bencana');
        $query = $this->db->get();
        return $query->result();
    }

    function input_bencana($data)
    {
       $this->db->insert('bencana', $data);
    }

    function hapus_bencana($id_bencana)
    {
        $this->db->where('id_bencana', $id_bencana);
        $this->db->delete('bencana');
    }
}
