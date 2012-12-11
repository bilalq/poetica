<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

  public function index() {
    redirect('/search/poems');
  }

  public function poems() {

    $this->load->model('Poem_model');
    $poems = ($this->Poem_model->get_poems('Alexio', 'Food', 'p.votes', 'u.birth_date', 'u.first_name'));
    for ($i=0; $i < count($poems); $i++) { 
      $comments = $this->Poem_model->search_get_comments($poems[$i]->poem_id);
      for ($j=0; $j < count($comments); $j++) { 
        $comments[$j] = (array) $comments[$j];
      }
     if(!empty($comments))
      {
        $poems[$i]->comments = $comments;
      }
      else{
        $poems[$i]->comments = [];
      }
    }

    $this->template->build('search/poems', array("poems" => $poems));
  
}

public function users() {
  $this->load->model("User_model");
  $this->template->build('search/users');
}

}

