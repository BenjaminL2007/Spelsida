<?php
include_once 'includes/header.php';

if(isset($_POST['login'])){
    $return = $user->login($_POST['uname'], $_POST['upass']);

}
?>


<div class="container">
    <h1>Login form</h1>
    <form method="post">
        <label for="uname">Username or email</label><br>
        <input type="text" name="uname" id="uname"><br>
        <label for="upass">Password</label><br>
        <input type="password" name="upass" id="upass"><br>
        <input type="submit" name="login" value="Register">
    </form>
</div>