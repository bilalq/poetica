<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

  public function index() {
    $this->template->build('home/index');
  }

  public function profile($userid) {
    echo $userid;
    die;
  }

  public function register() {
    if($this->input->post()) {
      //Registration query
      $this->template->build('home/index');
    }
    else {
      //Render registration page view
      $this->template->build('register');
    }
  }

}
