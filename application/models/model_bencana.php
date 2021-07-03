<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_bencana extends CI_Model {

    public function getAllKategoriBencana(){
        $this->db->from('kategori_bencana');
        $query = $this->db->get();
        return $query->result();
    }

    function input_bencana($data)
    {
       $this->db->insert('bencana', $data);
    }
}
