<?php

// Fundamental Libraries that do Database Abstraction and Template Management
require_once('/usr/share/php/smarty3/Smarty.class.php');
require_once('/usr/share/php/adodb/adodb.inc.php');

// Useful Functions and Libraries
require_once('../libs/breadtrail.php');
require_once('../libs/onthelevel.php');
require_once('../libs/parsedown/Parsedown.php');
require_once('../libs/parsedown-extra/ParsedownExtra.php');

// Configurations
include('../configs/main.cfg');
$db = ADONewConnection($databasetype);
//$db->debug = true;
$db->PConnect($server,$user,$password,$database);
$db->SetFetchMode(ADODB_FETCH_NUM);

// New DB Backend stuff will go here
$db->SetFetchMode(ADODB_FETCH_ASSOC);
// First how many pages in the db
$stmt = $db->Prepare('SELECT count(id) FROM lefthandscientist.availablepages');
$result = $db->Execute($stmt);
$numberofpages = ($result->fields["count"]);

$stmt = $db->Prepare('SELECT DISTINCT parent FROM lefthandscientist.availablepages');
$result = $db->Execute($stmt);
if ($result){
    while ($arr = $result->FetchRow()) {
        # process $arr
        $stmt2 = $db->Prepare('SELECT id FROM lefthandscientist.availablepages WHERE parent=?');
        $parentid = intval($arr["parent"]);
        echo $parentid;
        echo "->";
        $result2 = $db->GetAll($stmt2,$parentid);
        for($i = 0; $i < count($result2); $i++){
          echo $result2[$i]["id"];
          if($i == (count($result2) -1)){
            echo "\n";
          } else {
            echo ",";
          }
        }
    }
}

$db->SetFetchMode(ADODB_FETCH_NUM);
//Checking for a schema that the website will use;
$stmt = $db->Prepare('SELECT * FROM lefthandscientist.pages');
$result = $db->GetAll($stmt);


$pagename = $_GET["page"];
if($pagename == ""){
  $pagename = "Home";
} else {
  $tmparray = explode('/',$pagename);
  $last = count($tmparray)-1;
  $pagename = $tmparray[$last];
}

$trail = MakeTrail($result,$pagename);
$onthelevel = PagesOnTheLevel($db,$pagename);
$socialmedia = array(
	"<i class=\"fa fa-fw fa-2x fa-github\"></i> Github" => "https://github.com/rjames93",
	"<i class=\"fa fa-fw fa-2x fa-linkedin\"></i> LinkedIn" => "https://uk.linkedin.com/pub/robert-james/90/53/570/en",
	"<i class=\"fa fa-fw fa-2x fa-twitter\"></i> Twitter" =>"https://twitter.com/rsjames93",
	"<i class=\"fa fa-fw fa-2x fa-google-plus\"></i> Google Plus" => "https://google.com/+RobertJames93",
	"<i class=\"fa fa-fw fa-2x fa-facebook\"></i> Facebook" => "https://www.facebook.com/rjames93"
);

$stmt = $db->Prepare('SELECT fragmentid FROM lefthandscientist.content WHERE page=?');
$result = $db->GetAll($stmt,$pagename);

$fragmentid = $result[0][0];
$fragmentfile = '../fragment/'.$fragmentid.'.md';

//echo $fragmentfile;
if( file_exists($fragmentfile)){
    //echo "File Exists";
} else {
    $fragmentid = uniqid();
    //echo $fragmentid;
    $fragmentfile = '../fragment/'.$fragmentid.'.md';
    touch($fragmentfile);
    $stmt = $db->Prepare('INSERT INTO lefthandscientist.content (page,fragmentid) VALUES (?,?)');
    $result = $db->Execute($stmt,array($pagename,$fragmentid));
    $db->ErrorMsg();
}


$Parsedown = new ParsedownExtra(); // For Page Content
$filecontents = file_get_contents($fragmentfile);

$content = $Parsedown->text($filecontents);


// Smarty Shit below here!
$smarty = new Smarty();
$smarty->template_dir = $template_dir;
$smarty->compile_dir  = $compile_dir;
$smarty->config_dir   = $config_dir;
$smarty->cache_dir    = $cache_dir;

// Smarty assignment
$smarty->assign('title','The Left Hand Scientist');
$smarty->assign('breadcrumb', $trail);
$smarty->assign('socialmedia', $socialmedia);
$smarty->assign('onthislevel', $onthelevel);
$smarty->assign('content',$content);
$smarty->assign('fragmentid', $fragmentid);

//** un-comment the following line to show the debug console
//$smarty->debugging = true;
//$smarty->caching = 1;
//$smarty->compile_check = true;

$smarty->display('scripts.tpl');

?>
