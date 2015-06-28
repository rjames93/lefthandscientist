<?php

function get_page_content($db,$pageid){
	if($pageid == 0){
		return(NULL);
	}	

	$stmt = $db->Prepare('SELECT fragment FROM lefthandscientist.pages WHERE id=?');
    $result = $db->Execute($stmt,$pageid);

    $fragmentid = $result->fields["fragment"];
    if($fragmentid == NULL){
        //echo "No fragment found";
        $filename = "unwritten.md";
        $filecontent = file_get_contents('../fragment/'.$filename);

    } else {
        $filename = $fragmentid;
        $filecontent = file_get_contents('../fragment/'.$filename);
    }

    $Parsedown = new Parsedown();
    $content = $Parsedown->text($filecontent);

    $stmt = $db->Prepare('SELECT modified FROM lefthandscientist.pages WHERE id=?');
    $result = $db->Execute($stmt,$pageid);

    $modified = $result->fields["modified"];
    $modified = strtotime($modified);

    $modified = date('',$modified);
    return(array($content,$fragmentid,$modified));
}

?>
