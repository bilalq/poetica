<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

  public function index() {
    $logged_in = $this->session->userdata('logged_in');
    if (! $logged_in) {
      redirect('/login');
    }

    $this->load->model("User_model");

    $profile = array(
      "first_name" => $this->session->userdata("first_name"),
      "last_name" => $this->session->userdata("last_name"),
      "email" => $this->session->userdata("email"),
      "birth_date" => $this->session->userdata("birth_date"),
      "num_address" => $this->session->userdata("num_address"),
      "street_address" => $this->session->userdata("street_address"),
      "town_address" => $this->session->userdata("town_address"),
      "state_address" => $this->session->userdata("state_address"),
      "country_address" => $this->session->userdata("country_address"),
    );

    $poems = $this->User_model->get_poems($this->session->userdata("user_id"));
    $poems = (array) $poems;

    $posts = $this->User_model->get_posts($this->session->userdata("user_id"));
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
