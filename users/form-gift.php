<?php
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
 	 	if(checkLogin() == null){
 		header('location: login.php');
 	}

 	if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deletegift();
			break;
		default:
			$id_user = getPost('id_user');
			if($id_user > 0) {
				updategift();
			} else {
				addgift();
			}
			break;
	}
}

	function deleteProduct() {
	$id = getPost('id_user');
	$sql = 'delete from product where id_user = '.$id;
	execute($sql);
	}

	function addgift(){
	$title = $price = $thumbnail = $content = $category_id = '';

	$title = getPost('title');
	$price = getPost('price');
	$thumbnail = getPost('thumbnail');
	$content = getPost('content');
	$id_user = getGet('id_user');

	$created_at = $updated_at = date('Y-m-d H:i:s');

	$sql = "insert into gift (title, price, thumbnail, content, id_user, created_at, updated_at) values ('$title', '$price', '$thumbnail', '$content', $id_user, '$created_at', '$updated_at')";
	execute($sql);
	$message = "Thêm gift thành công";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header('location: quantri.php');
	}

	function updateProduct() {
	$title = $price = $thumbnail = $content = '';

	$title = getPost('title');
	$price = getPost('price');
	$thumbnail = getPost('thumbnail');
	$content = getPost('content');
	$id = getPost('id');

	$updated_at = date('Y-m-d H:i:s');

	$sql = "update product set title = '$title', price = '$price', thumbnail = '$thumbnail', content = '$content', updated_at = '$updated_at' where id = $id";
	execute($sql);
}

 	