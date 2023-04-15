<?php
include('assets/conn.php');
session_start();

$email_save = $_SESSION['save_email'];
$first_save = $_SESSION['save_first'];


/*if($conn){
	echo "Am connected";
}else{
	echo "Oh no";
}*/

if(isset($_POST['sign_up'])){
    $str = $_POST['str'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    
    
    //updating database
    $update = "UPDATE `user` SET `addr`= '$str', `city`= '$city', `state`= '$state', `country`= '$country', `status`= 1 WHERE email = '$email_save'";
    $run = mysqli_query($conn, $update);

    if($run){
        $rand = rand(100000,999999);
        
        $insert = "INSERT INTO `support_pin`(`id`, `email`, `pin`) VALUES ('', '$email_save', '$rand')";
        $done = mysqli_query($conn, $insert);


        $acct_num_rand = rand(100000000,222222222);
        
        $acct_num = "INSERT INTO `acct`(`id`, `email`, `acct`, `bal`) VALUES ('', '$email_save', '$acct_num_rand', '0')";

        $do = mysqli_query($conn, $acct_num);

        //loans
        $loan = "INSERT INTO `loan`(`id`, `email`, `personal_loan`, `corperate_loan`) VALUES ('', '$save_email', '30000', '50000')";

        $run_loan = mysqli_query($conn, $loan);
        
        echo '<script language="javascript">';
            echo 'alert("Congratulations!!! Account created successfully");';
            echo 'window.location="../index.php";';
		echo '</script>';
    }else{
        echo '<script language="javascript">';
            echo 'alert("Error updating user data");';
            echo 'window.location="register-3.php";';
		echo '</script>';
    }

    
}else{
    
}

?>