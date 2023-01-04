<?php
  include('../connection/connect.php');
if(isset($_GET['delid'])){
    $id=$_GET['delid'];

    $sql="delete from `photos` where photo_id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Deleted successfully')</script>";
        header('location:adindex.php');
   
    }else{
        die(mysqli_error($conn));
    }
}
?>

