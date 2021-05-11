<?php
	 require_once('form-signup.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Signup page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/md5.js"></script>
<style type="text/css">
		.container{
			margin-top: 20px;
			border: solid 1px;
			border-radius: 10px;
			width: 400px;
			height: 380px;
			background-color: white;

		}
		
		
	</style>
</head>
<body style="background-color: #f7d5f2">
<div class="container">
<center><h1 class="h2 page-head-line">Đăng kí</h1></center>
<div id="loading"></div>
<form id="login" action="" method="post">
<div class="form-group">
<label class="font-weight-semibold">Tên đăng nhập</label>
<div class="input-affix">
<input required="true" type="text" class="form-control" value="" id="username" placeholder="Tên đăng nhập" name="username" value="<?php echo $username ;?>">
</div>
</div>
<div class="form-group">
<label class="font-weight-semibold" for="email">Email:</label>
<div class="input-affix m-b-10">
<input required="true" type="email" class="form-control" value="" id="email" placeholder="email" name="email" value="<?php echo $email ;?>">
</div>
</div>
<div class="form-group">
<label class="font-weight-semibold" for="password">Mật khẩu</label>
<div class="input-affix m-b-10">
<input required="true" type="password" class="form-control" value="" id="password" placeholder="Mật khẩu" name="password">
</div>
</div>
<div id="result"></div>
<div class="form-group">
<div class="d-flex align-items-center justify-content-between">
<button class="btn btn-primary" type="submit" id="submit">Đăng kí</button>
<a href="login.php"> <button class="btn btn-info" type="button" id="submit1">Đăng nhập</button> </a>
</div>
</div>
</form>
</div>

</body>
</html>