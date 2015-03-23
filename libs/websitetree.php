<?php

function display_tree($db,$rootid){
    //Retrieve the Left and Right Value of the $rootid node
    $stmt = $db->Prepare('SELECT lft,rgt FROM lefthandscientist.pages WHERE id=?');
    $result = $db->Execute($stmt,$rootid);

    $row = $result->fields;

    //Start with empty $right stack
    $right = array();
    $titles = array();

    $stmt = $db->Prepare('SELECT title,lft,rgt FROM lefthandscientist.pages WHERE lft BETWEEN ? AND ? ORDER BY lft ASC');
    $result = $db->Execute($stmt,array($row["lft"],$row["rgt"]));

    while ($row = $result->FetchRow()){
        // only check stack if there is one
        if (count($right)>0) {
            // check if we should remove a node from the stack
            while ($right[count($right)-1]<$row['rgt']) {
                array_pop($right);
            }
        }
        // add this node to the stack
        $right[] = $row['rgt'];
        $titles[] = $row['title'];
    }

    return($titles);
}

function display_path($db,$id){
    $path = [];

    $stmt = $db->Prepare("SELECT title,lft,rgt FROM lefthandscientist.pages WHERE id=?");
    $result = $db->Execute($stmt,$id);

    $starttitle = $result->fields["title"];
    $rgt = $result->fields["rgt"];
    $lft = $result->fields["lft"];

    $stmt = $db->Prepare("SELECT id,title FROM lefthandscientist.pages WHERE lft < ? AND rgt > ? ORDER BY lft ASC");
    $result = $db->Execute($stmt,array($lft,$rgt));

    while ($row = $result->FetchRow()){
        array_push($path,$row['title']);
    }

    array_push($path,$starttitle);

    return($path);
}

function find_pageid($db,$pagename){
    $pagename = str_replace(' ', '', $pagename);
    $pagename = strtolower($pagename);
    $stmt = $db->Prepare("SELECT id FROM lefthandscientist.pages WHERE lower(replace(title,' ',''))=?");
    $result = $db->Execute($stmt,$pagename);
    if($result){
        return($result->fields["id"]);
    } else {
        return(0);
    }
}


?>
