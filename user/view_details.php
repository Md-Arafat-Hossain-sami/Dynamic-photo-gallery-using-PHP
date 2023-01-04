<?php
session_start();
include('../connection/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View details</title>
    <!--Bootstrap Link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- Css Link -->
<link rel="stylesheet" href="view_details.css">
</head>
<body>
  <!-- 1st part navbar -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <img src="../photos/logo.png" alt="" class="phlogo"/>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Favourite</a>
      </li>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="top_rated.php">Top Rated Photo <span class="sr-only"></span></a>
        </li>

      <li class="nav-item dropdown">
      <a class="nav-link dropdown- text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ALBUMS
            </a>
            <ul class="dropdown-menu active-hover">

            <?php
  $select_query="SELECT * FROM albums";
  $result_query=mysqli_query($conn,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
      $album_title=$row['album_name'];
      $album_id=$row['album_id'];
      echo  "
  <ul>
      <li><a href='album_details.php?albums_id=$album_id' class='dropdown-item value'=$album_id >$album_title</a></li>
    </ul>

  ";
  }
  ?>
  </div>
  <form class="form-inline my-2 my-lg-0 d-flex mx-3">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>

<!-- Body Part small nav -->
<!-- favourite work -->
<?php
$count=0;
if(isset($_SESSION['cart'])){
  $count=count($_SESSION['cart']);
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-info ">
    <ul class ="navbar-nav me-auto">
    <li class="nav-item">
    <a class="nav-link text-dark" href="#">Welcome <?php
    if(isset($_SESSION['USER_ID'])){
      
   echo $_SESSION['USER_NAME'] ;  }
   else{
    echo ('');
   }?></a>
            </li>
            <li class="nav-item">
            </li>
  <li class="nav-item btn btn-outline-success btn-sm  ">
          <a class="nav-link text-dark" href="./my_favourite.php">My Favourite (<?php echo $count;  ?>) </a>
        </li>
    </ul>
  <div class="d-flex -3">
    <?php
  if(!isset($_SESSION['USER_ID'])){
  echo "<a href='./login.php' class='btn btn-primary mx-3'>User Registration/Login</a>";
    
    // die();
  }else{
    echo "
    <div class='d-flex'>
    <a href='#' class='btn btn-primary mx-3'>Profile </a>
    <a href='../admin/logout.php' class='btn btn-primary mx-3'>Logout</a>";
    
  };
  ?></div>

      
    </nav>
<!-- end of header  -->



<div class="row">
   <div class="col-md-12">

  <div class="row">

  <?php

  if(isset($_GET['photos_id'])){
    $photos_id=$_GET['photos_id'];
  
$select_query="select * from `photos` where photo_id=$photos_id";
$result_query=mysqli_query($conn,$select_query);

while($row=mysqli_fetch_assoc($result_query)){
$picture_id=$row['photo_id'];
$picture_title=$row['photo_title'];
$picture_description=$row['photo_descriptions'];
$pictures_id=$row['album_id'];
$picture_image1=$row['image1'];
$picture_image2=$row['image2'];
$picture_image3=$row['image3'];
echo "<div class='col-md-6 card mb-4 my-4' style='width: 100rem;'>
<img class='card-img-top' src='../admin/uploaded_photo/$picture_image1' alt='Card image cap'>
<div class='card-body'>
</div>
</div>
</div>

<div class='row'>
 <div class='col-md-12'>
<div class='row'>
<div class='col-md-6 card m-3' style='width: 43rem;'>
<img class='card-img-top' src='../admin/uploaded_photo/$picture_image2' alt='Card image cap'>
<div class='card-body'>
  <h5 class='card-title'></h5>
  <p class='card-text'></p>
  <div class='d-flex -3'>

  </div>
</div>
</div>
";

}
};
?>
<div class="col-md-6 card m-3" style="width: 43rem;">
<form class="" action="./index.php" method="post">
                <h1 class="text-center">Details</h1>
                <p class="description text-center">Login first to get better feelings of preview Photo</p>
                <!-- Input fields -->
                <div class="form-group">
<p>EXIF stands for Exchangeable Image File Format. It's a standard for storing supplemental metadata in digital photos. Each time you take a picture, your phone or camera saves a file (typically a JPEG) to your device's storage. This file contains all the data dedicated to the actual picture (pixels which you can see). Besides that, it also includes a notable amount of supplemental metadata. Such metadata can hold date, time, camera settings, copyright information.

Sounds pretty routinely, right? Let's go to the interesting part. EXIF data can also contain sensitive information, such as geolocation. All smartphones record GPS coordinates when you take a picture. So if you upload a photo with metadata to social media or send it in messenger, others can collect many details from it.

It's not a big deal in most cases. But sometimes, you better remove the EXIF metadata before sharing your photos.</p>
                </div>
                <div class="form-group">
             
                </div>

               
            </form>
 
  </div>
</div>
</div>
</div>
<div class="d-flex m-3 align-items-center">
    <a href="#" class="btn btn-primary mx-2">Add to favourite</a>
    <a href="#" class="btn btn-primary">More Photos</a>
    </div>

    <div class="dropdown m-right mb-4 p-4">
  <button class="btn btn-secondary dropdown-toggle btn-lg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sorted By
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Ratings</a>
    <a class="dropdown-item" href="#">Ascending</a>
    <a class="dropdown-item" href="#">Date</a>
  </div>
</div>
<!-- review submit code -->

<?php


if(isset($_GET['photos_id'])){
  $photos_id=$_GET['photos_id'];

if(isset($_POST['review_submit'])){
  $name= $_POST['input_review'];
  $rate= $_POST['ratings'];
  $username=$_SESSION['USER_NAME'];

  if(!isset($_SESSION['USER_ID'])){
    echo "<script>window.location.href='login.php'</script>";
  }else{

          // $insert_query="INSERT INTO photos WHERE photo_id=$photos_id"."(rating,review,user_given_name)"."VALUES"."('$rate','$name','".$_SESSION['USER_NAME']."')";
          $insert_query="update `photos` set rating =$rate, review='$name',user_given_name='".$_SESSION['USER_NAME']."' where photo_id=$photos_id";
          $result_query= mysqli_query($conn, $insert_query);
          echo"<script>alert('Review Submitted')</script>";
}
}
};

?>
<label class="m-3" for="inlineFormCustomSelectPref"><h3>Submit Review/Rating</h3></label><br/>
<form class="form-inline" action="" method="post">
<div class="input-group m-3">
  <div class="input-group-prepend w-10">
    <label class="input-group-text" for="inputGroupSelect01">Rate Here</label>
  </div>
  <select name="ratings" class="custom-select" id="">
    <option selected>Choose...</option>
    <option value="5">5</option>
    <option value="4">4</option>
    <option value="3">3</option>
    <option value="2">2</option>
    <option value="1">1</option>
  </select>
</div>

<div class="m-3">
  <input name="input_review" type="text" class="custom-select my-2 mr-sm-2 px-4 py-4 w-50" placeholder="Enter your review here..." id="inlineFormCustomSelectPref">
</input>
<br/>
<div class="form-outline mb-4 w-50 m-auto ">
    <input name="review_submit" type="submit" class=" bg-info border-0 p-2 my-3 rounded"
  value="Submit">
</form>
</div>



<?php

  if(isset($_GET['photos_id'])){
    $photos_id=$_GET['photos_id'];
  
$select_query="select * from `photos` where photo_id=$photos_id";
$result_query=mysqli_query($conn,$select_query);

while($row=mysqli_fetch_assoc($result_query)){
$reviewer_name=$row['user_given_name'];
$review_title=$row['review'];
$review_rating=$row['rating'];

echo "<div class='container mt-5 m-3'>
<div class='row d-flex justify-content-center'>
    <div class='col-md-7'>
        <div class='card p-3'>
            
            <div class='comments-box p-3 mt-3'>
                <div class='d-flex justify-content-between align-items-center'> <span class='text-muted'>$reviewer_name</span> <span class='avater'></span> </div>
                <div class='d-flex justify-content-between align-items-center'>
                    <h5 class='text-muted'>$review_title</h5>
                </div>
                <div> <span>Rate :$review_rating ✡ </span> </div>
            </div>

        </div>
    </div>
</div>
</div>

";}

};
?>




<!-- Footer Part -->
<!-- <div class="bg-info p-3 text-centerb py-3 my-4">
  <p>All rights reserved @- Designed by Md Arafat Hossain</p>
</div> -->
<footer class="text-center text-white m-3" style="background-color: #caced1;">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Images -->
    <section class="">
      <div class="row">
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded "
            data-ripple-color="light"
          >
            <img
              src="../photos/pic-1.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="../photos/pic-2.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="../photos/pic-3.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="../photos/pic-4.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="../photos/pic-5.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="../photos/pic-6.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Images -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">Trenza @Md.Arafat Hossain</a>
  </div>
  <!-- Copyright -->
</footer>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>