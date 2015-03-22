<html>
<head>
  <title>{$title}</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">  
  <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
  <link href="https://lefthandscientist.co.uk/css/roboto.min.css" rel="stylesheet">
  <link href="https://lefthandscientist.co.uk/css/material.min.css" rel="stylesheet">
  <link href="https://lefthandscientist.co.uk/css/ripples.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Custom Style Sheet From Here -->
  <link href="https://lefthandscientist.co.uk/css/custom.css" rel="stylesheet">
</head>
<body>
<div id="wrap">
  {block name=navbar}{/block}

  {block name=content}{/block}

  {block name=footer}{/block}
</div>
{block name=scripts}{/block}
</body>
</html>
