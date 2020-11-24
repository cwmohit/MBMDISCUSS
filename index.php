<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <title>Welcome to iDiscuss-coding forums</title>
</head>

<body>
    <?php include 'partial/db_connect.php'; ?>
    <?php include 'partial/_header.php'; ?>

    <!-- slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img6.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
                   echo '<h1>Welcome '.$_SESSION['useremail'].'</h1>';
                }else{
                    echo '<h1>Welcome</h1>';
                } ?>
                    <h1>Mbm engineering collage</h1>

                </div>
            </div>
            <div class="carousel-item">
                <img src="img7.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Welcome</h1>
                    <h1>Mbm engineering collage</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img8.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Welcome</h1>
                    <h1>Mbm engineering collage</h1>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- category container starts here -->
    <div class="container-fluid my-5">
        <h2 class="text-center my-3"><kbd class="text-primary">Browse-categories</kbd></h2>
        <div class="row my-4">
            <!-- fetch all the categories -->
            <?php $sql="SELECT * FROM `categories`";  
      $result=mysqli_query($conn, $sql);
      // use a for loop to iterate through categories 
        
        while($row=mysqli_fetch_assoc($result)){
        //  echo $row['category_id'];
        //  echo $row['category_name'];
        $id=$row['category_id'];
        $cat=$row['category_name'];
        $desc=$row['category_description'];
        
        echo '<div class=" col-md-4 my-2 " >
        <div class="card mx-auto" style="width: 18rem;">
          <div class="inner">
          <img src="card'.$id.'.jpg" class="card-img-top" alt="image for this category">
          </div>
          <div class="card-body">
            <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
            <p class="card-text">'.substr($desc,0,35).'...</p>
            <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
          </div>
         </div>
        </div>';
        }
     ?>



        </div>
    </div>
    <div class="container text-center">

    </div>



    <div class="container-fluid mt-5 p-5 bg-light text-dark bg-light"  style="background-color: #E5E7E9; ">
   
           
        <div class="row">
            <div class="col-lg-6">
            <img src="mbm.jpg" alt="" class="bd-placeholder-img rounded-circle mx-5" width="140" height="140">
                <h2>Mbm engineering collage</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras
                    mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                    condimentum nibh.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-0" >
               
            </div>
            <div class="col-lg-6">
            <img src="india2.jpg" alt="" class="bd-placeholder-img rounded-circle mx-5" width="140" height="140">
                <h2>India</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras
                    mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                    condimentum nibh.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
        </div>
      
    </div>
    <?php include 'partial/footer.php';  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="partial/script.js"></script>
</body>

</html>