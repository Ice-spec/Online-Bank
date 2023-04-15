<?php
session_start();

$email_save = $_SESSION['save_email'];


if(!isset($_SESSION['save_email'])) { // if the form not yet submitted
   header("Location: register-1.html");
   exit; 
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Equinox Bank - Registration 2</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- External Css -->
    
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Custom Css --> 
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/theme-1.css">

    <!-- Fonts -->
    <link href="../../../../css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="../dashboard/img/favicon.png">
    <link rel="icon" href="../dashboard/img/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="72x72" href="../dashboard/img/favicon.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../dashboard/img/favicon.png">


  </head>
  <body>
    

    <div class="ugf-block ugf-bg ugf-bg-1">
      <div class="ugf-logo">
        <a href="index.html">
          <img src="../dashboard/img/favicon.png" class="img-fluid" alt="Equinox Bank"><span style="color:#3A3A63; font-weight:bolder; font-size:20px">Equinox bank</span>
        </a>
      </div>
      <div class="form-block">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <div class="ugf-form-block-header">
                <h1>Personal Information</h1>
                <p>Let's get to know you more <br> Enter personal information</p>
              </div>
              
              <div class="ugf-input-block">
                <form action="register2_engine.php" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control" id="inputText" name="first" placeholder="First name">
                    <label for="input-text"><i class=""></i></label>
                  </div>
                  <div class="form-group pass-block">
                    <input type="text" class="form-control" name="last" id="inputPass" placeholder="Last name">
                    <label for="input-pass"><i class="las la-unlock"></i></label>
                    <div class="pass-toggler-btn">
                      <i id="eye" class="lar la-eye"></i>
                      <i id="eye-slash" class="lar la-eye-slash"></i>
                    </div>
                    <div class="error-block">
                      <div class="icon incomplete-pass">
                        <i class="las la-exclamation-circle"></i>
                      </div>
                      <div class="validation-requirement">
                        <ul>
                          <li class="incomplete-item">At least 8 characters</li>
                          <li>At least one letter</li>
                          <li>At least one number</li>
                          <li>At least one special character</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    
                  </div>
                  <button type="submit" class="btn" name="sign_up">Continue</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="js/custom.js"></script>
  </body>
</html>
