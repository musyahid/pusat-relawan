<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_relawan extends CI_Model {

   function input_relawan($data)
   {
      $this->db->insert('relawan', $data);
   }
}
