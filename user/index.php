  <?php
  session_start();
  // ini_set('display_error', '1');
  include('../connection/connect.php');
  // echo "Hello";
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Photo Gallery</title>
      <!--Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- Css Link -->
  <link rel="stylesheet" href="index.css">
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
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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

    </ul>";
  };
  ?>
 
  </div>
  <div class= "d-flex ">
  
  <!-- // <option value='$album_id'>$album_title</option> -->
              
    <form class="form-inline my-2 my-lg-0 d-flex mx-3" action="search_photo.php" method="get">
        <input name="search_data" class="form-control mr-sm-2" type="search" placeholder="Search photo" aria-label="Search">
        <input type="submit" value="Search" class="btn btn-outline-info text-dark" name="search_photo">
      </form>
      </div>
  </nav>

<!-- My favourite count code  -->
<?php
$count=0;
if(isset($_SESSION['cart'])){
  $count=count($_SESSION['cart']);
}

?>
<!--End of My favourite count code  -->

    <!-- Body Part small nav -->
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

    <!-- carousel part  -->
    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner ">
      <div class="carousel-item active">
        <img class="d-block w-100 " src="../photos/carousal-4.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 " src="../photos/carousel2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 " src="../photos/carousel 5.jpg" alt="Third slide">
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

  <div class="row">
    <div class="col-md-12">
    <!-- Product -->

    <div class="row">

  <!-- photo card item -->

  <!-- fatching photos  -->
  <?php
  $select_query="select * from `photos` order by rand() limit 0,10";
  $result_query=mysqli_query($conn,$select_query);
 
 while($row=mysqli_fetch_assoc($result_query)){
  $picture_id=$row['photo_id'];
  $picture_title=$row['photo_title'];
  $picture_description=$row['photo_descriptions'];
  $pictures_id=$row['album_id'];
  $picture_image1=$row['image1'];
  // $product_image2=$row['image2'];
  // $product_image3=$row['image3'];
  echo"
  <div class='col-md-3 card m-3' style='width: 21rem;'>
  <form action='manage_cart.php' method='POST'>
  <a href='view_details.php?photos_id=$picture_id'>
      <img class='card-img-top' src='../admin/uploaded_photo/$picture_image1' alt='Card image cap' href='view_details.php?photos_id=$picture_id'>
      </a>
  <div class='card-body'>
    <h5 class='card-title'>$picture_title</h5>
    <p class='card-text'>$picture_description</p>
    <div class='d-flex '>
    <button name='add_to_fav' type='submit' class='btn btn-primary mx-2'>Add to favourite</button>
    <input type='hidden' name='photo_title' value='$picture_title'>
     <input type='hidden' name='photo_id' value='$picture_image1'>
    <a href='view_details.php?photos_id=$picture_id' class='btn btn-primary'>View Details</a>
    </div>
  </div>
  </form>
  </div>
  ";

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



  <div class="row">
    <div class="col-md-12">

    <div class="row">

    <?php
  $select_query="select * from `photos` order by rand() limit 0,1";
  $result_query=mysqli_query($conn,$select_query);


  while($row=mysqli_fetch_assoc($result_query)){

  $picture_image1=$row['image1'];
  // $product_image2=$row['image2'];
  // $product_image3=$row['image3'];
  echo "<div class='col-lg col-md-12 mb-4 m-3'>
  <div
    class='bg-image hover-overlay ripple shadow-1-strong rounded '
    data-ripple-color='light'
  >
    <img
      src='../admin/uploaded_photo/$picture_image1'
      class='w-100 cphoto'
    />


  </div>
  </div>
  </div>";

  };
  ?>

  <!-- add to cart  -->
    <!-- <div class="row">
    <div class="col-md-12">
    <div class="row d-flex">

    <form action="manage_cart.php" method="POST">
     <div class="col-md-3 card m-3" style="width: 21rem;">
    <img class="card-img-top" src="../photos/pic-1.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Photo 1</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <div class="d-flex -3">
      <button name="add_to_fav" type="submit" class="btn btn-primary mx-2">Add to favourite</button>
      <input type="hidden" name="photo_title" value="Photo 1">
      <input type="hidden" name="photo_picture" value="pic-1.jpg">
      </div>
    </div>
  </div>
  </form>

  <form action="manage_cart.php" method="POST">
     <div class="col-md-3 card m-3" style="width: 21rem;">
    <img class="card-img-top" src="../photos/pic-1.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Photo 1</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <div class="d-flex -3">
      <button name="add_to_fav" type="submit" class="btn btn-primary mx-2">Add to favourite</button>
      <input type="hidden" name="photo_title" value="Photo 2">
      <input type="hidden" name="photo_picture" value="pic-2.jpg">
      </div>
    </div>
  </div>
  </form>

</div>
</div>
</div>
 End add to cart  -->

  <div class="col-md-12 card m-4 justify-content-center" style="width: 100rem;">
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
  </div>
              </form>


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