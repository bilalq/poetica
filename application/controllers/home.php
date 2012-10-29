<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

  public function index() {
    $this->template->build('home/index');
  }

  public function error_page() {
    $this->template->build('error_page');
  }
}
