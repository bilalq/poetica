<?php
	
	//database connection
	$config['mysql_host'] = "cs336-6.rutgers.edu";
	$config['mysql_user'] = "csuser";
	$config['mysql_pass'] = "cs392828";
	$config['db_name'] = "poetica";

	//start with XML header
	$xml = "<?xml version=\"1.0\" encoding=\"?TF-8\"?>";
	$root_element = $config['db_name'];
	$xml .="<$root_element>";

	$con = mysql_connect($config['mysql_host'], $config['mysql_user'], $config['mysql_pass']);
	$db_found = mysql_select_db($config['db_name'], $con);

	if($db_found){

		if(!$result = mysql_query("SELECT u.user_id, u.first_name, u.last_name, u.email, e.school,
								e.major, e.end, w.employer, w.job_title, w.start, w.end  
								FROM Users u, Education e, Employment w
								WHERE u.user_id = e.user_id AND u.user_id = w.user_id 
									  AND e.user_id = w.user_id"))
			die("Query failed.");
		

		if(mysql_num_rows($result) > 0){

			while($db_row = mysql_fetch_assoc($result))
			{
				$xml .= "<Users>";

				foreach($result_array as $key =>$value)
				{
					$xml .= "<$key>";
					$xml .= "<![CDATA[$value]]>"
					$xml .= "</$key>";
				}
				$xml .="</Users>"
			}
		}
		else
			die("No rows in query.");
		
	}
	else{
		die("Database doesn't exist". mysql_error());
	}

	$xml .="</$root_element>";

	mysql_close($con);
	header("Content-Type:text/xml");
	echo $xml;

	/*$file_handle = fopen("C:\Users\Zigfried\Desktop".$config['db_name'].".xml", "w");
	fwrite($file_handle, $xml);
	fclose($file_handle);*/
?>