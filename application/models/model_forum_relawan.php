<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_forum_relawan extends CI_Model {


    //FOR ADMIN PANEL

    public function input_forum($data)
    {
        $this->db->insert('forum', $data);
    }

    public function getAllForum(){
        $this->db->from('akun a');
        $this->db->join('forum f', 'a.id_akun = f.id_akun');

        $query = $this->db->get();
        return $query->result();
    }
    

    public function getForumById($id_forum)
    {
        $this->db->from('forum a');
        $this->db->join('akun f', 'a.id_akun = f.id_akun');
        $this->db->where('a.id_forum', $id_forum);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllPengajuan(){
        $this->db->from('akun a');
        $this->db->join('forum f', 'a.id_akun = f.id_akun');
        $this->db->where('status_pengajuan', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function getPengajuanById($id_akun)
    {
        $this->db->from('akun a');
        $this->db->join('forum f', 'a.id_akun = f.id_akun');
        $this->db->where('a.id_akun', $id_akun);
        $query = $this->db->get();
        return $query->result();
    }

    public function accPengajuanForum($id_forum)
    {
        $this->db->set('status_pengajuan', 1);
        $this->db->where('id_forum', $id_forum);
        $this->db->update('forum'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
    }


    //FOR PENGAJUAN RELAWAN
    
    public function inputPengajuanRelawan($data)
    {
        $this->db->insert('forum_relawan', $data);
    }

    public function getAllPengajuanRelawan()
    {
        $this->db->from('forum_relawan a');
        $this->db->join('relawan b', 'a.id_relawan = b.id_relawan');
        $this->db->join('forum c', 'a.id_forum = c.id_forum');
        $this->db->join('akun d', 'b.id_akun = d.id_akun');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPengajuanRelawanById($id_relawan)
    {
        $this->db->from('forum_relawan a');
        $this->db->join('relawan b', 'a.id_relawan = b.id_relawan');
        $this->db->join('forum c', 'a.id_forum = c.id_forum');
        $this->db->join('akun d', 'b.id_akun = d.id_akun');
        $this->db->where('a.id_relawan', $id_relawan);
        $query = $this->db->get();
        return $query->result();
    }

    public function accPengajuanRelawan($id_relawan)
    {
        $this->db->set('status_pengajuan', 1);
        $this->db->where('id_relawan', $id_relawan);
        $this->db->update('forum_relawan'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
    }


}

