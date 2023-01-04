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
      <title>My Favourite photos</title>
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
    <a class="nav-link text-dark" href="#">Welcome <?php echo $_SESSION['USER_NAME']; ?></a>   
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
  echo "<a href='./registration.php' class='btn btn-primary mx-3'>User Registration/Login</a>";
    
    die();
  }else{
    echo "
    <div class='d-flex'>
    <a href='#' class='btn btn-primary mx-3'>Profile </a>
    <a href='../admin/logout.php' class='btn btn-primary mx-3'>Logout</a>";
  };
  ?></div>    
    </nav>


    <!-- add- to favourite fetch part -->

<!-- <div class="container">
    <div class="col-lg-8 mt-5">
    <table class="table">
  <thead class="text-center">
    <tr >
      <th scope="col">Seriol No</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item ID</th>

    </tr>
  </thead>

  <tbody class="text-center"> -->
  <div class="row">
    <div class="col-md-12">
    <!-- Product -->

    <div class="row">
<?php
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $value)
        {
            // print_r($value);
            // echo"
            // <tr>
            // <td>1</td>
            // <td>$value[Item_name]</td>
            // <td>$value[value]</td>
            // <td>
            // <form action='manage_cart.php' method='POST'>
            // <button name='Remove_pic' class='btn btn-outline-danger btn-sm'>Remove</button></td>
            // <input type='hidden' name='remove_fav' value='$value[Item_name]'></input>
            // </form>
            // </tr>";

            echo"
            <div class='col-md-3 card m-3' style='width: 21rem;'>
            <img class='card-img-top' src='../photos/$value[value]' alt='Card image cap'>
            <div class='card-body'>
              <h5 class='card-title'>$value[Item_name]</h5>
              <div class='d-flex -3'>
              <form action='manage_cart.php' method='POST'>
                <button name='Remove_pic' class='btn btn-outline-danger btn-sm'>Remove</button></td>
                <input type='hidden' name='remove_fav' value='$value[Item_name]'></input>
                </form>
              </div>
            </div>
          </div>";
        }
    }
?>
 
<!-- </table>
</div>
    </div>

     -->




<!-- Footer Part -->
<footer>
  <div class="bg-info p-3 text-centerb py-3 my-4">
    <p>All rights reserved @- Designed by Md Arafat Hossain</p>
  </div>

    </footer>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  </html>