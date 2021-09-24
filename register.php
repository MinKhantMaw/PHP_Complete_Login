<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;700&display=swap');

    body {
        font-family: 'JetBrains Mono', monospace;
    }
    </style>
</head>

<body class="mt-2">
    <?php
    require 'connect.php';
    declare(strict_type=1);
    ini_set('display_errors','1');
    error_reporting(E_ALL);

    $nameErr="";
    $emailErr="";
    $passErr=""; 
    $conpassErr="";
    $addressErr=""; 
    
        if (isset($_POST['register_btn'])) {
           $name    = $_POST['name'];
           $email   = $_POST['email'];
           $password= $_POST['password'];
           $confirm = $_POST['conpass'];
           $address = $_POST['address'];

        if(empty($name)){
            $nameErr="The name field is required";
           }
        if(empty($email)){
            $emailErr="The email field is required";
           }
        if(empty($password)){
            $passErr="The password field is required";
           }
        if(empty($conpass)){
            $conpassErr="The confirm password field is required";
           }
        if(empty($address)){
            $addressErr="The address field is required";
           }
        // if($conpass != $password){
        //        $conpassErr="The password do not match";
        //    }
        if(!empty($name) && !empty($email) && !empty($password) && !empty($address)){
            $encryptPassword=md5($password);
            $query = "INSERT INTO user (name,email,password,address) VALUES ('$name','$email','$encryptPassword','$address')";
              $result= mysqli_query($db, $query);
              if($result==true) {
                  echo "<script>alert('Registration Successfully')</script>";
                  header("Location:login.php");
              }else{
                die("Registration Fail" . mysqli_error($db));
              }
        }
  
      }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">
                                    <h5>Registration Form</h5>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <a href="index.php" class="float-end mx-2 btn btn-primary">
                                    << Back </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Register
                                        </div>
                                    </div>
                                    <form action="register.php" method="POST">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name"
                                                    class="form-control <?php if($nameErr!=""){?> is-invalid <?php } ?>">
                                                <i class=" text-danger"> <?php echo $nameErr ?> </i>

                                            </div>
                                            <div class=" form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email"
                                                    class="form-control <?php if($emailErr!=""){?> is-invalid <?php } ?>">
                                                <i class="text-danger"> <?php echo $emailErr ?> </i>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="text" name="password"
                                                    class="form-control <?php if($passErr!=""){?> is-invalid <?php } ?>">
                                                <i class="text-danger"> <?php echo $passErr ?> </i>

                                            </div>
                                            <div class="form-group">
                                                <label for="">Confirm Password</label>
                                                <input type="text" name="conpass"
                                                    class="form-control <?php if($conpassErr!=""){?> is-invalid <?php } ?>">
                                                <i class="text-danger"> <?php echo $conpassErr ?> </i>

                                            </div>
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <textarea
                                                    class="form-control <?php if($addressErr!=""){?> is-invalid <?php } ?>"
                                                    name="address" id="" cols="20" rows="5"></textarea>
                                                <i class="text-danger"> <?php echo $addressErr ?> </i>

                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" name="register_btn" class=" btn
                                                        btn-primary">Register</button>
                                            </div>

                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>


            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>