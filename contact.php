<?php
  //there are some variables which we using for alert message taking from bootstrap and using in php, I'm not using javascript alert because in this training program i have leared html,css,bootsrap,sql and php frequently.

$showAlert=false;
$showError=false;

// Cheaking the condition of post request
if($_SERVER["REQUEST_METHOD"]=="POST"){
//connect to database
include 'partial/db_connect.php';

//fetching post variables
$email=$_POST["email"];
$query=$_POST["query"];
$problem=$_POST["problem"];
$desc=$_POST["desc"];
$problem=str_replace("<","&lt;","$problem");
$problem=str_replace(">","&gt;","$problem");
$problem=str_replace('"',"&quot;","$problem");
$problem=str_replace("'","&apos;","$problem");
$desc=str_replace("<","&lt;","$desc");
$desc=str_replace(">","&gt;","$desc");
$desc=str_replace('"',"&quot;","$desc");
$desc=str_replace("'","&apos;","$desc");
      $sql="INSERT INTO `contacts` ( `email`, `query`, `problem`, `desc`,`dt`) VALUES ('$email', '$query', '$problem', '$desc',current_timestamp())";
      $result=mysqli_query($conn, $sql);
      if($result){
          $showAlert=true;
      }
    }

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
    <title>Welcome to iDiscuss-coding forums</title>
</head>

<body>
    <?php include 'partial/_header.php'; ?>
    <?php
      //if your record successfully inserted in users table
      if($showAlert==true){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success</strong> We will solve yorur query and reply soon.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
         </div>';
      
      }
      if($showError==true){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error</strong> '.$showError.'.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
         </div>';
      
      }
    ?>
    <div class="container my-4">
        <h2>Contact us</h2>
        <form action="/collage_forum/contact.php" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                    Required>
            </div>
            <div class="form-group">
                <label for="query">Select your Query</label>
                <select class="form-control" id="query" name="query">
                  <?php  $sql="SELECT category_name,category_id FROM `categories`";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                    echo '<option class="dropdown-item">'.$row['category_name'].'</option>';
                    }
                    ?>

            </select>
    </div>

    <div class="form-group">
        <label for="problem">Elaborate your Concern</label>
        <textarea class="form-control" id="problem" rows="3" name="problem" Required></textarea>
    </div>


    <div class="form-group">
        <label for="desc">Tell us about yourself</label>
        <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
    </div>
    <button class="btn btn-success">Submit</button>
    </form>

    </div>
    <hr>
    <?php include 'partial/footer.php';  ?>
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