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
            <p id="im_351608082123956">Tracker(IMEI:351608082123956)</a></b></p>
            <br/>
            <p id="im_351608082123957">Tracker(IMEI:351608082123957)</a></b></p>
            <br/>
            <img src="img/logo_1.png" class="img-responsive" />

            <p>&copy; <a href="#">Al Rumaithy Est.</a></p>
        </div>
        <div class="map-section">
            <div id="map">

            </div>
        </div>
    </div>
    <div id="footer">
    <audio id="myAudio" src="audio/alarm.mp3">
</audio>

    </div>
</section>


<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_GSG5r-2cqByyTmsBVD8H1Y9KQ1rXiXU&callback=initMap" async defer></script>
<script>
$(document).ready(function(){
	removeMarkers();
	function getAllMarkers() {
	   $.ajax({
        type: "GET",
        url: "utilities/all_tracking.php",
        success: function(data) {       			
        			update_map(data);
        		}
        	
    }); 
	}
	all_interval=setInterval(getAllMarkers, 10000);
});
</script>
</body>
</html>
<?php }else{
    header( "Location:index.php" );
}