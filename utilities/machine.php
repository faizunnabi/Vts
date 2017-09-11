<?php
/**
 * Created by PhpStorm.
 * User: Faizun Nabi
 * Date: 1/17/2017
 * Time: 9:52 AM
 */

$host = "localhost";
$user = "root";
$pass = "rumaithy";
$db = "Tracker"; 
/*if($_GET['status']==""){
	$qry =="";
}else{
	$qry = "where online_status="+$_GET['status'];
}*/
$data = array();
$db = new PDO('mysql:host=localhost;dbname=Tracker;charset=utf8mb4', 'root', 'rumaithy');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$stmt = $db->query("SELECT * FROM machines order BY name");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($data, $row);
}
echo '{"result":"ok","data":'.json_encode($data).'}';