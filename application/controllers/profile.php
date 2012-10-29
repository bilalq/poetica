<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

  public function index() {
    echo "Trying to see own profile. It's working (routewise).";
    die;
  }

  public function get_user_profile($profile_id) {
    var_dump($profile_id);
    die;
  }
}
