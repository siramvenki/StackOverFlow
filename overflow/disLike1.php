<?php

	session_start();
	// $id="abc";
	$aNo=$_GET['aId'];
	if(isset($_SESSION["user"]))
	{
		$id=$_SESSION["user"];
	}

	include "config.php";
	$results = $mysqli->query("SELECT * FROM likes1 where id='$id' and aNo='$aNo'");
    if($row = $results->fetch_assoc())
    {
    	$like=$row["positive"];
    	$disLike=$row["negative"];

    	if($disLike==0)
    	{
			$like=$like-1;
			$disLike=$disLike+1;

			$results = $mysqli->query("UPDATE likes1 SET positive='$like' WHERE id='$id'");
			$results = $mysqli->query("UPDATE likes1 SET negative='$disLike' WHERE id='$id'");    		
    	}

    }

    else
    {
    	$results=$mysqli->query("INSERT INTO likes1(positive,negative,aNo,id) VALUES(0,1,'$aNo','$id')");
    }

    header("Location: displayQuestions1.php"); /* Redirect browser */
    exit();

?>