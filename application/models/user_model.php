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
  
  public function get_profile($id) {
	$query = $this->db->query(
	  "SELECT * 
	   FROM `Users` u
	   WHERE u.user_id=?",
	  array($id)
	);
	
	$result = $query->result();
    return $result;
  }
  
  public function get_following($id) {
	$query = $this->db->query(
	  "SELECT u.email, u.user_id, u.first_name, u.last_name
	   FROM Followings f, Users u
	   WHERE f.follower=? and u.user_id=f.followee;",
	  array($id)
	);
	
	$result = $query->result();
    return $result;
  }
  
  public function get_follower($id) {
	$query = $this->db->query(
	  "SELECT u.email, u.user_id, u.first_name, u.last_name
	   FROM Followings f, Users u
	   WHERE f.followee=? and u.user_id=f.follower;",
	  array($id)
	);
	
	$result = $query->result();
    return $result;
  }
  
  public function get_poems($id) {
	$query = $this->db->query(
	  "SELECT *
	   FROM Poems p
	   WHERE p.user_id=?
	   ORDER BY p.post_time;",
	  array($id)
	);
	
	$result = $query->result();
    return $result;
  }
  
  public function get_posts($id) {
	$query = $this->db->query(
	  "SELECT c.content AS post, p.title, p.content, u.first_name, u.last_name, c.post_time
	   FROM Comments c, Poems p, Users u
	   WHERE c.user_id=? AND c.poem_id=p.poem_id AND p.user_id=u.user_id
	   ORDER BY c.post_time;",
	  array($id)
	);
	
	$result = $query->result();
    return $result;
  }
}
