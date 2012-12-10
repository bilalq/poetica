<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

  public function index() {
    $this->poems();
  }

  public function poems() {

    $this->load->model('Poem_model');
    $poems = (array) ($this->Poem_model->get_poem('1'));
    if(!empty($poems)){
      $this->template->build('search/poems', array("poems" => $poems));
    }
    else {
      echo "NO POEMS, SON";
    }
  }

  public function users() {
    $this->load->model("User_model");
    $this->template->build('search/users');
  }

}

