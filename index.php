<?php
if(empty($_SESSION)) // if the session not yet started 

   session_start();




if(isset($_SESSION['save_user'])) { // if already login
   header("location: dashboard/index.php"); // send to home page
   exit;  
}


?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Equinox Bank - Banking at your finger tips</title>
    <link rel="icon" href="dashboard/img/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/png" href="images/favicon.html">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/icons.css">
	<link rel="stylesheet" href="css/ui.css">
</head>
<body class="crypt-dark">
	
	<!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="cryptorio-forms cryptorio-forms-dark text-center pt-5 pb-5">
                   
                    <h3 class="p-4">Welcome To Equinox Bank</h3>
                    <div class="cryptorio-main-form">
                        <div class="logo">
                            <img src="dashboard/img/favicon.png"  alt="logo-image"><span style="color:white; font-weight:bolder; font-size:20px">Equinox bank</span>
                        </div>
                        <form action="engine.php" class="text-left" method="post">
                            <label for="email">Username</label>
                            <input type="text" id="email" name="username" placeholder="Username" required="">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Please Input Your Password"  required="">

                            <input type="submit" value="Log In" name="login" class="crypt-button-red-full">
                        </form>
                        <p class="float-left"><a href="register/register-1.html">Register</a></p>
                        <p class="float-right"><a href="forgot.php">Forgot Password</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
	
	
	<footer>
		
	</footer>
    <script src="../../../../s3.tradingview.com/tv.js"></script>
    <script src="js/bundle.js"></script>
</body>


</html>