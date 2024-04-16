<?php
include_once 'includes/header.php';
include_once 'includes/functions.php';
include_once 'includes/config.php';
?>
<h1> Add new game </h1>

<?php
if(isset($_POST['addgame'])){
	  $addGame=addgame($pdo);
      echo $addGame;
}


?>

<form method="post">
    
    <label>Game name</label>
    <input type="text" name="game_name"></input>
    <br>
    <br>
    <label>Game price</label>
    <input type="text" name="price"></input>
    <br>
    <br>
    <label>Game description</label>
    <input type="text" name="game_description"></input>
    <br>
    <br>
    <label>Link</label>
    <input type="text" name="link"></input>
    <br>
    <br>
    <label>Image</label>
    <input type="file" name="img"></input>
    <br>
    <br>
    <button type="submit"   name="addgame"    class="btn btn-primary btn-lg">Add game</button>
</form>
