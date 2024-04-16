<?php
function addGame($pdo){
	
	$stmt_addNewGame = $pdo->prepare('INSERT INTO games (game_name, price, game_description, img, link) VALUES (:game_name, :price, :game_description, :img, :link)');
	$stmt_addNewGame->bindParam(':game_name', $_POST['game_name'], PDO::PARAM_STR);
	$stmt_addNewGame->bindParam(':price', $_POST['price'], PDO::PARAM_STR);
	$stmt_addNewGame->bindParam(':game_description', $_POST['game_description'], PDO::PARAM_STR);
	$stmt_addNewGame->bindParam(':img', $_POST['img'], PDO::PARAM_STR);
	$stmt_addNewGame->bindParam(':link', $_POST['link'], PDO::PARAM_STR);
    if ($stmt_addNewGame->execute()){
        return "Game added successfully";
	}
		else{
		return "Something went wrong, try again later";
	}
}

?>