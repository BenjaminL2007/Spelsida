<?php 
include_once 'includes/header.php';
include_once 'includes/config.php';
$games = $pdo->query('SELECT * FROM games');

if(isset($_POST['user-login'])){
  $return = $user->login($_POST['uname'], $_POST['upass']);
}
?>

<div class="container-fluid">
<?php 
    if(isset ($_GET['newuser'])){
      echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
      You have succesfully registered. Please log in using the form below.
</div>";
}
if(isset($errorMessage)){
  echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";

foreach ($feedbackMessage as $item){
  echo $item;
}
echo "</div>";
}

?>
    <div class="row">
<?php foreach ($games as $row) {
    echo "<div class='col-4'>
<div class='card mb-5 mt-5 ms-2'>
  <img class='card-img-top' src='{$row['img']}' alt='Card image cap'>
  <div class='card-body'>
    <h2 class='card-title'>{$row['game_name']}</h2>
    <h4 class='card-title'>{$row['price']}€</h4>
    <p class='card-text'>{$row['game_description']}</p>
    <a href='{$row['link']}' class='btn btn-primary'>Buy game</a>
  </div>
</div></div>";}?>
</div>
</div>

<?php
/*
include_once 'includes/footer.php';
*/
?>