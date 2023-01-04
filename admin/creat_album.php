<?php
  session_start();
  include('../connection/connect.php');

  if(!isset($_SESSION['USER_ID'])){
    header("location:./adlogin.php");
    die();
  }
  ?>

  <?php
  if(isset($_POST['album'])){
    $album_title=$_POST['album_name'];

    // $select_query="select * from 'categories' where CTitle='$category_title' ";

    $select_query="SELECT * FROM albums WHERE album_name='$album_title'";
    $result_select=mysqli_query($conn,  $select_query);

    $number=mysqli_num_rows($result_select);
    if($number>0){
      echo"<script>alert('This album already prersent')</script>";
    }
    else{

    $insert_query="INSERT INTO albums".
    "(album_name)".
    "VALUES"."('$album_title')";
    $result=mysqli_query($conn,$insert_query);
  if($result){
      echo "<script>alert('Category inserted successfully')</script>";
    }
  }};
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- Css Link -->
  <link rel="stylesheet" href="adindex.css">

  
  </head>
  <body>
    

  <!-- Form -->
  <div class="container h-100  mt-5 mb-0 ">
  <div class="col-md-12 card m-3" style="width: 50rem;">
  <form class="" action="" method="post">
                  <h1 class="text-center">Create a new album</h1>
                  <p class="description text-center">Login first to get better feelings of preview Photo</p>
                  <!-- Input fields -->
                  <div class="form-group m-3">
                  <label for="username">Album Name</label>
                      <input name="album_name" type="text" class="form-control username" id="username" placeholder="Album Name..." >
                  </div>
                  <div class="btn-box">
                      <input name="album" type="submit" value="Create" class="btn submit-btn bg-info m-3">
                      </div>  
  </div>
  </div>      
              </form>
              <!-- Form end -->

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
  </html>