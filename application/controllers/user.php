<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

  public function index() {
    $logged_in = $this->session->userdata('logged_in');
    if (! $logged_in) {
      redirect('/login');
    }
    redirect('home');
  }

  public function profile($p1) {
    $this->load->helper('security');
    echo do_hash($p1);
    echo '<br>';
    $this->load->model('User_model');
    echo '<pre>';
    //var_dump($this->User_model->auth('bilalquadri92@gmail.com', $p1));
    echo '</pre>';

    die;
  }

  public function register() {
    if($this->input->post()) {
      $this->load->model('User_model');

      $user_data = $this->input->post();
      $datestring = mdate("%Y-%m-%d", strtotime($user_data['birthday']));
      $user_data['birthday'] = $datestring;

      $registration_succeeded = $this->User_model->create($user_data);

      if ($registration_succeeded) {
        $user = $this->User_model->auth($user_data['email'], $user_data['password']);
        $user = (array) $user;
        $user['logged_in'] = TRUE;

        $this->session->set_userdata($user);
      }

      redirect('/home');
    }
    else {
      redirect('/register');
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
      redirect('/login');
    }
  }
}
