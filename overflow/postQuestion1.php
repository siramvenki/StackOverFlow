<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Post Question</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<?php

      session_start();

      if(isset($_SESSION["thumbsQID"]))
      {
        unset($_SESSION["thumbsQID"]);
      }
      
      if(!isset($_SESSION["user"]))
      {
          $_SESSION["posting"]="posting";
          header("Location: signin.php"); /* Redirect browser */
          exit();
      }

      if(isset($_SESSION["user"]))
      {
        include "headerLogout.php";    
      }
      else
      {
        include "header.php";
      }
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $question = $_POST["question"];
            $code = $_POST["code"];

            if($question=="" ||  $code=="")
            {
              header('Location: '.$_SERVER['PHP_SELF']);
              die; 
            }
            include "config.php";
            $sId=$_SESSION["user"];
            $results = $mysqli->query("SELECT userName FROM users where id='$sId'");
            while($row = $results->fetch_assoc())
            {
              $user=$row["userName"];
            }


            
            $result=$mysqli->query("INSERT INTO questions1(userName,question,code) VALUES('$user','$question','$code')");

            header("Location: index1.php"); /* Redirect browser */
            exit();



         }
      ?>

      <div class="row container">
        
          <div class="card blue-grey darken-1">
            <div class="card-content  white-text">

                <span id='close' class="right" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'>                <i class="fa fa-times btn-flat white-text" aria-hidden="true"></i>
                </span>
              <span class="card-title ">How to post a General Question</span>
              <p>
                "General Question Post" enables user to submit question which includes the question title and its Descrpition.
              </p>
              <br>
            </div>
            
          </div>
        
      </div>


  <div class="container">

    <form class="col l9" method="POST" action="postQuestion1.php">
      
      <div class="row">
        <div class="input-field col s12">
        <h5> Question Title</h5>

          <textarea id="description" name="question" style="height: 5rem;" ></textarea>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
        <h5> Description</h5>
          <textarea id="code" name="code" style="height: 25rem;" ></textarea>
        </div>
      </div>

      <div class="row center">      
        <button class="btn waves-effect waves-light green" type="submit">
          Submit<i class="material-icons right">send</i>
        </button>  
      </div>

    </form>
  </div>

  <div class="row"></div>
    

 
  <?php
    include "footer.php";
  ?>
  </body>
</html>