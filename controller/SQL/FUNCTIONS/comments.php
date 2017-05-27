<?php
include("connect.php");
function comments($bdd,$like){
	$query = "SELECT * FROM comments WHERE aliment_id_aliment LIKE ?";
	$prep = $bdd->prepare($query);
	$prep->execute(array($like)) or die("Failure");
		return $prep->fetchAll(PDO::FETCH_ASSOC);
}

function add_comments($bdd,$text,$id,$id_user){
	$query = "INSERT INTO comments (aliment_id_aliment,text_comment,user_id_user)
	VALUES (?, ?, ?);";
	$prep = $bdd->prepare($query);
	$prep->execute(array($id, $text, $id_user)) or die("Erreur BDD");
}

function add_note($bdd,$note,$id,$id_user){
	$query = "INSERT INTO notes (aliment_id_aliment,note,user_id_user)
		VALUES (?, ?, ?);";
	$prep = $bdd->prep($query);
	$prep->execute(array($id, $note, $id_user)) or die("Erreur BDD");
}

function notes($bdd,$like){
	$query = "SELECT AVG (note) FROM notes WHERE aliment_id_aliment LIKE ?";
	$prep = $bdd->prep($query);
	$prep->execute(array($like)) or die("Erreur BDD");
	$select = $prep->fetch(PDO::FETCH_ASSOC);
	return $select;
}
?>
