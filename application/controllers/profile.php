<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

  public function index() {
    $this->template->build('profile');
  }

  public function get_user_profile($profile_id) {
    var_dump($profile_id);
    die;
  }
  
  
}
