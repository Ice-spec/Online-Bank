<?php
session_start();
include('assets/conn.php');

/*if($conn){
	echo "Am connected";
}else{
	echo "Oh no";
}*/

if(isset($_POST['sign_up'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //selecting email from database
    $select_email = "SELECT `email` FROM `user` WHERE `email` = '$email' && `status` = 1";
    $run = mysqli_query($conn, $select_email);

    if(mysqli_num_rows($run) == 1){
        echo '<script language="javascript">';
            echo 'alert("Email already exist");';
            echo 'window.location="register-1.html";';
		echo '</script>';
    }else{
        $insert = "INSERT INTO `user`(`id`, `first`, `last`, `email`, `password`, `status`) VALUES ('','','','$email','$password','0')";
        $run2 = mysqli_query($conn, $insert);

        if($run2){
            $email_save = $_SESSION['save_email'] = $email;
        
            header('location:register-2.php');
        }else{
            echo '<script language="javascript">';
                echo 'alert("Error registering user");';
                echo 'window.location="register-1.html";';
		    echo '</script>';
        }
        
    }
}else{
    
}

?>