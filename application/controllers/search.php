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

      if(!empty($comments)) {
        $poems[$i]->comments = $comments;
      }
      else{
        $poems[$i]->comments = array();
      }
    }

    $this->template->build('search/poems', array("poems" => $poems));

  }

  public function users() {

    if ($this->input->post()) {
      $this->load->model("User_model");
      $params = $this->input->post();
      $people = $this->User_model->get_people(
        $params['name'],
        $params['edu'],
        $params['work'],
        $params['age'],
        $params['gender'],
        $params['country'],
        $params['popularity'],
        $params['writing']
      );
      if (!empty($params['followers']) && !empty($params['name'])) {
        $followers = $this->User_model->get_followers($params['name']);
      } 
      else {
        $followers = array();
      }
      if(!empty($people)){
        $this->template->build('search/users', array("people" => $people, "followers" => $followers));
      } 
      else {
        echo "NO PEOPLE ONLINE! GO BACK TO SLEEP SON!";
      }
    }
    else {
      $this->template->build('search/users');
    }
  }
}