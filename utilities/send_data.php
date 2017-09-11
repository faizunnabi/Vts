<?php
	$imei=$_POST['imei'];
	$st = $_POST['start'];
	$sp = $_POST['stop'];
	$data = array();
	$db = new PDO('mysql:host='';dbname='';charset=utf8mb4', '', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$stmt = $db->query("SELECT * FROM new_tracker where imei='$imei' and e_date between TIMESTAMP('$st') and TIMESTAMP('$sp')");
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    	array_push($data, $row);
	}
	echo '{"result":"ok","data":'.json_encode($data).'}';
?>
