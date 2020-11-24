<?php


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="partial/style.css">

    <title>MBMDiscuss-settings</title>
</head>

<body>
    <!-- This is our navbar -->

    <?php include 'partial/_header.php'; ?>
    <?php

include 'partial/db_connect.php'; 
//start the session
// session_start();
//there are some variables which we using for alert message taking from bootstrap and using in php, I'm not using javascript alert because in this training program i have leared html,css,bootsrap,sql and php frequently.
$showAlert=false;
$showError=false;
//cheaking our request method is post or not
if($_SERVER["REQUEST_METHOD"]=="POST"){

// connecting to the database
include 'partial/db_connect.php';
$oldpassword=$_POST["oldpassword"];
$newpassword=$_POST["newpassword"];
$cpassword=$_POST["cpassword"];
$email=$_SESSION['useremail'];
$sql="Select * from `users` where `user_email`='$email' ";
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);

if($num==1){
    while($row=mysqli_fetch_assoc($result)){

    if(password_verify($oldpassword,$row['user_pass'])){
    $login=true;
    if(($newpassword==$cpassword)){
        $hash=password_hash($newpassword, PASSWORD_DEFAULT);
        //This is our update password query
        $updatesql="UPDATE `users` SET `user_pass`='$hash'";
        $update_result=mysqli_query($conn, $updatesql);
        // header("location: index.php");
            if($update_result){
                    $showAlert=true;
            }
          }
          else{
              $showError="Password not matching";
          }
         }
       else{
        $showError="Incorrect old password";
       }
      }
    }
else{

    $showError="Invalid credentials";
    
  }
 }



      //it will run when our password is successfully updated
      if($showAlert==true){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success!</strong>Your Password successfully updated.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
         </div>';
      
      }
      //it will run when our password matching or old password is incorrect.
      if($showError==true){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error</strong> '.$showError.', Try again.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
         </div>';
      
      }
    ?>


    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="card" >
                    <img class="card-img-top" src="avtar.jpg" alt="Card image">
                    <div class="card-body text-center">
                        <h4 class="card-title"><?php echo $_SESSION['useremail'];  ?></h4>
                       <?php 
                       $user_name=$_SESSION['useremail'];
                       $query="SELECT * FROM `profiles` WHERE `user_name`='$user_name'";
                       $res=mysqli_query($conn,$query);
                       $row=mysqli_fetch_array($res,MYSQLI_BOTH);
                       $name=$row['name'];
                       $email=$row['email'];
                       $contact=$row['contact'];
                        echo '<p class="card-text">Name- '.$name.'. </p><p class="card-text">Email- '.$email.'. </p>
                        <a href="profile.php"><button type="submit" class="btn btn-info btn-block my-2"><i
                        class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Update your profile</button></a>';

                        ?>
                    </div>
                </div>



            </div>
            <div class="col-lg-4 col-md-4  m-auto">
            
            </div>
            <div class="col-lg-4 col-md-4 border m-auto">
                <h3 class="text-center my-2">Change Password</h3>
                <hr>
                <form action="/collage_forum/setting.php" method="post">
                    <div class="form-group">
                        <label for="oldpassword">Old password:</label>
                        <input type="password" class="form-control" id="oldpassword" aria-describedby="passwordHelp"
                            name="oldpassword" placeholder="Old Password" required>

                    </div>
                    <div class="form-group ">
                        <label for="newpassword">New Password:</label>
                        <input type="password" minlength="6" maxlength="23" class="form-control" id="newpassword"
                            name="newpassword" placeholder="New Password" required>

                    </div>
                    <div class="form-group ">
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" minlength="6" maxlength="23" class="form-control" id="cpassword"
                            name="cpassword" placeholder="Retype New Password" required>

                    </div>


                    <button type="submit" class="btn btn-info btn-block my-2">Submit</button>

            </div>

        </div>

    </div>
    <br><br><br><br><br>
    <?php include 'partial/footer.php';  ?>
    <!-- This is our footer -->
    <?php include 'partial/_footer.php';   ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>