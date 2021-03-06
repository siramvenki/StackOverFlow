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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>

<!-- <div class="container"> -->
<nav class="nav-extended red darken-2">
   <div class="nav-wrapper red darken-2 container">
     <a href="loginPost.php" class="brand-logo h3">
     <i class="material-icons">camera</i>
     Q&amp;A
     </a>

     <a href="loginPost.php" class="brand-logo center hide-on-med-and-down ">   QA Overflown</a>
     
     <!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> -->
     <ul id="nav-mobile" class="right hide-on-small-only">
       <li><a href="signin.php">Sign In</a></li>
       <li><a href="signup.php">Sign Up</a></li>
       <!-- <li><a href="collapsible.html">JavaScript</a></li> -->
     </ul>
     
   </div>
     <!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> -->
     

  </nav>

  <nav class="nav-extended red darken-1 hide-on-small-only " > 
     <ul>
   <div id="nav-mobile" class="nav-content container red darken-1 tabs tabs-transparent tabs-fixed-width">
       <li class="tab center disabled"><a href="#test1"></a></li>
       <li class="tab center"><a class="active" href="index.php">Technical</a></li>
       <li class="tab center"><a class="active" href="index1.php">General</a></li>
       <li class="tab center disabled"><a href="#test4"></a></li>
   </div>
     </ul>

    <div class="nav-content red darken-1 ">
    </div>
 </nav>
<!-- </div> -->

  <ul class="side-nav" id="mobile-demo">
       <li>   <nav class="nav-extended red darken-1">
                <div class="nav-wrapper container">
                <a href="loginPost.php" class="brand-logo left h3">
                 <i class="material-icons ">camera</i>
                     Q&amp;A
                </a>

                </div>
              </nav>
       </li>
       <li><a href="index.php">Technical</a></li>
       <li><a href="index1.php">General</a></li>
       <li><a href="signin.php">Sign In</a></li>
       <li><a href="signup.php">Sign Up</a></li>

     </ul>

        <a href="#" data-activates="mobile-demo" class="button-collapse hide-on-med-and-up"><i class="material-icons">menu</i></a>



     
            

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>

</html>
