<?php

include('adodb/adodb.inc.php');

$conn = &ADONewConnection('postgres');
$conn->PConnect('user=rjames93 dbname=rjames93');

$query="SELECT title FROM lefthandscientist.navigationbar WHERE active='true' ORDER BY priority LIMIT 5;";
$conn->SetFetchMode(ADODB_FETCH_ASSOC);
$dbresult = &$conn->Execute($query);
    if(!$dbresult){
    print $conn->ErrorMsg();
    }


foreach($dbresult as $k => $naventry) {
    if( $k == 0 ){
        echo "<li class=\"active\"><a href=\"#\" id=\"navigation\">$naventry[title]</a></li>";
        continue;
    }
    echo "<li><a href=\"#\" id=\"navigation\">$naventry[title]</a></li>";
}


?>
