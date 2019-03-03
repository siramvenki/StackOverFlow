<?php

$var=$_GET['id'];
$pieces = explode(" ", $var);

include "config.php";

if($pieces[0]=="q")
{
	$mysqli->query("DELETE FROM questions WHERE sNo='$pieces[1]'");
	$mysqli->query("DELETE FROM views WHERE sNo='$pieces[1]'");
	$mysqli->query("DELETE FROM answers WHERE sNo='$pieces[1]'");

	header("Location: index.php"); /* Redirect browser */

}

if($pieces[0]=="q1")
{
	$mysqli->query("DELETE FROM questions1 WHERE sNo='$pieces[1]'");
	$mysqli->query("DELETE FROM views1 WHERE sNo='$pieces[1]'");
	$mysqli->query("DELETE FROM answers1 WHERE sNo='$pieces[1]'");

	header("Location: index1.php"); /* Redirect browser */

}


if($pieces[0]=="a")
{
	$mysqli->query("DELETE FROM answers WHERE aNo='$pieces[1]'");
	$mysqli->query("DELETE FROM likes WHERE aNo='$pieces[1]'");

	header("Location: displayQuestions.php"); /* Redirect browser */

}

if($pieces[0]=="a1")
{
	$mysqli->query("DELETE FROM answers1 WHERE aNo='$pieces[1]'");
	$mysqli->query("DELETE FROM likes1 WHERE aNo='$pieces[1]'");

	header("Location: displayQuestions1.php"); /* Redirect browser */

}



?>