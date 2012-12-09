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

  function create($user_data) {
    $this->load->helper('security');

    $user_data[3] = do_hash($user_data[3]);

    $registration_succeeded = $this->db->query("
      INSERT INTO `Users` (`first_name`, `last_name`, `email`, `password_hash`, 
      `birth_date`, `gender`, `num_address`, `street_address`, `town_address`, `state_address`, `country_address`)
      VALUES
      (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
      array($user_data)
    );

    if ($registration_succeeded) {
      return auth($user_data[2], $user_data[3]);
    }
    else {
      return null;
    }
  }

  function auth($email, $password) {
    if (empty($email) || empty($password)) {
      return null;
    }

    $this->load->helper('security');

    $query = $this->db-query("
      SELECT * FROM `Users` u WHERE
      u.email=? AND e.password_hash=?",
      array($email, do_hash($password))
    );

    return $query;
  }

}
