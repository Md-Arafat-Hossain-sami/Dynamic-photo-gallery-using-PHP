<?php
include('../connection/connect.php');
$id=$_GET['updid'];

$select_query="select * from `photos` where photo_id=$id";
  $result_query=mysqli_query($conn,$select_query);
 
$row=mysqli_fetch_assoc($result_query);
  $picture_id=$row['photo_id'];
  $picture_title=$row['photo_title'];
  $picture_description=$row['photo_descriptions'];
  $pictures_id=$row['album_id'];
  $picture_image1=$row['image1'];
  $product_image2=$row['image2'];


if(isset($_POST['upload_photo'])){
    $photo_title=$_POST['photo_title'];
    $photo_description=$_POST['photo_description'];
    $photo_album=$_POST['photo_album'];
    
 //    accessing image
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
 
 
 //    accessing image tmp name 
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

 
 // checking empty condition
 
//  if($photo_title=='' or $photo_description=='' or $photo_album==''){
//      // or $product_image1=='' or $product_image2=='' or $product_image3==''
//      echo "<script> alert('Please insert all the available field ')</script>";
//      exit();
//  }else{
     move_uploaded_file($temp_image1,"./uploaded_photo/$product_image1");
     move_uploaded_file($temp_image2,"./uploaded_photo/$product_image2");
     move_uploaded_file($temp_image3,"./uploaded_photo/$product_image3");
 
 $update_query="update `photos` set photo_id =$id, photo_title='$photo_title',photo_descriptions='$photo_description',album_id='$photo_album'
 where photo_id=$id";
 $result_query=mysqli_query($conn,$update_query);
 if($result_query){
     echo "<script> alert('Successfully Updated')</script>";
 }
 };
//  };
?>
<!-- "update photos"."(photo_title,photo_descriptions,album_id,image1,image2,image3)".
 "VALUES"."('$photo_title','$photo_description','$photo_album','$product_image1','$product_image2','$product_image3')"; -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo</title>
     <!-- Bootstrap css Link -->

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<!-- font awosome Link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body class="bg-light">
    <div class= "container mt-3">
<h1 class="text-center"> Update Details</h1>

<form action="" method="post"enctype="multipart/form-data" >

<div class="form-outline mb-4 w-50 m-auto ">
    <label for="photo_title" class="form-lable">Photo Title</label>
    <?php echo"<input type='text' name='photo_title' id='product_title' class='form-control'
    placeholder='Enter Photo title' value='$picture_title' autocomplete='off'>" ?>
    </div>
    <div class="form-outline mb-4 w-50 m-auto ">
    <label for="photo_description" class="form-lable">Photo Details</label>
    <?php echo"<input type='text' name='photo_description' id='product_description' class='form-control'
    placeholder='Enter Photo description' value='$picture_description' autocomplete='off'>" ?>
    </div>
   
    <div class="form-outline mb-4 w-50 m-auto">
    <select name="photo_album" id="" class="form-select">
       <?php echo "<option value='$album_title'>select a album</option>" ?> 
  <?php
 $select_query="SELECT * FROM albums";
 $result_query=mysqli_query($conn,$select_query);
 while($row=mysqli_fetch_assoc($result_query)){
    $album_title=$row['album_name'];
    $album_id=$row['album_id'];
    echo  "<option value='$album_id'>$album_title</option>";
 }
?>
    </select>
</div>
<!-- Image1 -->
<div class="form-outline mb-4 w-50 m-auto ">
    <label for="product_image1" class="form-lable">Upload photo 1</label>
    <input type="file" name="product_image1" id="product_image1" class="form-control">
    </div>

<!-- image 2 -->
    <div class="form-outline mb-4 w-50 m-auto ">
    <label for="product_image2" class="form-lable">Upload photo 2</label>
    <input type="file" name="product_image2" id="product_image2" class="form-control">
    </div>
    <!-- Image3 -->
    <div class="form-outline mb-4 w-50 m-auto ">
    <label for="produc_image3" class="form-lable">Upload photo 3</label>
    <input type="file" name="product_image3" id="product_image3" class="form-control">
    </div> 


    <!-- Button -->
    <div class="form-outline mb-4 w-50 m-auto ">
    <input name="upload_photo" type="submit" class=" bg-info p-2 my-3 rounded" 
  value="Update">
    
</form>

    </div>


    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>