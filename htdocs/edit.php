<?php
session_start();

// Fundamental Libraries that do Database Abstraction and Template Management
require_once('/usr/share/php/smarty3/Smarty.class.php');
require_once('/usr/share/php/adodb/adodb.inc.php');
require_once('../libs/phpass/src/Phpass/Loader.php');
require_once('../libs/websitetree.php');
require_once('../libs/pagecontent.php');
require_once('../vendor/autoload.php');

// Configurations
include('../configs/main.cfg');
$db = ADONewConnection($databasetype);
//$db->debug = true;
$db->PConnect($server,$user,$password,$database);
// New DB Backend stuff will go here
$db->SetFetchMode(ADODB_FETCH_ASSOC);

// Smarty Shit below here!
$smarty = new Smarty();
$smarty->template_dir = $template_dir;
$smarty->compile_dir  = $compile_dir;
$smarty->config_dir   = $config_dir;
$smarty->cache_dir    = $cache_dir;
//$smarty->debugging = true;

// Check POST form information
$username = $_POST["inputEmail"];
$password = $_POST["inputPassword"];

$sid = session_id();
//echo $sid;
// Logout requested?
$logout = $_POST["logout"];
if($logout == "true"){
	$stmt = $db->Prepare('DELETE FROM lefthandscientist.authed WHERE sid=?');
	$result = $db->Execute($stmt,$sid);
}

// Tree of Site
$stmt = $db->Prepare('SELECT title,lft,rgt,modified FROM lefthandscientist.pages ORDER BY lft ASC');
$results = $db->Execute($stmt);
$results = $results->GetArray();

$tree = create_tree($results);
$tree = json_encode($tree);

$smarty->assign('tree',create_tree($results));
//echo "<pre>", var_dump(create_tree($results),0), "</pre>";
//echo "<pre>";
//echo json_encode(create_tree($results), JSON_FORCE_OBJECT);
//echo "</pre>";



//Check if session id is in the database
$stmt = $db->Prepare('SELECT sid FROM lefthandscientist.authed WHERE sid=?');
$result = $db->Execute($stmt,$sid);

if( $username == NULL || $password == NULL ){
	if($result->fields["sid"] == $sid){
		//$tree = display_tree($db,1);

		$smarty->assign('tree',$tree);
		$smarty->display('dashboardblocks.tpl');
		exit();
	}
	$smarty->display('login.tpl');
	exit();
}



// Calculate a bcrypt hash from a password
$hash = PHPassLib\Hash\BCrypt::hash($password);

// Lookup Hash For the Username supplied
$stmt = $db->Prepare('SELECT passwordhash FROM lefthandscientist.login WHERE username=?');
$result = $db->Execute($stmt,$username);
$hash = $result->fields["passwordhash"];

//$tree = display_tree($db,1);


if($result){
	// Check supplied password against a stored hash
	if (PHPassLib\Hash\BCrypt::verify($password, $hash)) {
		// Password is valid!
		//echo 'Success';
		//$db->Prepare('INSERT INTO ')
		//echo $sid;
		$smarty->assign('tree',$tree);
		// Insert sid into table 'SELECT sid, username, password FROM authed WHERE sid=?'
		$stmt = $db->Prepare('INSERT INTO lefthandscientist.authed ("sid") VALUES (?)');
		$result = $db->Execute($stmt,$sid);

		$smarty->display('dashboardblocks.tpl');
		exit();
	} else {
		//echo 'Failed';
		$smarty->assign('failed','LOGIN FAILED');
		$smarty->display('login.tpl');
		exit();
	}
} else {
	$smarty->assign('failed','LOGIN FAILED');
	$smarty->display('login.tpl');
	exit();
}

?>
