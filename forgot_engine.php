<?php
$conn = mysqli_connect('localhost', 'root', '', 'smartpurse');
/*if($conn){
	echo "Am connected";
}else{
	echo "Oh no";
}*/

if(empty($_SESSION)) // if the session not yet started 
   session_start();
   
   
if(!isset($_POST['login'])) { // if the form not yet submitted
   header("Location: forgot.php");
   exit; 
}
//check if the username entered is in the database.
$test_query = "SELECT * FROM admin WHERE username = '".$_POST['username']."'";
$query_result = mysqli_query($conn,$test_query);
//conditions
if(mysqli_num_rows($query_result)==0) {
//if username entered not yet exists
		echo '<script language="javascript">';
				echo 'alert("Incorrect username or password");';
				echo 'window.location="forgot.php";';
				echo '</script>';
	
}else {
//if exists, then extract the password.
    while($row_query = mysqli_fetch_array($query_result)) {
        // check if password are equal
        if($row_query['key']==$_POST['password'] AND $row_query['username']==$_POST['username']){
			$_SESSION['username'] = $_POST['username'];
            
            header("location: dashboard/index.php");
            exit; 
        } else{ // if not
            echo '<script language="javascript">';
			echo 'alert("Incorrect username or password");';
			echo 'window.location="forgot.php";';
			echo '</script>';
			
			
			
        }
    }
}

?>