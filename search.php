

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Welcome to iDiscuss-coding forums</title>
    <style>
    .maincontainer{
        min-height: 80vh;
    }
    </style>
</head>

<body>
    <?php include 'partial/db_connect.php'; ?>
    <?php include 'partial/_header.php'; 
    ?>




   <!-- search results -->
   <div class="maincontainer container my-4">
  
     <h1>Search Results For "<?php echo $_GET['search']; ?>"</h1>
     <?php
      $noResults=true;
     $query=$_GET["search"];
      $sql="SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('$query')";  
      $result=mysqli_query($conn, $sql);
      
      while($row=mysqli_fetch_assoc($result)){
       $title=$row['thread_title'];
       $desc=$row['thread_desc'];
       $thread_id=$row['thread_id'];
       $url="thread.php?threadid=".$thread_id;
       //Display the search result
       echo ' <div class="result p-4">
       <h3><a class="text-dark" href="'.$url.'">'.$title.'</a></h3>
       <p>'.$desc.'</p>
       </div>';
       $noResults=false;
      }
      if($noResults){
          echo '<div class="container">
            <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <p class="display-4">No results found</p>
            <p class="lead"><b>Suggestions:<ul>

            <li>Make sure that all words are spelled correctly.</li>
           <li> Try different keywords.</li>
            <li>Try more general keywords.</li>
            <li>Try fewer keywords.</li> </ul></b></p>
          </div>
        </div>  
      </div>';
      }
      ?>

    
   
   </div>

   
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