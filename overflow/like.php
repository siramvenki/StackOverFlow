<?php

	session_start();
	// $id="abc";
	$aNo=$_GET['aId'];
	if(isset($_SESSION["user"]))
	{
		$id=$_SESSION["user"];
	}

	include "config.php";
	$results = $mysqli->query("SELECT * FROM likes where id='$id' and aNo='$aNo'");
    if($row = $results->fetch_assoc())
    {
    	$like=$row["positive"];
    	$disLike=$row["negative"];

    	if($like==0)
    	{
			$disLike=$disLike-1;
			$like=$like+1;

			$results = $mysqli->query("UPDATE likes SET positive='$like' WHERE id='$id'");
			$results = $mysqli->query("UPDATE likes SET negative='$disLike' WHERE id='$id'");    		
    	}


    }

    else
    {
    	$results=$mysqli->query("INSERT INTO likes(positive,negative,aNo,id) VALUES(1,0,'$aNo','$id')");
    }

    header("Location: displayQuestions.php"); /* Redirect browser */
    exit();

?>