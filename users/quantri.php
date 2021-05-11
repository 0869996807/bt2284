<?php
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
 	 	if(checkLogin() == null){
 		header('location: login.php');
 	}
 	$token = '';
 	if(!empty($_COOKIE)){
 		$token=$_COOKIE['token'];
 		 	}
 	$sql = " select * from users where token= '$token'";
 	$result = executeResult($sql);
 	foreach ($result as $item) {
 		$id="$item[id]";
 	}

 	$sql = " select title, thumnail, price, created_at, id_user from gift where id_user = $id";
 	$gift = executeResult($sql);
 	 ?>	

 <!DOCTYPE html>
<html>
<head>
<title>quantri</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/md5.js"></script>
<body>
	<a href="signout.php"><button class="btn btn-info" style="float: right; margin: 10px; ">dang xuat</button></a>
</body>
 	
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>thumnail</th>
			<th>title</th>
			<th>price</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$count=0;
			foreach ($gift as $item) {
	        echo '<tr>
					<td>(++$count)</td>
					<td><img src="'.$item['thumbnail'].'" style="width: 160px;"/></td>
					<td>'.$item['title'].'</td>
					<td>'.$item['price'].'</td>
					<td>'.$item['created_at'].'</td>
					<td><a href="add-gift.php?id_user='.$item['id_user'].'"><button class="btn btn-warning">Edit</button></a></td>
					<td><button class="btn btn-danger" onclick="deletegift('.$item['id_user'].')">Delete</button></td>
				 </tr>';
	}
		 ?>
</table>
<script type="text/javascript">
	function deletegift(id_user) {
		option = confirm('Are you sure to delete this product?')
		if(!option) return

		$.post('form-product.php', {
			'action': 'delete',
			'id_user': id_user
		}, function(date) {
			location.reload()
		})
	}
</script>

