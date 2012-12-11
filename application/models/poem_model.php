<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poem_model extends CI_Model {

  var $title = "";
  var $votes = null;
  var $content = "";
  var $post_date = null;
  var $category = "";
  var $author = "";


  public function insert_poem($user_id, $titles, $contents, $categorys, $votes=0) {
    if(empty($user_id) || empty($titles) || empty($contents) || empty($categorys)){
        return null;
      }

    $date = mdate('%Y-%m-%d %h:%i:%s', time());

    $insert = $this->db->query("
      INSERT INTO `Poems`
      (`user_id`, `votes`, `title`, `content`, `post_time`, `category`)
      VALUES
      (?, ?, ?, ?, ?, ?)",
      array($user_id, $votes, $titles, $contents, $date, $categorys)
    );
    return $insert;
  }


  public function get_poems($authors, $titles, $popularity, $age, $abc){

    $authors = !isset($authors) ? $authors : '%';
    $titles = !isset($titles) ? $titles : '%';
    $popularity = !isset($popularity) ? $popularity : '%';
    $age = !isset($age) ? $age : '%';
    $abc = !isset($abc) ? $abc : '%';

    $search = $this->db->query("
      SELECT u.first_name, u.last_name, p.poem_id, p.title, p.votes, p.content, p.post_time
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


  public function insert_comment($poem_id, $user_id, $content){
    if(empty($poem_id) || empty($user_id) || empty($content)){
      return null;
    }

    $date = mdate('%Y-%m-%d %h:%i:%s', time());

    $insert = $this->db->query("
      INSERT INTO `Comments` (`poem_id`, `user_id`, `content`, `post_time`)
      VALUES
      (?,?,?,?)",
      array($poem_id, $user_id, $content, $date)
    );

    return ($insert ? $date : '');
  }


  public function get_comments($poem_id){
    if(empty($poem_id)){
      return null;
    }

    $query = $this->db->query("
      SELECT c.user_id, c.post_time, c.content, u.email, u.first_name, u.last_name
      FROM Comments c, Users u
      WHERE c.poem_id=? AND c.user_id=u.user_id
      ORDER BY c.post_time",
      array($poem_id)
    );

    return $query->result();
  }

  public function search_get_comments($poem_id){
    if(empty($poem_id)){
      return null;
    }

    $query = $this->db->query("
      SELECT c.post_time as post, c.content as comment,
        u.first_name as comment_name1,
        u.last_name as comment_name2
      FROM Comments c, Users u
      WHERE c.poem_id=? AND c.user_id = u.user_id",
      array($poem_id)
    );

    return $query->result();
  }

  public function get_last_poem_id($user_id) {
    $query = $this->db->query("
      SELECT poem_id FROM Poems
      WHERE user_id=?
      ORDER BY post_time DESC LIMIT 1;",
      array($user_id)
    );

    return $query->result();
  }

}
