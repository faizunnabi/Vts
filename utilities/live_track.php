<?php
/**
 * Created by PhpStorm.
 * User: Faizun Nabi
 * Date: 1/15/2017
 * Time: 11:19 AM
 */

$host = "";
$user = "";
$pass = "";
$db = "";
$im = $_GET['imei'];
$data = array();
$db = new PDO('mysql:host='';dbname='';charset=utf8mb4', '', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$stmt = $db->query("SELECT * FROM locations where imei = '$im' and latitude !=0000.0000 order BY e_date DESC limit 1");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($data, $row);
}
echo '{"result":"ok","data":'.json_encode($data).'}';
