<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>The Left Hand Scientist</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">The Left Hand Scientist</h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="#" id="navigation">Home</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover" class="content">
            <!--
            <h1 class="cover-heading">You Shouldn't See This.</h1>
            <p class="lead">Several Possibilities for you seeing this are: a Slow Internet Connection, Unresponsive Server (my end), Internet Pixies or I am just meddling with stuff.</p>
            <p class="lead">
              <a href="#" class="btn btn-lg btn-default">Learn more</a>
            </p>
            --!>
          </div>
    
          <div class="inner cover" hidden class="content">

          </div>

        </div>

      </div>

    </div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script>
$(document).load(function(){
    $("ul.nav.masthead-nav").load("navbar.php");
    $("div.inner.cover:visible").load("content.php",{request: $("li.active")});
});

$.ajaxSetup({ cache: true});

$(document).ready(function(){
    $("ul.nav.masthead-nav").load("navbar.php");
    $("div.inner.cover").load("content.php",{request: $("li.active").text()});
    $(document).ajaxComplete( function() { 
        $("a#navigation").click(function(){
            
            if($(this).parent().hasClass("active")){

            } else {

                $("div.inner.cover:hidden").load("content.php",{request: $(this).text(),s_page: $(this).text()});
                $("div.inner.cover:hidden").addClass("ready");
                $("div.inner.cover:visible").slideToggle();
                $("li.active").removeClass("active");
                $("div.inner.cover.ready").slideToggle();
                $(this).parent().addClass("active");
                $("div.inner.cover,ready:visible").removeClass("ready");

            };
        })
    })

});
</script>


</body>
</html>

