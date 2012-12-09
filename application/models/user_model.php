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

  public function create($user_data) {
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

  public function auth($email, $password) {
    if (empty($email) || empty($password)) {
    // Ensure that an email and password were provided
      return null;
    }

    $this->load->helper('security'); // For hash function

    $query = $this->db->query(
      "SELECT * FROM `Users` u WHERE
       u.email=? AND u.password_hash=?",
      array($email, do_hash($password))
    );

    $result =  $query->result();
    return (! empty($result)) ? $result[0] : null;
  }
  
  public function get_profile($email) {
	$query = $this->db->query(
	  "SELECT * FROM `Users` u
	   WHERE u.email=?",
	  array($email)
	);
	
	$result = $query->result();
    return $result;
  }
  
  public function get_follower($id) {
	
  }
  
  public function get_following($id) {
	  
  }
  
  public function get_post($id) {
	  
  }
}
