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


  public function create($u) {
    $this->load->helper('security');

    $registration_succeeded = $this->db->query("
      INSERT INTO `Users` (`first_name`, `last_name`, `email`, `password_hash`,
      `birth_date`, `gender`, `num_address`, `street_address`, `town_address`, `state_address`, `country_address`)
      VALUES
      (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
      array(
        $u['first_name'],
        $u['last_name'],
        $u['email'],
        do_hash($u['password']),
        $u['birthday'],
        $u['gender'],
        $u['num_address'],
        $u['street_address'],
        $u['town_address'],
        $u['state_address'],
        $u['country_address']
      )
    );

    return $registration_succeeded;
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

  public function help_parse($objects, $option) {
	  if( !empty($objects) ):
	  		echo '<div class="row">';
	      if ($option == 1) { echo '<h4>People:</h4>'; }
		  else { echo '<h4>Followers:</h4>'; }
		    echo '</div>';
			
		  foreach($objects as $object):
	      	echo '<div class="row">';
			echo '<div class="columns">';
			echo gravatar($object->email, 45);
			echo '</div>';
			echo '<div class="columns end">';
	     	echo '<h3>'.$object->first_name.' '.$object->last_name.'</h3>';
			echo '</div>';
			echo '</div>';
			echo '<div class="row">';
	     	echo '<div class="two columns">';
	     	echo '<p><i>Gender:</i><br/>';
			if ($object->gender == 1) {
				echo "Male";
			} else {
				echo "Female";
			}
            echo '</p>';
	     	echo '</div>';
	     	echo '<div class="two columns">';
	     	echo '<p><i>Birth date:</i><br/>';
			echo $object->birth_date;
            echo '</p>';
	     	echo '</div>';
	     	echo '<div class="three columns">';
	     	echo '<p><i>Email:</i><br/>';
			echo $object->email;
            echo '</p>';
	     	echo '</div>';
	     	echo '<div class="five columns">';
	     	echo '<p><i>Adress:</i><br/>';
			echo $object->num_address." ";
	     	echo $object->street_address."<br/>";
	     	echo $object->town_address.", ";
	     	echo $object->state_address." ";
	     	echo $object->country_address;
	     	echo '</p>';
	     	echo '</div>';
	     	echo '</div>';
        echo '<div class="row"><form method="post" action="/user/follow"><input type="text" name="follow" value="'.$object->user_id.'" style="display: none;"><input type="submit" class="button" value="Follow"></form></div>';
	     	endforeach;
	  endif;
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

  public function get_followers($pname) {
	
	  $query = $this->db->query("
	  		SELECT u2.*
			FROM Users u JOIN Followings f ON u.user_id=f.follower JOIN Users u2 ON f.followee=u2.user_id
			WHERE u.first_name LIKE ?;",
			array($pname)
	  );
	
	  $result = $query->result();
      return $result;
  }

  public function get_people($pname, $edu, $work, $age, $gender, $country, $popular, $writing) {
	
	  $pname	= empty($pname)		? "%" : $pname;
	  $edu		= empty($edu)		? "%" : $edu;
	  $work		= empty($work)		? "%" : $work;
	  $age		= empty($age)		? "%" : $age;
	  $gender	= empty($gender)	? "%" : $gender;
	  $country	= empty($country)	? "%" : $country;
	  $popular	= empty($popular)	? "'%'" : $popular;
	  $writing	= empty($writing)	? "'%'" : $writing;
	
	$query = $this->db->query("
	    SELECT DISTINCT u.*, p.poems AS poems, p.votes AS votes, f.followers AS followers, c.comments  AS comments
		FROM Users u
			LEFT JOIN
			(SELECT p.user_id, COUNT(p.user_id) AS poems, MAX(p.votes) AS votes FROM Poems p GROUP BY p.user_id) AS p ON u.user_id=p.user_id
			LEFT JOIN
			(SELECT f.followee, COUNT(f.follower) AS followers FROM Followings f GROUP BY f.followee) AS f ON u.user_id=f.followee
			LEFT JOIN
			(SELECT c.user_id, COUNT(c.user_id) AS comments FROM Comments c GROUP BY c.user_id) AS c ON u.user_id=c.user_id
			LEFT JOIN Employment w ON u.user_id=w.user_id
			LEFT JOIN Education e ON u.user_id=e.user_id
		WHERE u.first_name like ? AND e.school like ? AND w.employer like ? AND u.birth_date > ? AND u.gender LIKE ? AND u.country_address like ?
		ORDER BY ".$popular." DESC, ".$writing." DESC;",
		array($pname, $edu, $work, $age, $gender, $country)
	);
	
	$result = $query->result();
    return $result;
  }

  public function start_following($self, $user) {
    $query_success = $this->db->query("
      INSERT INTO `Followings` (`follower`, `followee`)
      VALUES
      (?, ?)",
      array($self, $user)
    );

    return $query_success;
  }
}
