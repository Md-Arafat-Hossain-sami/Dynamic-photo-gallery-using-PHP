<?php
session_start();

if(!isset($_SESSION['USER_ID'])){
    echo "<script>window.location.href='login.php'</script>";
}else{


if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['add_to_fav']))
    {
        if(isset($_SESSION['cart']))
        {
            $myfav=array_column($_SESSION['cart'],'Item_name');
            // print_r ($myfav);
            if(in_array($_POST['photo_title'], $myfav))
            {
                echo"<script>alert('Item Already Added');
                window.location.href='index.php';
                </script>";
            }else{
                $count=count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('Item_name'=>$_POST['photo_title'],'value'=>$_POST['photo_id']);
                // print_r($_SESSION['cart']);
                echo"<script>alert('Photo Added to added to favourite');
        window.location.href='index.php';
        </script>";
            }
           
        }
        else{
            $_SESSION['cart'][0]=array('Item_name'=>$_POST['photo_title'],'value'=>$_POST['photo_id']);
            // print_r($_SESSION['cart']);
            echo"<script>alert('Photo Added to added to favourite');
        window.location.href='index.php';
        </script>";
        }
    }
    if(isset($_POST['remove_fav'])){
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['Item_name']==$_POST['remove_fav'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                
                echo"<script>alert('Item Removed');
                window.location.href='my_favourite.php';
                </script>";
            }
            }
        }
    }
}
?>
