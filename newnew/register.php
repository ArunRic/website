<?php 
include 'core/init.php';
include 'includes/overall/header.php'; 

if(empty($_POST) === false){
	$required_fields = array('username', 'password', 'password_again' , 'first_name', 'email');
	foreach($_POST as $key=>$value){
		if(empty($value) && in_array($key, $required_fields) === true){
			$errors[] = 'fill those required fields in please';
			break 1;
		}
	}
	if(empty($errors) === true){
		if(user_exists($_POST['username']) === true){
			$errors[]='sorry username \'' . $_POST['username'] . '\' is already used';
		}
		if(preg_match("/\\s/", $_POST['username']) == true){	
			$errors[] = 'username must not have spaces ';
		}

		if(strlen($_POST['password']) < 6){
			$errors[] ='password must be longer than 6 characters please';
		}
		if ($_POST['password'] !== $_POST['password_again']){
			$errors[] = 'your passwords do not match ';
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
			$error[]='please provide a valide email';
		}
		if(email_exists($_POST['email']) === true){
			$errors[]='sorry email \'' . $_POST['email'] . '\' is already used';
		}
	}
}
?>
   <h1>Register</h1>

<?php
if(isset($_GET['success']) && empty($_GET['success'])){
   echo 'you have been registered yay!';
} else {

if (empty($_POST) === false && empty($errors) === true){
	$register_data = array(
      'username'        => $_POST['username'],
      'password'        => $_POST['password'],
      'first_name'      => $_POST['first_name'],
      'last_name'       => $_POST['last_name'],
      'email'           => $_POST['email'],

      );
   register_user($register_data);
   //redirect
   header('Location: register.php?success');
   //exit
   exit();
   
} else if (empty($errors) === false) {
	echo output_errors($errors);
}
?>

   <form action="" method="post">
   		<ul> * is required
   			<li>
   				username*: <br>
   				<input type ="text" name="username">
   			</li>
   			<li>
   				password*: <br>
   				<input type ="password" name="password">
   			</li>
   			<li>
   				password again*: <br>
   				<input type ="password" name="password_again">
   			</li>
   			<li>
   				first name*: <br>
   				<input type ="text" name="first_name">
   			</li>
   			<li>
   				last name: <br>
   				<input type ="text" name="last_name">
   			</li>
   			<li>
   				Email*: <br>
   				<input type="text" name="email">
   			</li>
   			<li>
   				<input type="submit" value="register">
   			</li>
   		</ul>
   </form>

<?php 
}
include 'includes/overall/footer.php'; ?> 