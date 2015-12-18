<?php
include 'core/init.php';



if (empty($_POST) === false) {
	$username = $_POST['username'];
	$password = $_POST['password'];


	if (empty($username) === true || empty($password) === true){
		$errors[] = 'You need to enter a username and password';
	} else if (user_exists($username) === false){
		$errors[] = 'username not found';
	} else if (user_active($username) === false){
		$errors[] = 'not active';
	} else {
		if(strlen($password) > 32){
			$errors[] = 'password too long';
		}
		$login = login($username, $password);
		if ($login === false){
			$errors[] = 'that user name and password combo is incorrect';
		} else {
			//set user session
			$_SESSION['user_id'] = $login;
			//redirect to home
			header('Location: index.php');
			exit();
		}
	}
	
} else {
	$errors[] = 'no data recieved';
}
include 'includes/overall/header.php';
if(empty($errors) === false){
?>
	<h2> the poor server tried to log you in but...  </h2>
<?php
echo output_errors($errors);
}
include 'includes/overall/footer.php';
?>