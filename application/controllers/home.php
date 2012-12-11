<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

  function __construct() {
    parent::__construct();
  }


  public function index() {
    $logged_in = $this->session->userdata('logged_in');
    if (! $logged_in) {
      redirect('/login');
    }

    $this->load->model('Poem_model');
    $poems = $this->Poem_model->my_recent_poems($this->session->userdata('user_id'));
    //echo '<pre>';
    //var_dump($poems[0]);
    //echo '</pre>';
    $this->template->build('home/index', array(
      'poems' => $poems,
      'tab1' => '',
      'tab2' => 'active',
      'tab3' => ''
    ));
  }

  public function feed() {
    $logged_in = $this->session->userdata('logged_in');
    if (! $logged_in) {
      redirect('/login');
    }

    $this->load->model('Poem_model');
    $poems = $this->Poem_model->get_recent_poems($this->session->userdata('user_id'));

    $this->template->build('home/index', array(
      'poems' => $poems,
      'tab1' => 'active',
      'tab2' => '',
      'tab3' => ''
    ));
  }


  public function friends() {
    $logged_in = $this->session->userdata('logged_in');
    if (! $logged_in) {
      redirect('/login');
    }

    $this->load->model('Poem_model');
    $poems = $this->Poem_model->followers_recent($this->session->userdata('user_id'));
    //echo '<pre>';
    //var_dump($poems[0]);
    //echo '</pre>';
    //die;

    $this->template->build('home/index', array(
      'poems' => $poems,
      'tab1' => '',
      'tab2' => '',
      'tab3' => 'active'
    ));
  }


  public function error_page() {
    $this->template->build('error_page');
  }


  public function logout() {
    $this->template->build('home/index');
  }

}
