<?php
require_once ('../utils/utility.php');
require_once ('../db/dbhelper.php');

signout();
setcookie('status', 'login', time()-5);
setcookie('token', '$token', time()-5);
header('location: login.php');