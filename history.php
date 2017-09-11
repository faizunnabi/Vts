<?php 
session_start();
if(isset($_SESSION['uname'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Testing the samples</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/jquery.datetimepicker.css">
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<section id="header">
    <div class="container-fluid">
        <div class="col-sm-3">
            <div class="logo-space">
                <a href="home.php"><img src="img/logo.png" height="40" /></a>
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
            <div>
                
  <div class="form-group">
<label>From Date</label>
    

                    <input type='text' class="form-control" id='st_date' />
                    
                
  </div>
  
  <div class="form-group">
<label>To Date</label>
    
    
                    <input type='text' class="form-control" id='sp_date' />
                    
               
  </div>
  
  <input type="button" value="Go" class="btn btn-default" id="history" />

            </div>
            
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
<script src="js/bootstrap.js"></script>

<script src="js/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key='api_key'&callback=initMap" async defer></script>
<script>
    $(document).ready(function() {
    
		var imei=<?php echo $_GET['imei'];?>;
       $('#st_date').datetimepicker(); 
    
    
       $('#sp_date').datetimepicker(); 
    
    $('#sp_bt').datetimepicker();
    $('#history').click(function(){
        removeMarkers();
        st = $('#st_date').val();
        sp = $('#sp_date').val();
        //var imei = location.search.replace('?', '').split('=')
        var dataString='imei='+imei+'&start='+st+'&stop='+sp;
        $.ajax({
        type: "POST",
        data:dataString,
        url: "utilities/send_data.php",
        success: function(data) {
            var marker;
                var mydata=JSON.parse(data);
               console.log(mydata);
                for(var i=0;i<mydata.data.length;i++){
                    var lati = mydata.data[i].latitude;
                    var longi = (mydata.data[i].longitude);
                    console.log(lati+" "+longi);
                    var contentString = '<div id="content">'+
                    '<b>Tracking coordinates</b>'+
                    '<p><b>Latitude :</b> '+lati+'</p>'+
                    '<p><b>Longitude :</b> '+longi+'</p>'+
                    '<p><b>Time :</b> '+mydata.data[i].e_date+'</p>'+
                    '</div>';

                    var infowindow = new google.maps.InfoWindow({
                      content: contentString
                    });
                    //var status = mydata.data[i].alert_mssg;
                    
                
                       var ic_path = 'img/map_ic.png';
                    
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(lati,longi),
                        map: map,
                        title: 'Track History',
                        icon: ic_path
                    }); 
                    gmarkers.push(marker);
                    google.maps.event.addListener(marker,'click', (function(marker,contentString,infowindow){ 
                        return function() {
                        infowindow.setContent(contentString);
                        infowindow.open(map,marker);
                        };
                        })(marker,contentString,infowindow));  
                    loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
                    bounds.extend(loc);
                    }
                    map.fitBounds(bounds);       // auto-zoom
                    map.panToBounds(bounds);     // auto-center

        }
    });
    });
});
</script>
</body>
</html>
<?php }else{
    header( "Location:index.php" );
}
