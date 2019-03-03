<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>


  <?php

      session_start();


      if(isset($_SESSION["user"]))
      {
        include "headerLogout.php";    
      }
      else
      {
        include "header.php";
      }
  ?>

  <div class="container">
	<?php
	$var=$_GET['id'];
	$pieces = explode(" ", $var);

	include "config.php";
	if($pieces[0]=="l")	
		$results = $mysqli->query("SELECT * FROM likes where aNo='$pieces[1]' and positive=1");
	else
		$results = $mysqli->query("SELECT * FROM likes1 where aNo='$pieces[1]' and positive=1");

	print "<table>";

	print "<tr>";
	print "<th>";
	print "Name";
	print "</th>";

	print "<th>";
	print "Email";
	print "</th>";

	print "<th>";
	print "Profession";
	print "</th>";

	print "</tr>";




	while($row = $results->fetch_assoc())
	{

		$id=$row["id"];
		$res = $mysqli->query("SELECT * FROM users where id='$id'");		
		if($ro = $res->fetch_assoc())
		{
			print "<tr>";

			print "<td>";
			print $ro["userName"];
			print "</td>";

			print "<td>";
			print $ro["email"];
			print "</td>";

			print "<td>";
			print $ro["profession"];
			print "</td>";

			print "</tr>";


			// print $ro["userName"]." ".$ro["email"]."<br/>"; 
		}	


	}
	print "</table>";


    ?>

    </div>


	<div style="position: absolute; bottom: 0px; width: 100%">
		
    <?php 
	include "footer.php";
     ?>
		
	</div>    	
    	
  


</body>
</html>