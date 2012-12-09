<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->template->build('home/index');
  }

  public function error_page() {
    $this->template->build('error_page');
  }

  public function logout() {
    $this->template->build('home/index');
  }
}
