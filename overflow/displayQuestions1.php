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
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // $var_value = $_GET['varname'];



            $answer = $_POST["answer"];
            $code = $_POST["code"];
            
            if($answer=="" ||  $code=="")
            {
              header('Location: '.$_SERVER['PHP_SELF']);
              die; 
            }

            $sId=$_SESSION["user"];

            include "config.php";
            $results = $mysqli->query("SELECT userName FROM users where id='$sId'");
            while($row = $results->fetch_assoc())
            {
              $user=$row["userName"];
            }      

            $temp=$_SESSION["qId"];


            
            $result=$mysqli->query("INSERT INTO answers1(sNo,userName,answer,code) VALUES('$temp','$user','$answer','$code')");
            header('Location: '.$_SERVER['PHP_SELF']);
            die;

            // header("Location: displayQuestions.php"); /* Redirect browser */
            // exit();


    }

      // $_SESSION["qId"] = $_GET['id'];
      if(!isset($_SESSION["thumbsQID"]))   // if thumbs qid is not set i.e., it is entering with qid
      {
        $_SESSION["qId"]=$_GET['id'];
      }

      $_SESSION["thumbsQID"]=$_SESSION["qId"];

      $temp4=$_SESSION["qId"];

      include "config.php";
      
      if(isset($_SESSION["user"]))
      {
        $temp5=$_SESSION["user"];
        $results = $mysqli->query("SELECT * FROM views1 where sNo='$temp4' and id='$temp5'");
        if(!($row = $results->fetch_assoc()))
        {
          $mysqli->query("INSERT INTO views1(sNo,id) VALUES('$temp4','$temp5')");
        }
      }

      // print "$id";
      $results = $mysqli->query("SELECT * FROM questions1 where sNo='$temp4'");
      print '<h4 class="header">Question</h4>';
      while($row = $results->fetch_assoc()) {
        print '<div class="card indigo lighten-5">';
        print '<div class="card-content black-text">';
        

        $temp=$row["question"];
        $temp=str_replace("\n", "<br/>", $temp);
        // print '<font color="white">';
        print '<span class="card-title">';

        print "$temp";
        print '</span>';
        print '  <div class="divider brown"></div>';
        print "Asked by: ".$row["userName"]."<br/>";  
        
        print "<br/>";
        $temp=$row["code"];
        $temp=str_replace("\n", "<br/>", $temp);
        print $temp;
        // print '</font>';
        print '</div>';
        print '</div>';

      }
      ?>
  </div>


  <div class="container">
    

      <?php
      $results = $mysqli->query("SELECT COUNT(*) FROM answers1 where sNo='$temp4'");
      if($row = $results->fetch_assoc())
      {
        if($row["COUNT(*)"]==0)
        {
          print '<div class="row"></div>';
          print '<div class="row"></div>';
          print '<div class="row"></div>';

          print '<div class="card indigo lighten-5">';
          print '<div class="card-content black-text">';

          print '<span class="card-title">No Answers Posted Yet</span>';

          print '</div>';
          print '</div>';
          print '<div class="row"></div>';
          print '<div class="row"></div>';
          print '<div class="row"></div>';
          
        }
        else
        {

      print "<br/>".'<h4 class="header">Answers</h4>';

      $results = $mysqli->query("SELECT * FROM answers1 where sNo='$temp4' ORDER BY aNo DESC");

      while($row = $results->fetch_assoc()) {
        print '<div class="card indigo lighten-5">';
        print '<div class="card-content black-text">';

        $aNo=$row["aNo"];
        $res = $mysqli->query("SELECT * FROM likes1 where aNo='$aNo'");
        $temp=$row["answer"];
        $temp=str_replace("\n", "<br/>", $temp);

        $l=0;
        $d=0;
        while($ro = $res->fetch_assoc())
        {
          $l=$l+$ro["positive"];
          $d=$d+$ro["negative"];
        }
        

        // print " -- ".$row["userName"]."<br/>";  

        print '<span class="card-title">';
        $temp3="a1"." ".$aNo;
        print '<p class="right-align">';

        if(isset($_SESSION["admin"]) || isset($_SESSION["editor"]))
        { 
          print "<a href='delete.php?id=$temp3'>";
          print '<i class="material-icons">delete</i>';
          print "</a>";                
        }

        print '</p>';

        print "$temp";
        print '</span>';
        print '  <div class="divider brown"></div>';

        print "<br>";
        $temp=$row["code"];
        $temp=str_replace("\n", "<br/>", $temp);
        print $temp;

        print '</font>';
        print "<br>";
        print "<br>";
       
        print '<div class="row">';
        print '<div class="col s12 m4 l2">';

        if(isset($_SESSION["user"]))
        {
          print "<a href='like1.php?aId=$aNo'>";
          print '<i class="material-icons indigo lighten-5 ">thumb_up</i>&nbsp;';
          print "</a>"; 
        }
        else
        {
          print '<i class="material-icons">thumb_up</i>';
        }

        $temp6="l1 ".$aNo;
        if($l!=0)
        {
          print "<a target = '_blank' href='popLikes.php?id=$temp6'>";
        // print '<a href=#likes>';
        print " ".$l." &nbsp; &nbsp;";
        print '</a>';  
        }
        else
        {
          print " ".$l." &nbsp; &nbsp;";
        }

        if(isset($_SESSION["user"]))
        {
          print "<a href='disLike1.php?aId=$aNo'>";
          print '<i class="material-icons indigo lighten-5">thumb_down</i>';
          print "</a>"; 
        }
        else
        {
          print '<i class="material-icons">thumb_down</i>';
        }
        print " ".$d;

        print '</div>';

        print '<div class="col s12 m4 l8">';


         print '<p class="black-text"> submitted by :  ' .$row["userName"];
              echo ' on '.date('M j Y g:i A', strtotime($row['answeredTime'])).'</P>';
       
        print '</div>';

        print '</div>';
        print '</div>';
        print '</div>';

                print '  <div class="divider white"></div>';
                print '  <div class="divider white"></div>';
                print '  <div class="divider white"></div>';
                print '  <div class="divider white"></div>';
                print '  <div class="divider white"></div>';


      }

          print '<div class="row"></div>';
          print '<div class="row"></div>';

    }

  }

  ?>

   <!-- Modal Structure -->
          <div id="likes1" class="modal">
            <div class="modal-content">
              <div class="row">
              <?php
              $var=$temp6;
              $pieces = explode(" ", $var);

              include "config.php";
              if($pieces[0]=="l") 
                $results = $mysqli->query("SELECT * FROM likes1 where aNo='$pieces[1]' and positive=1");
              else
                $results = $mysqli->query("SELECT * FROM likes1 where aNo='$pieces[1]' and positive=1");

              print '<table class="responsive-table col s12">';
              print "<thead>";

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
              print "</thead>";

              print "<tbody>";


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
              print "</tbody>";
              print "</table>";


                ?>

                <!-- </div> -->
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">close</a>
            </div>
          </div>


</div>
</div>



  <div class="container">  


    <?php

    if(isset( $_SESSION["user"])){
      ?>


      
  <h4 class="header">Submit your Answers</h4>
  <div class="container">



    <form class="col s12 l9" method="POST" action="displayQuestions1.php">
      <div class="row">
        <div class="input-field col s12">
        <h5> Answer</h5>

          <textarea id="description" name="answer" style="height: 5rem;" ></textarea>
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
      <?php

    }

     ?>
     </div>

     <?php

    include "footer.php";

     ?>

  </body>
 
</html>

