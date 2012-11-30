<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

  public function index() {
    $this->template->build('home/index');
  }

  public function profile($userid) {
    echo $userid;
    die;
  }

  public function create($password) {
    $this->load->helper('security');

    echo "Password: ".$password."<br/>";
    echo "Pass Hash: ".do_hash($password)."<br/>";
    $query = $this->db->query("
      INSERT INTO `users` (`first_name`, `last_name`, `email`, `password_hash`)
      VALUES
      ('Bilal', 'Quadri', 'bilalquadri92@gmail.com', ?)", 
      array(do_hash($password))
    );
  }

}
