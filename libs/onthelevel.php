<?php

function PagesOnTheLevel($database,$pagename){

    $onthelevel = array();


    $stmt = $database->Prepare('SELECT parent FROM lefthandscientist.pages WHERE title=?');
    $result = $database->GetAll($stmt,$pagename);

    $parentid = $result[0][0];

    if($parentid == 0){
        $parentid = 1;
    }


    $stmt = $database->Prepare('SELECT title FROM lefthandscientist.pages WHERE parent=?');
    $result = $database->GetAll($stmt,$parentid);


    $resultsize = count($result);

    //Remove the 404 Page from the Result

    for($i = 0; $i < $resultsize; $i++){
        $onthelevel[$i] = $result[$i][0];
    }
    return($onthelevel);
}

?>
