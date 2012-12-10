<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

  public function index() {
	$this->load->model("User_model");
	$profile = $this->User_model->get_profile("3");
	$profile = (array) $profile[0];
	
	$poems = $this->User_model->get_poems("3");
	$poems = (array) $poems;
	
	$posts = $this->User_model->get_posts("3");
	$posts = (array) $posts;
	
	if (!empty($profile) && !empty($poems)) {
    	$this->template->build('profile', array("profile" => $profile, "poems" => $poems, "posts" => $posts));
	}
  }

  public function get_user_profile($profile_id) {
    var_dump($profile_id);
    die;
  }
  
  
}
