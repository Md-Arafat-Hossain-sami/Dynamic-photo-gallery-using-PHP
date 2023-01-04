  <?php
  session_start();
  include('../connection/connect.php');

  if(!isset($_SESSION['USER_ID'])){
    header("location:./adlogin.php");
    die();
  }
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
    <!-- 1st part navbar -->
    <nav class="navbar navbar-expand-lg navbar-light align-center" style="background-color: #e3f2fd;">
    <!-- <img src="../photos/logo.png" alt="" class="phlogos"/> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse content-center" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-white btn btn-primary mx-3 bg-info" href="./uploadphoto.php">Upload Photo + <span class="sr-only"></span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown text-white btn btn-primary mx-3 bg-info" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ALBUMS ⬇ 
            </a>
            <ul class="dropdown-menu active-hover">
              <li><a class="dropdown-item" href="./creat_album.php">Create a Album</a></li>
              <li><a class="dropdown-item" href="#">All Album</a></li>
              
            </ul>

            <li class="nav-item">
          <a class="nav-link text-white btn btn-primary mx-3 bg-info" href="./sort_photo.php">Photo Sort</a>
        </li>
      
    </div>
    <a href="./logout.php" class="btn btn-primary mx-3">Logout</a>
  
  </nav>

  <div class="container">

  <h1 class="text-center">Welcome Admin <?php echo $_SESSION['USER_NAME'] ?> </h1>
  <h6 class="text-center">Here You can Manage your Information </h6>

  </div>
</div>

<!-- Data Table  -->
<h2 class="text-center m-4 ">Photos Table</h2>
<table class="table mt-4" >
  <thead class="bg-dark text-white">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Photo Title</th>
      <th scope="col">Photo Description</th>
      <th scope="col">Photo 1</th>
      <th scope="col">Photo 2</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $select_query="select * from `photos`";
  $result_query=mysqli_query($conn,$select_query);
 
 while($row=mysqli_fetch_assoc($result_query)){
  $picture_id=$row['photo_id'];
  $picture_title=$row['photo_title'];
  $picture_description=$row['photo_descriptions'];
  $pictures_id=$row['album_id'];
  $picture_image1=$row['image1'];
  $product_image2=$row['image2'];
  // $product_image3=$row['image3'];
  echo"
  <tr>
      <th scope='row'>$picture_id</th>
      <td>$picture_title</td>
      <td>$picture_description</td>
      <td class='phlogos'><img class='card-img-top' src='../admin/uploaded_photo/$picture_image1' alt='Card image cap'></td>
      <td class='phlogos'><img class='card-img-top' src='../admin/uploaded_photo/$product_image2' alt='Card image cap'></td>
      <td class='d-flex m-2'>
      <button  name='Remove_pic' class='btn btn-outline-danger btn-sm'><a href='./delete.php?delid=$picture_id'>Remove </a></button>
      <button name='update_pic' class='btn btn-outline-danger btn-sm'><a href='./update.php?updid=$picture_id'>Update </a></button>
      </td>
    </tr>
  ";

  }
  ?>
  

  </tbody>
</table>


<h2 class="text-center ">User Table</h2>
<table class="table">
  <thead class="bg-dark text-white">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">User Name</th>
      <th scope="col">Email Id</th>
      <th scope="col">Operations </th>

    </tr>
  </thead>
  <tbody>
  <?php
  $select_query="select * from `users`";
  $result_query=mysqli_query($conn,$select_query);
 
 while($row=mysqli_fetch_assoc($result_query)){
  $user_id=$row['id'];
  $user_name=$row['username'];
  $user_email=$row['email'];
 
  echo"
  <tr>
      <th scope='row'>$user_id</th>
      <td>$user_name</td>
      <td>$user_email</td>
      <td>
      <button  name='Remove_pic' class='btn btn-outline-danger btn-sm'><a href='./user_delete.php?remid=$user_id'>Remove </a></button>
      <button name='update_pic' class='btn btn-outline-danger btn-sm'><a href='./user_update.php?ediid=$user_id'>Update </a></button>

    </tr>
  ";

  }
  ?>
    
    
  </tbody>
</table>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
        
            

  <!-- Footer Part -->
  <div class="bg-info p-3 text-centerb py-3 my-4 m-auto text-center">
    <p>All rights reserved @- Designed by Md Arafat Hossain</p>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
  </html>