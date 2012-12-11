<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poem_model extends CI_Model {

  var $title = "";
  var $votes = null;
  var $content = "";
  var $post_date = null;
  var $category = "";
  var $author = "";


  function insert_poem($user_id, $titles, $contents, $categorys, $votes=0) {
    if(empty($user_id) || empty($title) || empty($content)
      || empty($category)){
        return null;
      }

    $insert = $this->db->query("
      INSERT INTO 'Poems' ('user_id',
      'votes', 'title', 'content', 'post_time', 'category')
      VALUES
      (?,?,?,?,?,?,?)",
      array($user_id, $votes, $titles, $contents, $categorys)
    );
    return $insert;
  }


  function get_poems($authors, $titles, $popularity, $age, $abc){

    $authors = !isset($authors) ? $authors : '%';
    $titles = !isset($titles) ? $titles : '%';
    $popularity = !isset($popularity) ? $popularity : '%';
    $age = !isset($age) ? $age : '%';
    $abc = !isset($abc) ? $abc : '%';

    $search = $this->db->query("
      SELECT u.first_name, u.last_name, p.title, p.votes, p.content, p.post_time
      FROM Users u, Poems p
      WHERE u.first_name LIKE ? AND u.user_id=p.user_id AND p.title LIKE ?
      ORDER BY ? AND ? AND ?",
      array($authors, $titles, $popularity, $age, $abc)
    );

    return $search->result();
  }


  function get_poem($poem_id){
    if(empty($poem_id)){
      return null;
    }

    $query = $this->db->query(
      "SELECT p.*, u.email, u.first_name, u.last_name
      FROM Poems p, Users u
      WHERE p.poem_id=? AND p.user_id=u.user_id",
      array($poem_id)
    );

    $result = $query->result();
    return $result;
  }


  function insert_comment($poem_id, $user_id, $content){
    if(empty($poem_id) || empty($user_id) || empty($content)){
      return null;
    }

    $date = date('m/d/Y h:i:s', time());

    $insert = $this->db->query("
      INSERT INTO 'Comments' ('poem_id', 'user_id', 'post_time',
      'content')
      VALUES
      (?,?,?,?)",
      array($poem_id, $user_id, $content, $date)
    );

    return $insert;
  }


  function get_comments($poem_id){
    if(empty($poem_id)){
      return null;
    }

    $query = $this->db->query("
      SELECT c.user_id, c.post_time, c.content, u.email, u.first_name, u.last_name
      FROM Comments c, Users u
      WHERE c.poem_id=? AND c.user_id=u.user_id",
      array($poem_id)
    );

    return $query->result();
  }

}
