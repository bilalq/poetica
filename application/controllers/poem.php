<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poem extends MY_Controller {

  public function index($poem_id) {
    $this->load->model('Poem_model');
    $poem = $this->Poem_model->get_poem($poem_id);
    $poem = (array) ($poem[0]);

    $comments = $this->Poem_model->get_comments($poem_id);
    for ($i = 0; $i < count($comments); $i++) {
      $comments[$i] = (array) $comments[$i];
    }

    $this->template->append_metadata('<script type="text/javascript" src="/public/javascripts/poem.js"></script>');
    $this->template->build('poem', array('poem' => $poem, 'comments' => $comments));
  }

  public function write() {
    $this->template->build('compose');
  }

}
