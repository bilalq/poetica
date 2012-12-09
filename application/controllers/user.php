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
    var_dump($this->User_model->auth('bilalquadri@poetica.com', $p1));
    echo '</pre>';

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
