<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invert extends MY_Controller {

  public function index() {
    $this->load->model('Poem_model');
    $text = $this->Poem_model->invert();

    //echo '<pre>';
    //var_dump($text);die;
    //echo '</pre>';
    $index = array();

    foreach ($text as $words) {
      $tok = strtok($words->content, " \n\t");

      while ($tok !== false) {
        $index[$tok] = array();
        $tok = strtok(" \n\t");
      }
    }

    foreach ($index as $word => $poems) {
      $clean_word = 
      $list = ($this->Poem_model->poems_with_word($word));
      for ($i = 0; $i < count($list); $i++) {
        $index[$word][] = $list[$i]->poem_id;
      }
    }

    echo '<pre>';
    var_dump($index);die;
  }

}
