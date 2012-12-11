<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poem extends MY_Controller {


  public function index($poem_id) {
    $logged_in = $this->session->userdata('logged_in');
    if (! $logged_in) {
      redirect('/login');
    }

    $this->load->model('Poem_model');
    $poem = $this->Poem_model->get_poem($poem_id);
    $poem = (array) ($poem[0]);

    $comments = $this->Poem_model->get_comments($poem_id);
    for ($i = 0; $i < count($comments); $i++) {
      $comments[$i] = (array) $comments[$i];
    }

    $this->template->append_metadata(
      '<script type="text/javascript" src="/public/javascripts/poem.js"></script>'
    );
    $this->template->build('poem', array('poem' => $poem, 'comments' => $comments));
  }


  public function write() {
    $logged_in = $this->session->userdata('logged_in');
    if (! $logged_in) {
      redirect('/login');
    }
    $this->template->build('compose');
  }


  public function comment() {
    $comment = $this->input->post();

    if (empty($comment)) {
      echo '';
    }
    else {
      $this->load->model('Poem_model');
      $success = $this->Poem_model->insert_comment(
        intval($comment['poem_id']),
        intval($comment['user_id']),
        $comment['content']
      );

      echo $success;
    }
  }


  public function submit() {
    $poem = $this->input->post();
    $this->load->model('Poem_model');
    $user_id = $this->session->userdata('user_id');

    $insert_success = $this->Poem_model->insert_poem(
      $user_id,
      $poem['title'],
      $poem['content'],
      $poem['category'],
      0
    );

    if ($insert_success) {
      $id = $this->Poem_model->get_last_poem_id($user_id);
      redirect('/poem/'.$id[0]->poem_id);
    }
    else {
      redirect('/poem/write');
    }
  }

}
