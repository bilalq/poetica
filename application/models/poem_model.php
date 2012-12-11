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

    echo 'Titles '.$titles;
    $authors = !empty($authors) ? $authors : "%";
    $titles = !empty($titles) ? $titles : "%";

    echo '<br>';
    echo 'Values';
    echo '<br>';
    echo $authors;
    echo '<br>';
    echo $titles;
    $search = null;
    if(!empty($popularity)){
      $popularity = !empty($popularity) ? $popularity : "%";
      $search = $this->db->query("
        SELECT u.first_name, u.last_name, u.email, p.poem_id, p.title, p.votes, p.content, p.post_time
        FROM Users u, Poems p
        WHERE u.first_name LIKE ? AND u.user_id=p.user_id AND p.title LIKE ?
        ORDER BY ? DESC",
        array($authors, $titles, $popularity)
      );
    }
    else if(!empty($age)){
      $age = !empty($age) ? $age : "%";
      $search = $this->db->query("
        SELECT u.first_name, u.last_name, u.email, p.poem_id, p.title, p.votes, p.content, p.post_time
        FROM Users u, Poems p
        WHERE u.first_name LIKE ? AND u.user_id=p.user_id AND p.title LIKE ?
        ORDER BY ?",
        array($authors, $titles, $age)
      );
    }
    else if(!empty($abc)){
      $abc = !empty($abc) ? $abc : "%";
      $search = $this->db->query("
        SELECT u.first_name, u.last_name, u.email, p.poem_id, p.title, p.votes, p.content, p.post_time
        FROM Users u, Poems p
        WHERE u.first_name LIKE ? AND u.user_id=p.user_id AND p.title LIKE ?
        ORDER BY ?",
        array($authors, $titles, $abc)
      );
    }

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

  public function get_recent_poems(){
    $query = $this->db->query("
      SELECT p.*, u.email, u.first_name, u.last_name
      FROM Poems p, Users u
      WHERE p.user_id=u.user_id
      ORDER BY p.post_time LIMIT 20;"
    );

    return $query->result();
  }

  public function my_recent_poems($user_id){

    if(!empty($user_id)){

      $query = $this->db->query("
        SELECT p.*, u.email, u.first_name, u.last_name
        FROM Poems p, Users u
        WHERE p.user_id=? AND p.user_id=u.user_id
        Order BY p.post_time DESC LIMIT 20;",
        array($user_id)
        );
      return $query->result();
    }

    return null;
  }

  public function followers_recent($user_id){

    if(!empty($user_id)){

      $query = $this->db->query("
        SELECT p.title, p.content, p.post_time, p.votes, p.poem_id,
        p.category, q.first_name, q.last_name, q.email
        FROM Poems p
        INNER JOIN
        (SELECT u.* FROM Users u, Followings f
        WHERE f.followee=? AND f.follower=u.user_id) as q
        ON p.user_id = q.user_id
        Order By p.post_time LIMIT 20;",
        array($user_id)
        );

      return $query->result();
    }
    return null;
  }

  /*Finds poems with more than 5 votes*/
  public function five_votes(){

    $query = $this->db->query("
      SELECT distinct p.*
      FROM Poems p
      Having Count(p.votes) > 5;
      ");

    return $query->result();
  }

  /*Average number of votes for each Poem Category*/
  public function avg_votes(){

    $query = $this->db->query("
      SELECT p.category, AVG(p.votes)
      From Poems p
      GROUP BY p.category;
      ");

    return $query->result();
  }

  /* Get Writes who've written in the given poem categories*/
  public function free_haiku($category_1, $category_2){

    if(!empty($category_1) && !empty($category_2)){

      $query = $this->db->query("
        SELECT distinct u.*
        FROM Users u, Poems p
        WHERE u.user_id = p.user_id AND p.category = ?
        AND u.user_id IN (SELECT distinct u.user_id
                          FROM Users u, Poems p
                          WHERE u.user_id = p.user_id
                          AND p.category = ?); ",
        array($category_1, $category_2)
        );

      return $query->result();
    }

    return null;
  }

  /*Get all users who've written one of each category*/
  public function all_categories(){

    $query = $this->db->query("
      SELECT u.*
      FROM Users u
      INNER JOIN
      (SELECT count(*) as poem_count, u.user_id
      FROM Users u, Poems p
      WHERE u.user_id = p.user_id
      GROUP BY u.user_id) as b
      ON poem_count = 5 AND b.user_id = u.user_id;
      ");

    return $query->result();
  }

  /*Writer's whose number of written poems of a
  category is 5% higher than the average number
  of poems for that category and writer's average number of votes is 5% higher
  then the average number of votes in said category*/

  public function complex(){

    $query = $this->db->query("

    SELECT u.*
    FROM Users u,
    (SELECT b.*
    FROM (SELECT AVG(p.votes) as avgCat, p.category
      FROM Poems p
      GROUP BY p.category
      ) as a,
      (SELECT u.*, AVG(p.votes) as avgVotes , p.category
      FROM Users u, Poems p
      WHERE u.user_id = p.user_id
      GROUP BY u.user_id AND p.category) as b
      WHERE b.avgVotes >= ((a.avgCat*.03)+a.avgCat)
            AND b.category = a.category) as con2,
    (SELECT u.*, COUNT(*) as pcount , p.category
    FROm Users u, Poems p
    WHERE u.user_id = p.user_id
    GROUP BY u.user_id AND p.category) as a,
    (SELECT AVG(b.pcount) as avgCount, b.category
    FROM (SELECT u.*, COUNT(*) as pcount, p.category
    FROm Users u, Poems p
    WHERE u.user_id = p.user_id
    GROUP BY u.user_id AND p.category) as b
    GROUP BY b.category) as b2
    WHERE a.pcount >= ((b2.avgCount*.05)+b2.avgCount)
    AND a.category = b2.category) as con1
    WHERE u.user_id=con1.user_id AND u.user_id=con2.user_id
    AND con1.user_id=con2.user_id





      ");

    return $query->result();
  }



}
