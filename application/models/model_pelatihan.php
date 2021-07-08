<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pelatihan extends CI_Model {

   function getAllPelatihan()
   {
      $this->db->from('pelatihan a');
      $this->db->join('kategori_pelatihan b', 'a.id_kategori_pelatihan = b.id_kategori_pelatihan');
      $this->db->join('jenis_pelatihan c', 'a.id_jenis_pelatihan = c.id_jenis_pelatihan');
      $query = $this->db->get();
      return $query->result();
   }

   function getPelatihanById($id_pelatihan)
   {
      $this->db->from('pelatihan a');
      $this->db->join('kategori_pelatihan b', 'a.id_kategori_pelatihan = b.id_kategori_pelatihan');
      $this->db->where('id_pelatihan', $id_pelatihan);
      $query = $this->db->get();
      return $query->result();
   }

   function inputPelatihan($data)
   {
      $this->db->insert('pelatihan', $data);
   }

   function editPelatihan($data)
   {
      $this->db->set('nama_pelatihan',$data['nama_pelatihan']);
      $this->db->set('id_kategori_pelatihan',$data['id_kategori_pelatihan']);
      $this->db->set('id_jenis_pelatihan',$data['id_jenis_pelatihan']);
      $this->db->set('tanggal_pelatihan',$data['tanggal_pelatihan']);
      $this->db->set('deskripsi_pelatihan',$data['deskripsi_pelatihan']);
      $this->db->set('waktu',$data['waktu']);
      $this->db->set('kuota',$data['kuota']);
      $this->db->where('id_pelatihan', $$data['id_pelatihan']);
      $this->db->update('pelatihan');
   }

   function getAllJenisPelatihan()
   {
      $this->db->from('jenis_pelatihan');
      $query = $this->db->get();
      return $query->result();
   }

   function getAllKategoriPelatihan()
   {
      $this->db->from('kategori_pelatihan');
      $query = $this->db->get();
      return $query->result();
   }

   function hapusPelatihan($id_pelatihan)
   {
      $this->db->where('id_pelatihan', $id_pelatihan);
      $this->db->delete('pelatihan');
   }
}
