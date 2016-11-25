<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php include 'helpers/format_helper.php'; ?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>My Blog</title>
   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.css" rel="stylesheet">
   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
   <!-- Custom styles for this template -->
   <link href="css/custom.css" rel="stylesheet">
   <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
   <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
 </head>

 <body>

   <div class="blog-masthead">
     <div class="container">
       <nav class="blog-nav">
         <a class="blog-nav-item active" href="#">Home</a>
         <a class="blog-nav-item" href="#">All Posts</a>

       </nav>
     </div>
   </div>

   <div class="container">

     <div class="blog-header">
         <div class="logo"><img src="images/logo.png" /></div>
       <h1 class="blog-title">My Blog</h1>
       <p class="lead blog-description">My daily blog about my life.</p>
     </div>

     <div class="row">

       <div class="col-sm-8 blog-main">
