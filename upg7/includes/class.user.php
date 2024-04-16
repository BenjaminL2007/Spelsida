<?php

class User {
  public $username;
  public $email;
  private $password;
  public $role;
  private $status;
  public $pdo;



  function __construct($pdo) {
	$this->role = 4;
	$this->username = "RandomGuest123";
	$this->pdo = $pdo;
  }

  private function cleanInput($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }
  
  public function checkUserRegisterInput($uname, $umail, $upass, $upassrepeat){
	  $errorMessages = [];
	  $errorState = 0;
	  //START Kolla om användarens inmatade username eller email finns i databasen
	  $stmt_checkUsername = $this->pdo->prepare('SELECT * FROM table_users WHERE u_name = :uname OR u_email = :email');
	  $stmt_checkUsername->bindParam(":uname", $uname, PDO::PARAM_STR);
	  $stmt_checkUsername->bindParam(":email", $email, PDO::PARAM_STR);
	  $stmt_checkUsername->execute();
	  
	  if($stmt_checkUsername->rowCount() > 0){
		  array_push($errorMessages,"Username or email is already taken! ");
		  $errorState = 1;
	  }
	  //SLUT Kolla om användarens inmatade username eller email finns i databasen
	  
	  //START Kolla om användarens inmatade lösenord stämmer överens ochj är tillräckligt långt
	  if($upass !== $upassrepeat){
		  array_push($errorMessages,"Passwords does not match! ");
		  $errorState = 1;
	  }
	  
	  else{
		  if(strlen($upass) < 8){
			array_push($errorMessages,"Password is too short! ");
			$errorState = 1;
		  }
	  }
	  //SLUT Kolla om användarens inmatade lösenord stämmer överens
	  
	  //START Kolla om användarens inmatade email är en "riktig" adress
	  if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
			array_push($errorMessages,"Email not in correct format! ");
			$errorState = 1;
		}
	  
		if($errorState === 1){
		return $errorMessages;
		}
		else {
			return 1;
			//$this->register($uname, $umail, $upass);
		}
  }

  	public function register($uname, $umail, $upass){
		$hashedPassword = password_hash($upass, PASSWORD_DEFAULT);
		$uname = $this->cleanInput($uname);

		$stmt_registerUser = $this->pdo->prepare('INSERT INTO table_users (u_name, u_password, u_email, u_role_fk, u_status) VALUES (:uname, :pw, :email, 1, 1)');
		$stmt_registerUser->bindParam(":uname", $uname, PDO::PARAM_STR);
		$stmt_registerUser->bindParam(":pw", $hashedPassword, PDO::PARAM_STR);
		$stmt_registerUser->bindParam(":email", $umail, PDO::PARAM_STR);

		if($stmt_registerUser->execute()){
			header("Location: index.php?newuser=1");
		}
		else{
			return "Your info was input correctly, something went wrong when saving to database, please be in touch with support!";
		}
	}

public function login($unamemail, $upass){
		  $stmt_checkUsername = $this->pdo->prepare('SELECT * FROM table_users WHERE u_name = :uname OR u_email = :email');
	  $stmt_checkUsername->bindParam(":uname", $unamemail, PDO::PARAM_STR);
	  $stmt_checkUsername->bindParam(":email", $unamemail, PDO::PARAM_STR);
	  $stmt_checkUsername->execute();
	  
	  if($stmt_checkUsername->rowCount() == 0){
		array_push($errorMessages, "Username does not exist! ");
		$errorState = 1;
	}

	$userData = $stmt_checkUsername->fetch();

	if(password_verify($upass, $userData['u_password'])){
		$_SESSION['user_id'] = $userData['u_id'];
		$_SESSION['user_name'] = $userData['u_name'];
		$_SESSION['user_role'] = $userData['u_role_fk'];
		header("Location: home.php");
		
	} else{
		echo "Username or password does not match!";
	}



}

function checkLoginStatus(){
	if(isset($_SESSION['user_id'])){
		return true;
	}
	else{
		header("Location: login.php");
	}
}

public function logout(){
	session_unset();
	session_destroy();
	header("Location: login.php");
}

public function checkUserRole($val){
	$stmt_checkUserRoleLevel = $this->pdo->prepare('SELECT * FROM table_roles WHERE r_id = :rid');

	$stmt_checkUserRoleLevel->bindParam(":rid", $_SESSION['user_role'], PDO::PARAM_INT);
	$stmt_checkUserRoleLevel->execute();
	$result = $stmt_checkUserRoleLevel->fetch();

	if($result['r_level'] >= $val) {
		echo "true";
	}
	else {echo "false";}
}


public function editUserInfo($email, $upassword, $passwordnew){
	$stmt_fetchUserData = $this->pdo->prepare('SELECT * FROM table_users WHERE u_id = :id');
	$stmt_fetchUserData->bindParam(':id', $_SESSION['user_id']);
	$stmt_fetchUserData->execute();

	$user_data = $stmt_fetchUserData->fetchAll();
	foreach($user_data as $row){

	
	if(password_verify($upassword, $row['u_password'])){
	$hashedPassword = password_hash($passwordnew, PASSWORD_DEFAULT);

	$stmt_editUser = $this->pdo->prepare('UPDATE table_users SET u_password = :upassword, u_email = :email WHERE u_id = :id');
	$stmt_editUser->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
	$stmt_editUser->bindParam(":upassword", $hashedPassword, PDO::PARAM_STR);
	$stmt_editUser->bindParam(":email", $email, PDO::PARAM_STR);
	$stmt_editUser->execute();
	echo "works";
}
else {
	array_push($errorMessages,"Something went wrong");
	$errorState = 1;
	return $errorMessages;

}
}


	//MÅSTE FIXAS!!!
}
}



