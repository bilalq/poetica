<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

  public function index() {
	$this->load->model("User_model");
	$profile = $this->User_model->get_profile("huayang@poetica.com");
	$profile = (array) $profile[0];
	if (! empty($profile)) {
    	$this->template->build('profile', array("profile" => $profile));
	}
  }

  public function get_user_profile($profile_id) {
    var_dump($profile_id);
    die;
  }
  
  
}
