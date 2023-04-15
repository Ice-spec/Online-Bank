<?php
   session_start();
if(empty($_SESSION)) // if the session not yet started 



if(!isset($_SESSION['username'])) { //if not yet logged in
   header("Location: ../index.php");// send to login page
   exit;
}
include('assets/classes/connect.php');
//define the limit
    $number_of_rows = 25;
    
    //making the number set
    $page = isset($_GET['page']) ? $_GET['page']: 1;
    $start = ($page - 1) * $number_of_rows;
    
    //find the number of rows stored in database
    $result1 = "SELECT * FROM create_acct WHERE `action` = '' LIMIT $start, $number_of_rows";
    $result = mysqli_query($conn, $result1);
    $number_of_results = mysqli_num_rows($result);
    
    //
    $result2 = "SELECT count(id) AS id FROM create_acct";
    $result3 = mysqli_query($conn, $result2);
    
    //dividing it into pages
    $count = $result3->fetch_all(MYSQLI_ASSOC);
    $total = $count[0]['id'];
    $pages = ceil($total / $number_of_rows);



?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Smartpurse - The Smart accounting software</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" type="image/png" sizes="16x16" href="assets/images/smrtpurselogo3.png">

    <link rel="manifest" href="site.html">
    <link rel="apple-touch-icon" href="icon.html">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/preloader.css">

    
</head>

<body onload="myfunction()">

    <div id="preloader">
       
    </div>


    <?php include('header.php') ?>


    <?php include('sidebar.php'); ?>


    
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-title">Forms</h2>
                </div>
            </div>
        </div>
    
        <div class="forms-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="accordion table-data">
                            <div class="card rounded-0">
                                <div class="card-header">
                                    <h4 class="mb-0" data-toggle="collapse" data-target="#basic-form" aria-expanded="true" aria-controls="basic-form">
                                       View all Accounts
                                        
                                    </h4>
                                </div><br>
                                <!--Search bar-->
                                
                                <div id="basic-form" class="collapse show">
                                    <div class="card-body">
                                            <?php
                                                if(isset($_POST['submit'])){
                                                    $search = $_POST['search'];
                                                    $query = $_POST['query'];

                                                    if($query == 'Acct number'){
                                                        
                                                        $select = "SELECT * FROM create_acct WHERE `action` = '' && acct_number = '$search'";
                                                        $run = mysqli_query($conn, $select);
                                                        ?>
                                                                <table class="table m-b-0">
                                                                    <thead>
                                                                        
                                                                        <tr>
                                                                            <th scope="col">Name</th>
                                                                            <th scope="col">Contact</th>
                                                                            <th scope="col">Account Num</th>
                                                                            <th scope="col">Account Type</th>
                                                                            <th scope="col"></th>
                                                                            <th scope="col"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    

                                                                        <?php  
                                                                            
                                                                            while ($call = mysqli_fetch_assoc($run)) {
                                                                                echo "<tr>";
                                                                                echo "<td>".$call['fname']." ".$call['mname']." ".$call['lname']. "</td>";
                                                                                echo "<td>".$call['num1']." ".$call['num2']."</td>";
                                                                                echo "<td>".$call['acct_number']."</td>";
                                                                                echo "<td>".$call['acct_type']."</td>";
                                                                                ?>
                                                                                    <td><?php echo "<a href='waiting2.php?edit=$call[id]'"; ?><button class="btn btn-success" style="height: 40px; width:120px">View Details</button></a></td>

                                                                                    <td><?php echo "<a href='del_acct.php?edit=$call[id]'"; ?><button class="btn btn-success" style="height: 40px; width:120px">Close Acct</button></a></td>
                                                                                <?php
                                                                            }
                                                                            echo "</tr>";
                                                                        ?>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                        <?php

                                                    }elseif($query == 'Branch'){
                                                         $number_of_rows = 200;
    
                                                        //making the number set
                                                        $page = isset($_GET['page']) ? $_GET['page']: 1;
                                                        $start = ($page - 1) * $number_of_rows;
                                                        
                                                        //find the number of rows stored in database
                                                        $result1 = "SELECT * FROM create_acct WHERE `action` = '' && branch = '$search' LIMIT $start, $number_of_rows";
                                                        $result = mysqli_query($conn, $result1);
                                                        $number_of_results = mysqli_num_rows($result);
                                                        
                                                        //
                                                        $result2 = "SELECT count(id) AS id FROM create_acct";
                                                        $result3 = mysqli_query($conn, $result2);
                                                        
                                                        //dividing it into pages
                                                        $count = $result3->fetch_all(MYSQLI_ASSOC);
                                                        $total = $count[0]['id'];
                                                        $pages = ceil($total / $number_of_rows);
                                                       
                                                        ?>
                                                            <table class="table m-b-0">
                                                                    <thead>
                                                                        
                                                                        <tr>
                                                                            <th scope="col">Name</th>
                                                                            <th scope="col">Contact</th>
                                                                            <th scope="col">Account Num</th>
                                                                            <th scope="col">Account Type</th>
                                                                            <th scope="col"></th>
                                                                            <th scope="col"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    

                                                                        <?php  
                                                                            
                                                                            while ($call = mysqli_fetch_assoc($result)) {
                                                                                echo "<tr>";
                                                                                echo "<td>".$call['fname']." ".$call['mname']." ".$call['lname']. "</td>";
                                                                                echo "<td>".$call['num1']." ".$call['num2']."</td>";
                                                                                echo "<td>".$call['acct_number']."</td>";
                                                                                echo "<td>".$call['acct_type']."</td>";
                                                                                ?>
                                                                                    <td><?php echo "<a href='waiting2.php?edit=$call[id]'"; ?><button class="btn btn-success" style="height: 40px; width:120px">View Details</button></a></td>

                                                                                    <td><?php echo "<a href='del_acct.php?edit=$call[id]'"; ?><button class="btn btn-success" style="height: 40px; width:120px">Close Acct</button></a></td>
                                                                                <?php
                                                                            }
                                                                            echo "</tr>";
                                                                        ?>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                                <ul class="call">
            
                                            <?php
                                            
                                            echo '<style>';
                                                echo '.call{list-style:none; margin:10px; padding:0px}';
                                                echo '.call li{display:inline-block; margin-right:2px; text-align:center; background-color:#394351; height:40px; padding-top:10px; box-sizing:border-box; padding-right:5px}';
                                                echo 'a{text-decoration:none;color:white; padding-left:10px}';
                                                echo '.call li:hover{color:black; background-color:#394351}';
                                                
                                                
                                                
                                            echo '</style>';
                                            
                                            echo '<ul>';
                                                echo '<li>';
                                                    for($i =1; $i<=$pages; $i++){
                                                        
                                                        echo '<a href="view_acct_query.php?page=' . $i . '">' . $i . '</a>';
                                                        

                                                    }
                                                echo '</li>';
                                            
                                            echo '</ul>';
                                            ?>
            
            
            
        
                                     </ul>
                                                        <?php


                                                    }elseif($query = 'Acct type'){
                                                        $number_of_rows = 25;
    
                                                        //making the number set
                                                        $page = isset($_GET['page']) ? $_GET['page']: 1;
                                                        $start = ($page - 1) * $number_of_rows;
                                                        
                                                        //find the number of rows stored in database
                                                        $result1 = "SELECT * FROM create_acct WHERE `action` = '' && acct_type = '$search' LIMIT $start, $number_of_rows";
                                                        $result = mysqli_query($conn, $result1);
                                                        $number_of_results = mysqli_num_rows($result);
                                                        
                                                        //
                                                        $result2 = "SELECT count(id) AS id FROM create_acct";
                                                        $result3 = mysqli_query($conn, $result2);
                                                        
                                                        //dividing it into pages
                                                        $count = $result3->fetch_all(MYSQLI_ASSOC);
                                                        $total = $count[0]['id'];
                                                        $pages = ceil($total / $number_of_rows);

                                                        
                                                        ?>
                                                            <table class="table m-b-0">
                                                                    <thead>
                                                                        
                                                                        <tr>
                                                                            <th scope="col">Name</th>
                                                                            <th scope="col">Contact</th>
                                                                            <th scope="col">Account Num</th>
                                                                            <th scope="col">Account Type</th>
                                                                            <th scope="col"></th>
                                                                            <th scope="col"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    

                                                                        <?php  
                                                                            
                                                                            while ($call = mysqli_fetch_assoc($result)) {
                                                                                echo "<tr>";
                                                                                echo "<td>".$call['fname']." ".$call['mname']." ".$call['lname']. "</td>";
                                                                                echo "<td>".$call['num1']." ".$call['num2']."</td>";
                                                                                echo "<td>".$call['acct_number']."</td>";
                                                                                echo "<td>".$call['acct_type']."</td>";
                                                                                ?>
                                                                                    <td><?php echo "<a href='waiting2.php?edit=$call[id]'"; ?><button class="btn btn-success" style="height: 40px; width:120px">View Details</button></a></td>

                                                                                    <td><?php echo "<a href='del_acct.php?edit=$call[id]'"; ?><button class="btn btn-success" style="height: 40px; width:120px">Close Acct</button></a></td>
                                                                                <?php
                                                                            }
                                                                            echo "</tr>";
                                                                        ?>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                                <ul class="call">
            
                                            <?php
                                            
                                            echo '<style>';
                                                echo '.call{list-style:none; margin:10px; padding:0px}';
                                                echo '.call li{display:inline-block; margin-right:2px; text-align:center; background-color:#394351; height:40px; padding-top:10px; box-sizing:border-box; padding-right:5px}';
                                                echo 'a{text-decoration:none;color:white; padding-left:10px}';
                                                echo '.call li:hover{color:black; background-color:#394351}';
                                                
                                                
                                                
                                            echo '</style>';
                                            
                                            echo '<ul>';
                                                echo '<li>';
                                                    for($i =1; $i<=$pages; $i++){
                                                        
                                                        echo '<a href="view_acct_query.php?page=' . $i . '">' . $i . '</a>';
                                                        

                                                    }
                                                echo '</li>';
                                            
                                            echo '</ul>';
                                            ?>
            
            
            
        
                                     </ul>
                                                        <?php
                                                        
                                                    }
                                                    
                                                }
                                                
                                            ?>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">Powered by KCT technological services.</p>
                </div>
            </div>
        </div>
    </div>





    <!-- Modernizr-3 -->
    <!-- jQuery -->
    <script src="../assets/plugins/common/common.min.js"></script>


    <!-- custom scripts -->
    <script src="js/scripts.js"></script>


</body>



</html>