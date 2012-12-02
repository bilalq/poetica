<?php

$xml = '<?xml version="1.0" encoding="UTF-8"?>';
$xml .= "\n";
$xml .= '<Users>';
$xml .= "\n";

mysql_connect('http://cs336-9.rutgers.edu', 'csuser', 'cs02356d');
@mysql_select_db('poetica') or die( "Unable to select database");

//$result = mysql_query(
  //"SELECT u.user_id, u.first_name, u.last_name, u.email, 
  //e.major, e.school, e.end as grad_year, w.employer, w.job_title, w.start, w.end
  //FROM Users u, Education e, Employment w
  //WHERE u.user_id = e.user_id AND u.user_id = w.user_id"
//);

//$num=mysql_numrows($result);

//$i=0;
//while ($i < $num) {
  //$uid=mysql_result($result,$i,"user_id");
  //$first_name=mysql_result($result,$i,"first_name");
  //$last_name=mysql_result($result,$i,"last_name");
  //$email=mysql_result($result,$i,"email");
  //$school=mysql_result($result,$i,"school");
  //$major=mysql_result($result,$i,"major");
  //$grad_year=mysql_result($result,$i,"grad_year");
  //$employer=mysql_result($result,$i,"employer");
  //$job_title=mysql_result($result,$i,"job_title");
  //$start=mysql_result($result,$i,"start");
  //$end=mysql_result($result,$i,"end");

  //$xml .= '<User userID="'.$uid.'">\n';
$xml .= "\n";
  

  //$xml .= '</User>';
$xml .= "\n";
  //$i++;
//}

$xml .= '</Users>';
$xml .= "\n";

//mysql_close();
//header("Content-Type:text/xml");
echo $xml;
