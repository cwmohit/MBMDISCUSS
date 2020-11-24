<style>
.back{
  /* background-color: #641E16; */
}
body{
  /* background-color: #34495E; */
 
}
</style>


<?php
 include 'db_connect.php';
session_start();



echo '<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
<a class="navbar-brand" href="/collage_forum"><img src="mbm1.jpg" class="mx-2" width="40px" height="40px" style="border: 1px solid black; border-radius: 50%;"><b>MBMDiscuss</b></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item ">
      <a class="nav-link" href="/collage_forum"><i class="fa fa-home mr-2" aria-hidden="true"></i><b>Home</b> <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php"><i class="fa fa-info-circle mr-2" aria-hidden="true"></i><b>About</b></a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars mr-2" aria-hidden="true"></i>
    <b>Top Category</b>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
  $sql="SELECT category_name,category_id FROM `categories` LIMIT 3";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result)){
    echo '<a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>';
  }
    echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php"><i class="fa fa-phone-square mr-2" aria-hidden="true"></i><b>Contact</b></a>
    </li>';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
    echo '<li class="nav-item">
      <a class="nav-link" href="setting.php"><i class="fa fa-cog mr-2" aria-hidden="true"></i><b>Setting</b></a>
    </li>';
    }
  echo '</ul>
   <div class="row mx-0">';
   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
   echo '<form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
   <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Your Query" aria-label="Search">
   <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fa  fa-search mr-1" aria-hidden="true"></i>Search</button>
    
     <a href="/collage_forum/partial/logout.php" class="btn btn-outline-success mx-2">Logout</a>
    </form>';
    }
   else{
    echo '<form class="form-inline my-2 my-lg-0" action="search.php" method="GET" >
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Your Query" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fa fa-search mr-1" aria-hidden="true"></i>Search</button>
    </form>
     <button class="btn btn-outline-success ml-2"  data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">SignUp</button>';
   }
    echo '</div> 
</div>
</nav>';

include 'partial/_loginmodal.php';
include 'partial/_signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true" ){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You can now login.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if(isset($_GET['noResult']) && $_GET['noResult']=="true" ){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong> Invalid creadential.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if(isset($_GET['Result']) && $_GET['Result']=="true" ){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You are successfully loggedin.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if(isset($_GET['error']) && $_GET['error']=="true" ){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong> password do not match.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if(isset($_GET['emailused']) && $_GET['emailused']=="true" ){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong> username already taken, try again.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>