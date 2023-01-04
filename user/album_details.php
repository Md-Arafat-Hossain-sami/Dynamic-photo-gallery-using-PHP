<?php
session_start();
include('../connection/connect.php');
// echo "Hello";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Details</title>
    <!--Bootstrap Link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- Css Link -->
<link rel="stylesheet" href="album_details.css">
</head>
<body>
  <!-- 1st part navbar -->
  <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
  <img src="../photos/logo.png" alt="" class="phlogo"/>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Favourite</a>
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
<!-- // <option value='$album_id'>$album_title</option> -->
            
  <form class="form-inline my-2 my-lg-0 d-flex mx-3">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>

<!-- Body Part small nav -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info ">
<ul class ="navbar-nav me-auto">
<li class="nav-item">
          <a class="nav-link text-dark" href="#">Welcome <?php echo $_SESSION['USER_NAME'] ;?></a>
        </li>
        <li class="nav-item">
        </li>
</ul>
<div class="d-flex -3">
<?php
  if(!isset($_SESSION['USER_ID'])){
  echo "<a href='./registration.php' class='btn btn-primary mx-3'>User Registration/Login</a>";
    
    die();
  }else{
    echo "
    <div class='d-flex'>
    <a href='#' class='btn btn-primary mx-3'>Profile </a>
    <a href='../admin/logout.php' class='btn btn-primary mx-3'>Logout</a>";
    
  };
  ?>
    </div>
    
  </nav>

<div class="row">
   <div class="col-md-12">
  <!-- Product -->

  <div class="row">

<!-- photo card item -->

<!-- fatching product  -->
<?php
  if(isset($_GET['albums_id'])){
    $albumd_id=$_GET['albums_id'];
  
$select_query="select * from `photos` where album_id=$albumd_id";
$result_query=mysqli_query($conn,$select_query);
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];

while($row=mysqli_fetch_assoc($result_query)){
$picture_id=$row['photo_id'];
$picture_title=$row['photo_title'];
$picture_description=$row['photo_descriptions'];
$albumed_id=$row['album_id'];
$picture_image1=$row['image1'];
// $product_image2=$row['image2'];
// $product_image3=$row['image3'];
echo "<div class='col-md-3 card m-3' style='width: 21rem;'>
<img class='card-img-top' src='../admin/uploaded_photo/$picture_image1' alt='Card image cap'>
<div class='card-body'>
  <h5 class='card-title'>$picture_title</h5>
  <p class='card-text'>$picture_description</p>
  <div class='d-flex -3'>
  <a href='#' class='btn btn-primary mx-2'>Add to favourite</a>
  <a href='view_details.php?albums_id=$picture_id' class='btn btn-primary'>View Details</a>
  </div>
</div>
</div>";
}

}
?>
 <!-- <div class="col-md-3 card m-3" style="width: 21rem;">
  <img class="card-img-top" src="../photos/pic-1.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <div class="d-flex -3">
    <a href="#" class="btn btn-primary mx-2">Add to favourite</a>
    <a href="#" class="btn btn-primary">View Details</a>
    </div>
  </div>
</div> -->



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