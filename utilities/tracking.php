<?php
$imei=$_POST["imei"];
$data = array();
$db = new PDO('mysql:host=localhost;dbname=Tracker;charset=utf8mb4', 'root', 'rumaithy');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$stmt = $db->query("SELECT d.status,t.* FROM devices d,new_tracker t where t.imei='$imei' and d.imei=t.imei order by last_updated desc limit 1");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($data, $row);
}
echo '{"result":"ok","data":'.json_encode($data).'}';