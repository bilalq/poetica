<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

  public function index() {
    redirect('/search/poems');
  }

  public function poems() {
    $logged_in = $this->session->userdata('logged_in');
    if (! $logged_in) {
      redirect('/login');
    }

    if($this->input->get()){
      echo 'Yep';
      $this->load->model('Poem_model');
      $args = $this->input->get();

      echo $args['Author'];
      $poems = $this->Poem_model->get_poems(
        $args['Author'], 
        $args['Title'], 
        $args['Popularity'],
        $args['Age'], 
        $args['ABC']
        );
      echo "Middle";
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
      echo "End";
      if(!empty($poems)){
        $this->template->build('search/poems', array("poems" => $poems));
      }
    }
    else{
      echo "Nope";
      $this->template->build('search/poems', array("poems" => array()));
    }
  }

  public function users() {
    $logged_in = $this->session->userdata('logged_in');
    if (! $logged_in) {
      redirect('/login');
    }

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
      if(!empty($people) || !empty($followers)){
        $this->template->build('search/users', array("people" => $people, "followers" => $followers));
      } 
      else {
        $this->template->build('search/users');
      }
    }
    else {
      $this->template->build('search/users');
    }
  }
}
