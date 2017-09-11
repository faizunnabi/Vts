<?php 
session_start();
if(isset($_SESSION['uname'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Testing the samples</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<section id="header">
    <div class="container-fluid">
        <div class="col-sm-3">
            <div class="logo-space">
                <img src="img/logo.png" height="40" />
            </div>
        </div>
        <div class="col-sm-9">
            <div class="top-menus">
                <a href="#">Reports</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="logout.php">LogOut</a>
            </div>
        </div>
    </div>
</section>
<section id="main-content">
    <div class="container-full fixed">
        <div class="side-bar">
        <br/><br/>
            <p><b>Tracker(IMEI:<?php echo $_GET['imei'];?>)</b></p>
            <button id="live_track" onclick="start_track(<?php echo $_GET['imei'];?>)" class="btn btn-success btn-xs">Start</button>&nbsp;&nbsp;<button id="stop_track" class="btn btn-danger btn-xs">Stop</button>
            <a href="history.php?imei=<?php echo $_GET['imei'];?>" class="btn btn-primary btn-xs">Show History</a><br/><br/>
			<br/>
			<a href="home.php" >Go back</a>
			<br/><br/><br/><br/><br/>
            <img src="img/logo_1.png" class="img-responsive" />
            <p>&copy; <a href="#">abc company</a></p>
        </div>
        <div class="map-section">
            <div id="map">

            </div>
        </div>
    </div>
    <div id="footer">


    </div>
</section>


<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key='api_key'&callback=initMap&libraries=geometry" async defer></script>
</body>
</html>
<?php }else{
    header( "Location:index.php" );
}
