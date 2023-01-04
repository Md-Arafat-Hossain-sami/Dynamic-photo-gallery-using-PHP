<?php
include('../connection/connect.php');

if(isset($_POST['submitB'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= md5($_POST['pass']);
    $cpassword= md5($_POST['cpass']);

    $select_query=" SELECT * FROM admin WHERE email='$email' && password='$password'";
    $result = mysqli_query($conn,$select_query);

    if(mysqli_num_rows($result) > 0){
        $error[] ='User already exist !';
    }else{
        if($password != $cpassword){
            $error[] = 'password not matched!';
        }else{
            // $insert_query= "INSERT INTO login_register(name,email,password) VALUES ('$name','$email','$pass')";
            $insert_query="INSERT INTO admin"."(username,email,password)"."VALUES"."('$name','$email','$password')";
            $result_query= mysqli_query($conn, $insert_query);
            echo"<script>alert('insert successfuly')</script>";
            header('location: adlogin.php');
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resgistration</title>
<!-- Bootstrap Css link  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<!-- Css Link  -->
<link rel="stylesheet" href="reg.css">

</head>
<body>
<!-- style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp') -->
<section class="vh-100 bg-black">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <?php
              if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">' .$error.'</span>'; 
                }
              }
              ?>

              <form action="" method="post">

                <div class="form-outline mb-4">
                  <input name="name" type="text" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input name="email" type="email" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input name="pass" type="password" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input name="cpass" type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>

                


                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <!-- <div class="d-flex justify-content-center">
                  <button  type="button" name="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div> -->
                <div class="form-outline mb-4 w-50 m-auto ">
    <input type="submit" class=" btn btn-primary btn-lg " name="submitB"
  value="Register">
            </div>
  <!-- <button type="button" name="submitB" class="btn btn-primary btn-lg ">Register</button> -->

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="loginF.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- !-- Bootstrap js Link --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>