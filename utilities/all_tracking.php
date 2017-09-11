<?php

$data = array();
$db = new PDO('mysql:host=localhost;dbname=Tracker;charset=utf8mb4', 'root', 'rumaithy');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$stmt = $db->query("SELECT d.status,m1.* FROM devices d,new_tracker m1 LEFT JOIN new_tracker m2 ON (m1.imei = m2.imei AND m1.id < m2.id) WHERE m2.id IS NULL and d.imei=m1.imei");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($data, $row);
}
echo '{"result":"ok","data":'.json_encode($data).'}';