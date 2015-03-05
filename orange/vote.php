<?php
include('ldap-auth.php');

$authd;
$authdUser;
$time = time();
$color;

$orangevotedb = 'colorvote.db';

if(!file_exists($orangevotedb)){
	$db = new SQLITE3($orangevotedb);
	$db->exec("CREATE TABLE votes
		(
			username TEXT PRIMARY KEY NOT NULL,
			votecast INT NOT NULL,
			color TEXT NOT NULL
		)"
	);
} else {
	$db = new SQLITE3($orangevotedb);
}

$username = $_POST['username'];
$password = $_POST['password'];
$color = $_POST['color'];

// Sanity check to stop you annoying people being annoying
$color = strtolower($color);
if(!preg_match('/^#[a-f0-9]{6}$/i', $color)){
	$color = '#000000';
}

if($_POST["username"] == "" && $_POST["password"] == ""){
	$authd = "";
} else {
	$authd = ldapAuth($username, $password);
	if($authd == "sucs"){
		if(filter_var($username,FILTER_VALIDATE_EMAIL)){
			$s = explode("@",$username);
			array_pop($s);
			$username = implode("@",$s);
		}
		$authdUser = strtolower($username);
		$type = $authd;
		$db->exec("DELETE FROM votes WHERE username='$authdUser'");
		$db->exec("INSERT INTO votes (username,votecast,color) VALUES ('$authdUser','$time','$color')");
	}

}

header("Location: vote.html");

?>
