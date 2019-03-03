<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>manage</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
  <body>

  <?php
  include "headerLogout.php";

  session_start();
  if(!isset($_SESSION["admin"]))
  {
      // unset($_SESSION["admin"]);
      include "signin.php";
      exit();
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
      include "config.php";

      $addAdmin = $_POST["addAdmin"];
      $removeAdmin = $_POST["removeAdmin"];
      $addEditor = $_POST["addEditor"];
      $removeEditor = $_POST["removeEditor"];
      $removeUser = $_POST["removeUser"];

      if($addAdmin!="")
      {

        $mysqli->query("UPDATE users SET power=2 WHERE id='$addAdmin'");
      }
      if($removeAdmin!="")
      {
          $mysqli->query("UPDATE users SET power=0 where id='$removeAdmin'");    
      }
      if($addEditor!="")
      {
          $mysqli->query("UPDATE users SET power=1 where id='$addEditor'");
      }
      if($removeEditor!="")
      {
          $mysqli->query("UPDATE users SET power=0 where id='$removeEditor'");
      }
      if($removeUser!="")
      {
          $mysqli->query("DELETE FROM users WHERE id='$removeUser'");
          $mysqli->query("DELETE FROM likes WHERE id='$removeUser'");
          $mysqli->query("DELETE FROM likes1 WHERE id='$removeUser'");
      }

      header('Location: '.$_SERVER['PHP_SELF']);
    die;

  }

  ?>

<div class="container">
      <center><h4>Manage Permission</h4></center>
<div class="row center">
    <div class="col l2 m2 s0 center"></div>
    <div class="col l10 m10 s12 center">
    <form action="manage.php" method="POST">
      
      <table class="col s12 m12 l10">

      <tr>
        <td class="label">Add Admin: </td>
        <td> 
          <input id="grantAdmin" type="number" name="addAdmin">
        </td>
        <td>
          <button class="btn waves-effect waves-light right=align green" type="submit"><i class="material-icons">add</i>
            
          </button>
        </td>
      </tr>



        <tr>
        <td class="label">Remove Admin</td>
        <td>
          <input id="grantAdmin" type="number" name="removeAdmin">
        </td>
        <td>
          <button class="btn waves-effect waves-light right=align green" type="submit" name="action"><i class="material-icons">remove</i>
          </button>
        </td>
      </tr>

      <tr>
        <td class="label">Add Editor</td>
        <td>
          <input id="grantAdmin" type="number" name="addEditor">
        </td>
        <td>
          <button class="btn waves-effect waves-light right=align green" type="submit" name="action"><i class="material-icons">add</i>
          </button>
        </td>
      </tr>

      <tr>
        <td class="label">Remove Editor</td>
        <td>
          <input id="grantAdmin" type="number" name="removeEditor">
        </td>
        <td>
          <button class="btn waves-effect waves-light right=align green" type="submit" name="action"><i class="material-icons">remove</i>
          </button>
        </td>
      </tr>

      <tr>
        <td class="label">Remove User</td>
        <td>
          <input id="grantAdmin" type="number" name="removeUser">
        </td>
        <td>
          <button class="btn waves-effect waves-light right=align green" type="submit" name="action"><i class="material-icons">remove</i>
          </button>
        </td>
      </tr>

      </table>

     
    </form>
    </div>
    </div>
  </div>
  <?php

  include "footer.php";

  ?>
  
  </body>
 
</html>