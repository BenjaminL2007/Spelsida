<?php
include_once 'includes/header.php';

if(isset($_POST['updateinfo'])){
    $feedback = $user->checkUserRegisterInput($_POST['username'], $_POST['email'], $_POST['passwordnew'], $_POST['passwordconfirm']);

    if($feedback === 1) {
        $user->editUserInfo($_POST['email'], $_POST['upassword'], $_POST['passwordnew']);
    }else {

    foreach ($feedback as $item){
        echo $item;
    }
}
}

?>


<div class="container">
    <h1>Your account</h1>
    <form method="post">
        <label for="uname">Username</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="uname">E-mail</label><br>
        <input type="text" name="email" id="email"><br>
        <label for="upass">Old Password</label><br>
        <input type="password" name="upassword" id="upassword"><br>
        <label for="upass">New password</label><br>
        <input type="password" name="passwordnew" id="passwordnew"><br>
        <label for="upass">Password (again)</label><br>
        <input type="password" name="passwordconfirm" id="passwordconfirm"><br>
        <a href="home.php" type="button" class="btn btn-light" >Return</a>
        <button type="submit" name="updateinfo" class="btn btn-success" >Update info</button>
</form>
</div>
<?php
    /*$stmt_fetchUserData = $this->pdo->prepare('SELECT * FROM table_users WHERE u_id = :id');
	$stmt_fetchUserData->bindParam(':id', $_SESSION['user_id']);*/
