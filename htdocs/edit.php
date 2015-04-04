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

// Check POST form information
$username = $_POST["inputEmail"];
$password = $_POST["inputPassword"];

if($username == NULL || $password == NULL){
  $smarty->display('login.tpl');
  exit();
}

// Calculate a bcrypt hash from a password
$hash = PHPassLib\Hash\BCrypt::hash($password);

// Lookup Hash For the Username supplied
$stmt = $db->Prepare('SELECT passwordhash FROM lefthandscientist.login WHERE username=?');
$result = $db->Execute($stmt,$username);
$hash = $result->fields["passwordhash"];

$tree = display_tree($db,1);

if($result){
  // Check supplied password against a stored hash
  if (PHPassLib\Hash\BCrypt::verify($password, $hash)) {
    // Password is valid!
    //echo 'Success';
    //$db->Prepare('INSERT INTO ')
    $sid = session_id();
    echo $sid;
    $smarty->assign('tree',$tree);
    $smarty->display('dashboardblocks.tpl');
  } else {
    //echo 'Failed';
    $smarty->assign('failed','LOGIN FAILED');
    $smarty->display('login.tpl');
  }
} else {
  $smarty->assign('failed','LOGIN FAILED');
  $smarty->display('login.tpl');
}

?>
