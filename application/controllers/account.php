<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

  public function login() {
    $logged_in = $this->session->userdata('logged_in');

    if ($logged_in) {
      $this->template->build('home/index');
    }
    else {
      $this->template->build('login');
    }
  }

  public function register() {
    $logged_in = $this->session->userdata('logged_in');

    if ($logged_in) {
      $this->template->build('home/index');
    }
    else {
      $this->template->append_metadata('<link rel="stylesheet" href="/public/stylesheets/pikaday.css">');
      $this->template->build('register');
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    $this->template->build('login');
  }
}

