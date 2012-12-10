<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

  public function index() {
    $this->template->build('home/index');
  }

  public function profile($p1) {
    $this->load->helper('security');
    echo do_hash($p1);
    echo '<br>';
    $this->load->model('User_model');
    echo '<pre>';
    var_dump($this->User_model->auth('bilalquadri92@gmail.com', $p1));
    echo '</pre>';

    die;
  }

  public function register() {
    if($this->input->post()) {
    // Registration query
      var_dump($this->input->post());die;
      $this->template->build('home/index');
    }
    else {
    // Render registration page view
      $this->template->build('register');
    }
  }

  public function login() {
    $user_data = $this->input->post();
    if( ! empty($user_data) ) {
      $this->load->model('User_model');

      $user = $this->User_model->auth(
        $user_data['email'],
        $user_data['password']
      );
      $user = (array) $user;
      $user['logged_in'] = TRUE;

      $this->session->set_userdata($user);

      redirect('/home/');
    }
    else {
      $this->template->build('login');
    }
  }
}
