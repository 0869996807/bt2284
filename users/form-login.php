<?php
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
 	if(checkLogin() != null){
 		header('location: quantri.php');
 	}

	$username = $password ='';
	if(!empty($_POST)){
		$username = getPost('username');
		$password = getPost('password');
		$password = getMd5Security($password);
		echo $password;
	}
	if(!empty($username) && !empty($password)) {
		$sql = "select * from users where username = '$username' and password = '$password'";
		$user = executeResult($sql);
		if($user != null && count($user)>0){
			$token = $user[0]['username'].time();
			$token = getMd5Security($token);
			$sql = "update users set token = '$token' where username = '" .$user[0]['username']."'";
			execute($sql);
			setcookie('status', 'login', time()+7*24*60*60, '/');
			setcookie('token', $token, time()+7*24*60*60, '/');
			header('location: quantri.php');
			die();

		}else {
			$message = "username/password không đúng!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}

	}
