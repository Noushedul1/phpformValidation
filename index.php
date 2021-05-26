<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
function validate($str){
	return trim(htmlentities($str));
}
if (empty($_POST['name'])) {
		$nameError = 'Name should be filled';
	} else {
		$name = validate($_POST['name']);
		// echo $name;
	}

if(empty($_POST['pass'])){
	$passError = 'Fill your pass';
}else{
	$password = validate($_POST['pass']);
	if(strlen($password)<6){
		$passError = 'enter more than 6 char';
		// echo $password;
	}
}

if(empty($_POST['url'])){
	$urlError = "Empty url";
}else{
	$url = validate($_POST['url']);
	$url = filter_var($url, FILTER_SANITIZE_URL);
	if(!filter_var($url, FILTER_VALIDATE_URL)){
		$urlError = "Wrong url";
	}else{
		echo $url ;
	}
}
// if(empty($_POST['int'])){
// 	$intError = "empty intiger";
// }else{
// 	$int = validate($_POST['int']);
// 	if(!filter_var($int, FILTER_VALIDATE_INT)){
// 		$intError =  "not intiger";
// 	}else{
// 		echo $int;
// 	}
// }

if(empty($_POST['email'])){
	$emailError = "your email is empty";
}else{
	$email = validate($_POST['email']);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$emailError = "your email is not validet email";
	}else{
		echo $email;
	}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form validation part 1</title>
	<style>
		.error{
			color: black;
			background: red;
		}
		.passError{
			color: black;
			background: red;
		}
		.emailError{
			color: black;
			background: red;
		}
		.urlError{
			color: black;
			background: red;
		}
		.intError{
			color: black;
			background: red;
		}
		.fltError{
			color: black;
			background: red;
		}
	</style>
</head>
<body>
	<form action="" method="POST">
		Name: 
		<input type="text" name="name">
		<span class="error"><?php if(isset($nameError)) echo $nameError ?></span><br>
		Email: 
		<input type="text" name="email">
		<span class="emailError"><?php if(isset($emailError)) echo $emailError ?></span>
		<br>
		Password: 
		<input type="text" name="pass">
		<span class="passError"><?php if(isset($passError)) echo $passError ?></span>
		<br>
		URL :
		<input type="url" name="url">
		<span class="urlError"><?php if(isset($urlError)) echo $urlError ?></span>
		<br>
		Intiger:
		<input type="number" name="number">
		<span class="intError"><?php if(isset($intError)) echo $intError ?></span>
		<br>
		Floot:
		<input type="number" name="floot">
		<span class="intError"><?php if(isset($fltError)) echo $fltError ?></span>
		<br>
		<input type="submit" name="submit">
	</form>
</body>
</html>
