<?php 
session_start();
include('../connection/connect.php');


if(isset($_POST['loginb'])){
    // $name= $_POST['name'];
    $email= $_POST['email'];
    $password= md5($_POST['pass']);
    // $cpassword= md5($_POST['cpass']);
  
    $select_query=" SELECT * FROM users WHERE email='$email' && password='$password'";
    $result = mysqli_query($conn,$select_query);
  
    if(mysqli_num_rows($result) > 0){
  
        $row=mysqli_fetch_assoc($result);
        $_SESSION['USER_ID']=$row['id'];
        $_SESSION['USER_NAME']=$row['username'];
        $_SESSION['USER_EMAIL']=$row['email'];
        header("location:index.php");
    }else{
        $error[] ='Please enter a valid email or password !!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <!--Bootstrap Link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- Css Link -->
<link rel="stylesheet" href="registration.css">
</head>
<body >
    <div class="backimg">
<div class="container h-100  mt-5 mb-0 ">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->

           
            <form action="" method="post">
                <h1 class="text-center">Login Form</h1>
                <p class="description text-center">Login first to get better feelings of preview Photo</p>
                <!-- Input fields -->
                <div class="form-outline">
                    <label for="email">Email:</label>
                    <input name="email" type="email" class="form-control email" id="email" placeholder="Email..." >
                </div>
                <div class="form-outline">
                    <label for="password">Password:</label>
                    <input name="pass" type="password" class="form-control password" id="password" placeholder="Password..." >
                </div>
                <!-- <button name="loginb" type="submit" class="btn btn-primary btn-customized my-3">Login</button> -->
                <div class="btn-box">
                    <input name="loginb" type="submit" value="Login" class="btn submit-btn bg-info m-3">
                    <?php
              if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">' .$error.'</span>'; 
                }
              }
              ?>
                </div>
                <p class="text-center text-muted mt-5 mb-0">Need Registration ? <a href="./registration.php"
                    class="fw-bold text-body"><u>Click Here</u></a></p>
               
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>
</div>








<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>