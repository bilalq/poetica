<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->template->build('search/poems');
  }

  public function poems() {
    $this->template->build('search/poems');
  }

  public function users() {
    $this->template->build('search/users');
  }

}

