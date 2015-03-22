<?php
function MakeTrail($arrayofpages, $currentpage){
  $trail = [];
  //var_dump($arrayofpages);
  $pretty = [];
  for($i = 0; $i < count($arrayofpages); $i++){
      $pretty[$arrayofpages[$i][0]] = $arrayofpages[$i];
  }
  for($i = 0; $i < count($arrayofpages); $i++){
    $match = str_replace(' ', '',$arrayofpages[$i][2]);
    if($match == $currentpage){
      break;
    }
  }
  if($i == count($arrayofpages)){
    if($currentpage == "Never Never Land"){
        $trail[0] = "Never Never Land";
    } else {
        $trail[0] = "Never Never Land";
        $trail[1] = $currentpage;
    }
    return($trail);
  }
  $i = $arrayofpages[$i][0];
  while ($i){
    array_unshift($trail,$pretty[$i][2]);
    $i = $pretty[$i][4];
  }
  return($trail);
}

?>
