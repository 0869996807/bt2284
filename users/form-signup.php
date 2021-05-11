<?php
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
 	if(checkLogin() != null){
 		header('location: quantri.php');
 	}


	$username = $email = $password ='';
	if(!empty($_POST)){
		$username = getPost('username');
		$email = getPost('email');
		$password = getPost('password');
		$password = getMd5Security($password);
	}

	if(!empty($username) && !empty($email)){
		$sql = "select * from users where username = '$username' or email = '$email'";
		$result = executeResult($sql);
		if($result != null && sizeof($result)>0){
			$message = "username/email đã tồn tại";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}else {
			$sql = "insert into users (username,email,password ) values ('$username', '$email', '$password') ";
			execute($sql);
			$message = "đăng kí thành công";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header('location: login.php');
		}
	}