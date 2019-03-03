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
    
    if(isset($_SESSION["user"]))
      unset($_SESSION["user"]);

    if(isset($_SESSION["admin"]))
      unset($_SESSION["admin"]);

    if(isset($_SESSION["editor"]))
      unset($_SESSION["editor"]);

    header("Location: index.php"); /* Redirect browser */

    exit();

  ?>

  </body>
</html>
