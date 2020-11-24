<?php
$showError="false";
$showAlert=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
   $email=$_POST['loginEmail'];    
   $pass=$_POST['login_pass'];
   
   $sql="select * from `users` where `user_email`='$email'";
   $result=mysqli_query($conn,$sql);
   $numRows=mysqli_num_rows($result);
    if($numRows==1){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($pass,$row['user_pass'])){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['sno']=$row['sno'];
        $_SESSION['useremail']=$email;
        // echo "logged in".$email;

        header("Location: /collage_forum/profile.php?Result=true");
        exit;
        }
        header("Location: /collage_forum/index.php?noResult=true");
       
    }
   }
    header("Location: /collage_forum/index.php?noResult=true");

?>