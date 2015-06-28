<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/material.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="https://lefthandscientist.co.uk/css/roboto.min.css" rel="stylesheet">
    <link href="https://lefthandscientist.co.uk/css/material.min.css" rel="stylesheet">
    <link href="https://lefthandscientist.co.uk/css/ripples.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Custom Style Sheet From Here -->
    <link href="https://lefthandscientist.co.uk/css/custom.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css"></style></head>

  <body>

    <div class="container">
      <form class="form-signin" method="POST" action="edit.php">
        <h2 style="text-align: center" class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      {if $failed eq 'LOGIN FAILED'}
      <div style="text-align: center;" class="alert alert-danger" role="alert">{$failed}</div>
      {/if}
	<div style="text-align:center;"><h3>You here by Accident?<br> Are called Hobbid?</br> Click <a href="https://lefthandscientist.co.uk">Here</a> to return to the homepage</div>

    </div> <!-- /container -->
	


</body></html>
