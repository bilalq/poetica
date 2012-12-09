<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poem_model extends CI_Model {

  function insert_poem() {
    $this->first_name   = $this->input->post('first_name');
    $this->last_name = $this->input->post('last_name');
    $this->email = $this->input->post('email');
    $this->password_hash = sha1($this->input->post('password'));

    $this->db->insert('poem', $this);
  }
}
