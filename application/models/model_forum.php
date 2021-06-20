<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_forum extends CI_Model {

   function input_forum($data)
   {
      $this->db->insert('forum', $data);
   }
}
