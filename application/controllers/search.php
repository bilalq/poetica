<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

  public function index() {
    redirect('/search/poems');
  }

  public function poems() {

    $this->load->model('Poem_model');
    $poems = (array) ($this->Poem_model->get_poems('Alexio', 'Food', 'p.votes', 'u.birth_date', 'u.first_name'));
    $comments = (array) $this->Poem_model->get_comments();
    if(!empty($poems)){
      $this->template->build('search/poems', array("poems" => $poems));
    } else {
      echo "NO POEMS, SON";
    }
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
		// checks if find followers is toggled
		if (!empty($params['followers']) && !empty($params['name'])) {
			$followers = $this->User_model->get_followers($params['name']);
		} else {
			$followers = array();
		}
		// if results are not empty
		if(!empty($people)){
		  $this->template->build('search/users', array("people" => $people, "followers" => $followers));
		} else {
		  echo "NO PEOPLE ONLINE! GO BACK TO SLEEP SON!";
		}
	} else {
		$this->template->build('search/users');
	}
	
	
  }

}

