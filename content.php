<?php
session_start();

// Get the navigation id from the request
$request=$_REQUEST["request"];

$lastpage=$_REQUEST["s_page"];

$_SESSION['lastpage']= $lastpage;

// Initialise the Markddown to html converter
include('parsedown/Parsedown.php');
$Parsedown = new Parsedown();

$pagetitle = $dbresult->fields[title];

$title = $Parsedown->text($pagetitle);

$filename = $request.".markdown";

if( file_exists("page-content/".$filename) ){
    $pagecontent = file_get_contents("page-content/".$filename);
} else {
    $pagecontent = "This page is undergoing maintainance. We apologise for the inconvienience";
}

if( empty($pagecontent) ) {
    $pagecontent = "This page is undergoing maintainance. We apologise for the inconvienience";
}

$content = $Parsedown->text($pagecontent);

echo "<div class=\"inner cover\">";
echo "<h1 class=\"cover-heading\"> $request </h1>";
echo "<p class=\"lead\"> $content </p>";
echo "</p>";
echo "</div>";

?>
