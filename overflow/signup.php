<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

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
    
  if(isset($_SESSION["user"]))
    {
      header("Location: index.php");
      exit();
    }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $userName= $_POST["userName"];
            $profession=$_POST["profession"];
            $password = $_POST["password"];
            $rePassword = $_POST["rePassword"];

            if($userName!="" && $password!="" && $profession!="" && (strcmp($password, $rePassword)==0))
            {
             include "config.php";
              $result=$mysqli->query("INSERT INTO users(userName,email,password,profession) VALUES('$userName','$email','$password','$profession')");

              header("Location: signin.php");
              exit();
            }
            else
            {
              $_SESSION["errorMessage"]="Error in signup";
              header("Location: signup.php");
              exit();
            }

          }
          if(isset($_SESSION["user"]))
          {
            print $_SESSION["errorMessage"];
          }
          $_SESSION["errorMessage"]="";
  ?>





  <!-- <div class="container"> -->
  <?php


      if(isset($_SESSION["user"]))
      {
        include "headerLogout.php";    
      }
      else
      {
        include "header.php";
      }
  ?>

  <div class="row center">
    <form class="col s12 center" action="signup.php" method="POST">

      <div class="row">
        <div class="input-field col s12">
          <h4>Sign up</h4><br>  
         Already have an account?  <a href="signin.php">Sign in here</a>

        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Enter Email ID</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <input id="name" name="userName" type="text" class="validate">
          <label for="name">Enter User Name</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input name="profession" type="text" class="validate">
          <label for="profession">Enter Profession</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Enter Password</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="rePassword" name="rePassword" type="password" class="validate">
          <label for="rePassword">Re Enter Password</label>
        </div>
      </div>
      

      
      <div class="row">
        <div class="input-field col s12">
        
          <button class="btn waves-effect waves-light green col s5 l5 m5 left" type="submit" name="action">Sign up
<!--             <i class="material-icons right">send</i>
 -->          </button>
          <button class="btn waves-effect waves-light green col s5 l5 m5 right" type="reset" name="action">Reset
            <!-- <i class="material-icons right">loop</i> -->
          </button>

        </div>
      </div>
      
    </form>
  </div>
<!-- 
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

 -->

 <!--  Scripts-->
 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script src="js/materialize.js"></script>
 <script src="js/init.js"></script>

</body>
<?php
  include "footer.php";
  ?>
</html>

