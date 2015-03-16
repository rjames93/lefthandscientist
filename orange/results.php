<?php

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


$statement = $db->prepare('SELECT DISTINCT color FROM votes');

$results = $statement->execute();

$results->reset();
$distinctcolors = 0;
while($results->fetchArray()){
	$distinctcolors++;
}
$results->reset();

if(($_GET["ispeterannoying"] == "true")){
	echo "<div class=\"bottom\">";
}

for($i = 0; $i < $distinctcolors; $i++){
	$col = $results->fetchArray(SQLITE3_NUM);

	$statement2 = $db->prepare('SELECT count(*) FROM votes WHERE color=:col');
	$statement2->bindValue(':col',$col[0],SQLITE3_TEXT);

	$statement3 = $db->prepare('SELECT username FROM votes WHERE color=:col');
	$statement3->bindValue(':col',$col[0],SQLITE3_TEXT);

	$results2 = $statement2->execute();
	$results3 = $statement3->execute();

	$userarray = array();
	$nvotes = $results2->fetchArray(SQLITE3_NUM)[0];


	for($j = 0; $j < $nvotes; $j++){
		array_push($userarray,$results3->fetchArray(SQLITE3_NUM)[0]);
	}


	if($_GET["debug"] == "true"){
		echo "Debug\n";
		var_dump($userarray);
	}

	foreach ($userarray as $name){
		if(count($userarray) == 1){
			$str = $name;
		} else {
			if($name == $userarray[$nvotes - 1]){
				$str = $str . $name;
			} else {
				$str = $str . $name .", ";
			}
		}
	}


	if(($_GET["ispeterannoying"] == "true")){
		echo "<button class=\"color\" style=\"background-color: $col[0];\">$col[0]</button>";
	} else {

		if($col[0] == '#000000'){
			echo "<div class=\"result\">
				<a href=\"http://en.wikipedia.org/wiki/Orange_Is_the_New_Black\">
				<div class=\"circle\" style=\"background-color: $col[0]\" title=\"$col[0]\">
				<p class=\"circle-text\">$nvotes</p>
				</a>
				</div>
				$str
				</div>
				";
		} else {
			echo "<div class=\"result\">
				<div class=\"circle\" style=\"background-color: $col[0]\" title=\"$col[0]\">
				<p class=\"circle-text\">$nvotes</p>
				</div>
				$str
				</div>
				";
		}
	}
	$str = '';
}

if(($_GET["ispeterannoying"] == "true")){
	echo "</div>";
}


$statement->close();
$statement2->close();
$statement3->close();

?>
