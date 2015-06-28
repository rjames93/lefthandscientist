<?php

// Fundamental Libraries that do Database Abstraction and Template Management
require_once('/usr/share/php/smarty3/Smarty.class.php');
require_once('/usr/share/php/adodb/adodb.inc.php');

// Useful Functions and Libraries
require_once('../libs/websitetree.php');
require_once('../libs/pagecontent.php');
require_once('../libs/parsedown/Parsedown.php');

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


// Now to use the GET page variable and convert it to a page id to use
$pagename = $_GET["page"];

$pagearray = explode('/',$pagename);

if($pagename == ''){
	$pagename = 'Home';
	$pageid = find_pageid($db,$pagename);
} else {
	$pageid = find_pageid($db,end($pagearray));
}

if($pageid == 0){
	$smarty->assign('is404','true');
	$pageid = 0;
	$path = array('Never Never Land','Second on the Right','Straight on till Morning');
} else {
	$path = display_path($db,$pageid);
}

$tree = display_tree($db,$pageid);
if(count($tree) == 1){
	$smarty->assign('onitsown','true');
} else {
	$smarty->assign('onthislevel',$tree);
}



// Further Smarty assignment
$smarty->assign('title','The Left Hand Scientist');
$smarty->assign('breadcrumb',$path);

$socialmedia = array(
	"<i class=\"fa fa-fw fa-2x fa-github\"></i> Github" => "https://github.com/rjames93",
	"<i class=\"fa fa-fw fa-2x fa-linkedin\"></i> LinkedIn" => "https://uk.linkedin.com/pub/robert-james/90/53/570/en",
	"<i class=\"fa fa-fw fa-2x fa-twitter\"></i> Twitter" =>"https://twitter.com/rsjames93",
	"<i class=\"fa fa-fw fa-2x fa-google-plus\"></i> Google Plus" => "https://google.com/+RobertJames93",
	"<i class=\"fa fa-fw fa-2x fa-facebook\"></i> Facebook" => "https://www.facebook.com/rjames93"
);


// Now for fragmentid and content. No idea about the best way of doing this
$output = get_page_content($db,$pageid);
if($output == NULL){
	$output[0] = "LOL WUT";
	$output[1] = "404";
	$output[2] = "0s ago";
}
$smarty->assign('content',$output[0]);
$smarty->assign('fragmentid',$output[1]);
$smarty->assign('modified',$output[2]);
$smarty->assign('socialmedia', $socialmedia);

//** un-comment the following line to show the debug console
//$smarty->debugging = true;
//$smarty->caching = 2;
//$smarty->compile_check = true;

$smarty->display('scripts.tpl');

?>
