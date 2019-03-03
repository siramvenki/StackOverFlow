<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Home Page</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
  <body class="blue lighten-5">
  <?php

      session_start();

      if(isset($_SESSION["thumbsQID"]))
      {
        unset($_SESSION["thumbsQID"]);
      }
      
      if(isset($_SESSION["posting"]))
      {
        unset($_SESSION["posting"]);
        header("Location: postQuestion.php"); /* Redirect browser */
      }

      if(isset($_SESSION["user"]))
      {
        include "headerLogout.php";    
      }
      else
      {
        include "header.php";
      }
  ?>
    <div style="background-image: url('images/bookstack.jpg');background-size: contain;">
  
  <?php
  if(!isset($_SESSION["user"]))
  {
  ?>
  <!-- <div style="background-color:#A4D555;"> -->
   <div class="row container">
        
          <div class="card blue-grey darken-1">
            <div class="card-content  white-text">

                <span id='close' class="right" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'>                <i class="fa fa-times btn-flat white-text" aria-hidden="true"></i>
                </span>
              <span class="card-title ">Join  QAOverflown community</span>
              <p>QA Overflown is a question and answer exchange medium where anyone can ask a question and any registered user can answer the question. Technical and General are the current available catagories.</p>
              <br>
            </div>
            
          </div>
        
      </div>

<?php
  }
  ?>

  <div class="container">

  <div class="row center">
<a href="postQuestion.php" class="btn btn-floating btn-large green pulse" >
      <i class="material-icons">edit</i></a>
    <a href="postQuestion.php" class="waves-effect waves-light btn-flat-large white-text "><h4>Post a Question</h4>
    </a>
  </div>
  <?php

    



            include "config.php";
            $results = $mysqli->query("SELECT * FROM questions ORDER BY sNo DESC");

            // print '<table border="1">';
            while($row = $results->fetch_assoc()) {
              $temp=$row["sNo"];
              $res = $mysqli->query("SELECT COUNT(*) FROM answers where sNo='$temp'");

              $temp2="q"." ".$temp;




              print '<div class="card white">';
              print '<div class="card-content black-text">';

              // print '<p class="right-align">';

              // if(isset($_SESSION["admin"]) || isset($_SESSION["editor"]))
              // { 
              //   print "<a href='delete.php?id=$temp2'>";
              //   print '<i class="material-icons">delete</i>';
              //   print "</a>";                
              // }

              // print '</p>';
              
              print "<a href='displayQuestions.php?id=$temp'>";
              print '<span class="card-title">';
                $temp1=$row["question"];
                $temp1=str_replace("\n", "<br/>", $temp1);
                
                print '<font color="black">';
                if($ro = $res->fetch_assoc()){
                  $answers=$ro["COUNT(*)"];
                }
                $views=0;
                $res = $mysqli->query("SELECT COUNT(*) FROM views where sNo='$temp'");
                if($ro = $res->fetch_assoc())
                {
                  $views=$ro["COUNT(*)"];
                }

                print $temp1;
                print '</font>';
              

                print '</span>';

                print '<p class="brown-text" style="text-align: left; "> asked by :  ' .$row["userName"];
                echo ' on '.date('M j Y g:i A', strtotime($row['questionTime'])).'<br></p>';
                 print '<p> <i class="material-icons tiny">visibility</i> Views: '.$views." and ";
                 print "Answers: ".$answers."</p>";
                 if($ro = $res->fetch_assoc())
                  print " Answers: ".$ro["COUNT(*)"]."<br/><br/>";


              print '<p class="right-align">';

              if(isset($_SESSION["admin"]) || isset($_SESSION["editor"]))
              { 
                print "<a href='delete.php?id=$temp2'>";
                print '<i class="material-icons tiny">delete</i>';
                print "</a>";                
              }

              print '</p>';
              print '</div>';
              print '</div>';


              print '</a>';

            }


  ?>
</div>
</div>
  <?php
  include "footer.php";
  ?>
  </body>
</html>
