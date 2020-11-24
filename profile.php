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

    <title>MBMDiscuss-profile</title>
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
   
    $name=$_POST['name'];
    $name=str_replace("<","&lt;","$name");
    $name=str_replace(">","&gt;","$name");
    $name=str_replace('"',"&quot;","$name");
    $name=str_replace("'","&apos;","$name");
    $email=$_POST['email'];
    $email=str_replace("<","&lt;","$email");
    $email=str_replace(">","&gt;","$email");
    $email=str_replace('"',"&quot;","$email");
    $email=str_replace("'","&apos;","$email");
    $contact=$_POST['contact'];
    $contact=str_replace("<","&lt;","$contact");
    $contact=str_replace(">","&gt;","$contact");
    $contact=str_replace('"',"&quot;","$contact");
    $contact=str_replace("'","&apos;","$contact");    
    $user_name=$_SESSION['useremail'];
   

    //cheak whether this email exists
    $existsql="select * from `profiles` where user_name='$user_name'";
    $result=mysqli_query($conn,$existsql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
        $showError="Profile has already updated";
        
    }
    else{
     
       $sql="INSERT INTO `profiles` (`user_name`,`name`, `email`,`contact`,`dt`) VALUES ('$user_name','$name', '$email','$contact', current_timestamp())";
       $result=mysqli_query($conn,$sql);
       if($result==true){
           $showAlert=true;
        //    echo $showAlert;   
        }
    
      }


    }



      //it will run when our profile is successfully updated
      if($showAlert==true){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success!</strong>Your Profile successfully updated.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
         </div>';
      
      }
    
      if($showError==true){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error</strong> '.$showError.' .
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
         </div>';
      
      }
    ?>



    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-4 col-md-4 border my-2">
                <h3 class="text-center my-2">Create Profile</h3>
                <hr>
               <form  action="/collage_forum/profile.php" method="post" >
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" aria-describedby="Help" name="name"
                            placeholder="Enter Your Name" required>

                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" aria-describedby="Help" name="email"
                            placeholder="Email address"  required>

                    </div>
                    <div class="form-group ">
                        <label for="contact">Contact Number:</label>
                        <input type="tel"  minlength="10" class="form-control" id="contact" name="contact" placeholder="(Ex-9785757583)"  required>

                    </div>
                   
                    <button type="submit" class="btn btn-info btn-block my-2">Save</button>

                   </form>
                  
            </div>

            <div class="col-lg-4 col-md-4 ">


            </div>
            <div class="col-lg-4 col-md-4 m-auto border">
              <h3>If you have already saved your profile</h3>
                <a href="setting.php"><button type="submit" class="btn btn-info btn-block my-2"><i
                            class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back</button></a>
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