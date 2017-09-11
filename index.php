<!DOCTYPE html>
<html>
<head>
	<title>GPS tracking system</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<section id="full_main">
	<div class="container">
		<div id="login-box">
		<img src="img/logo_1.png">
			<div class="form">
				<form action="check_auth.php" method="post">
					<div class="form-group">
						<label>Username :</label>
						<input type="text" name="uname" class="form-control" id="uname">
					</div>
					<div class="form-group">
						<label>Password :</label>
						<input type="password" name="upass" class="form-control" id="upass">
					</div>
					<center><input type="submit" value="Login" class="btn btn-primary" id="sbm"></center>
				</form>
				<div id="error_mssg"></div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#sbm').click(function(e){
		e.preventDefault();
		var uname = $('#uname').val();
		var upass = $('#upass').val();
		var dataString = 'uname='+uname+'&upass='+upass;
		if($.trim(uname).length>0 && $.trim(upass).length>0)
		{
			$.ajax({
				type: "POST",
				url: "utilities/auth_user.php",
				data: dataString,
				cache: false,
				beforeSend: function(){ 
					$("#error_mssg").html('<span style="color:green;tex-align:center;">Connecting....</span>');
				},
				success: function(data){
					if(data=="ok")
					{
						//$("body").load("home.php").hide().fadeIn(1500).delay(6000);
					//or
					window.location.href = "home.php";
					}else{

						$("#error_mssg").html('<span style="color:red;tex-align:center;">Invalid login credentials !</span>');

					}
				}
			});
		}
	});
});
</script>
</body>
</html>