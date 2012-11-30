<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

  var $first_name = '';
  var $last_name = '';
  var $email = '';
  var $password_hash = '';
  var $birth_date = null;
  var $gender = null;
  var $num_address = null;
  var $street_address = null;
  var $town_address = null;
  var $state_address = null;
  var $country_address = null;

  function insert_poem()
  {
    $this->first_name   = $this->input->post('first_name');
    $this->last_name = $this->input->post('last_name');
    $this->email = $this->input->post('email');
    $this->password_hash = sha1($this->input->post('password'));

    $this->db->insert('poem', $this);
  }

}
