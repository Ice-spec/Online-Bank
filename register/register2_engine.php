<?php
include('assets/conn.php');
session_start();

$email_save = $_SESSION['save_email'];


/*if($conn){
	echo "Am connected";
}else{
	echo "Oh no";
}*/

if(isset($_POST['sign_up'])){
    $first = $_POST['first'];
    $last = $_POST['last'];
    
    //updating database
    $update = "UPDATE `user` SET `first`= '$first', `last`= '$last' WHERE email = '$email_save'";
    $run = mysqli_query($conn, $update);

    if($run){
        $first_save = $_SESSION['save_first'] = $first;
        header("location: register-3.php");
    }else{
        echo '<script language="javascript">';
            echo 'alert("Error updating user data");';
            echo 'window.location="register-2.php";';
		echo '</script>';
    }

    
}else{
    
}

?>