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
  

  public function get_people($pname, $edu, $work, $age, $gender, $country, $popular, $fans, $writing) {
	  
	  $pname	= empty($pname)		? "'%'" : $pname;
	  $edu		= empty($edu)		? "'%'" : $edu;
	  $work		= empty($work)		? "'%'" : $work;
	  $age		= empty($age)		? "'%'" : $age;
	  $gender	= empty($gender)	? "'%'" : $gender;
	  $country	= empty($country)	? "'%'" : $country;
	  $popular	= empty($popular)	? "'%'" : $popular;
	  $fans		= empty($fans)		? "'%'" : $fans;
	  $writing	= empty($writing)	? "'%'" : $writing;
	  
	$query = $this->db->query(
	   "SELECT DISTINCT u.user_id, u.first_name, u.last_name, u.gender, u.birth_date, p.poems, p.votes, f.followers, c.comments
		FROM Users u
			LEFT JOIN 
			(SELECT p.user_id, COUNT(p.user_id) AS poems, MAX(p.votes) AS votes FROM Poems p GROUP BY p.user_id) AS p ON u.user_id=p.user_id
			LEFT JOIN
			(SELECT f.followee, COUNT(f.follower) AS followers FROM Followings f GROUP BY f.followee) AS f ON u.user_id=f.followee
			LEFT JOIN
			(SELECT c.user_id, COUNT(c.user_id) AS comments FROM Comments c GROUP BY c.user_id) AS c ON u.user_id=c.user_id,
			Employment w, Education e
		WHERE u.user_id=w.user_id AND u.user_id=e.user_id
		AND u.first_name like ? AND e.school like ? AND w.employer like ? AND u.birth_date > ? AND u.gender like ? AND u.country_address like ?
		ORDER BY ?, ?;",
		array($pname, $edu, $work, $age, $gender, $country, $popular, $writing)
	);
  }

}
