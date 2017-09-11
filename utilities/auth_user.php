<?php
session_start();
$username = $_POST['uname'];
$pass = $_POST['upass'];

if($_POST && $_SERVER['REQUEST_METHOD'] == 'POST'){
	$db = new PDO('mysql:host=localhost;dbname=Tracker;charset=utf8mb4', 'root', 'rumaithy');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$stmt = $db->prepare("SELECT * FROM users where username = :uname and password = :upass");
	$stmt->bindParam("uname", $username,PDO::PARAM_STR) ;
	$stmt->bindParam("upass", $pass,PDO::PARAM_STR) ;
	$stmt->execute();
	if(($nr = $stmt->rowCount())!=0){
		$_SESSION['uname'] = $username;
		echo "ok";
	}else{
		echo "no";
	}

}

?>