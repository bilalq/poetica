<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poem extends MY_Controller {

  public function index($poem_id) {
    //$this->load->model('Poem_model');
    //$poem = $this->Poem_model->get_poem($poem_id);
    $poem = "";

    $this->template->append_metadata('<script type="text/javascript" src="/public/javascripts/poem.js"></script>');
    $this->template->build('poem', array('poem' => $poem));
  }

  public function write() {
    $this->template->build('compose');
  }

}
