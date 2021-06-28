<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_relawan extends CI_Model {

   function input_relawan($data)
   {
      $this->db->insert('relawan', $data);
   }

   public function getAllRelawan(){
      $this->db->from('akun a');
      $this->db->join('relawan f', 'a.id_akun = f.id_akun');
      $this->db->where('status_pengajuan', 1);
      $query = $this->db->get();
      return $query->result();
  }

  public function getAllPengajuan(){
      $this->db->from('akun a');
      $this->db->join('relawan f', 'a.id_akun = f.id_akun');
      $this->db->where('status_pengajuan', 0);
      $query = $this->db->get();
      return $query->result();
  }

  public function getPengajuanById($id_akun)
  {
      $this->db->from('akun a');
      $this->db->join('relawan f', 'a.id_akun = f.id_akun');
      $this->db->where('a.id_akun', $id_akun);
      $query = $this->db->get();
      return $query->result();
  }

  public function accPengajuanRelawan($id_relawan)
  {
      $this->db->set('status_pengajuan', 1);
      $this->db->where('id_relawan', $id_relawan);
      $this->db->update('relawan'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
  }
}
