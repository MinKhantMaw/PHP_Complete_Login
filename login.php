<?php 
session_start();

?>
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

    .margin {
        margin-left: 440px;
    }
    </style>
</head>

<body class="mt-2">
    <?php 
    include "connect.php";
    if (isset($_POST['login'])) {
         $email = $_POST['email'];
         $password = md5($_POST['password']);
        $error="";
        $result =mysqli_query($db,"SELECT * FROM user WHERE email = '$email' AND password='$password'");
        $count=mysqli_num_rows($result);

        if($count==1){
            $user_array=mysqli_fetch_assoc($result);
            
            $_SESSION['user_array']=$user_array;
            if ($user_array['role']=='user'){
                header("Location:user-dashboard.php");
            } else{
                header("Location:admin.php");
            }
        }else{
            $error ="Email or password invalid";
        }
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="d-flex  fs-4 card-header bg-info text-white ">
                                    <div class="card-title ">
                                        Login
                                    </div>
                                    <div class="margin">
                                        <a href="index.php"><button
                                                class="text-white btn-sm btn btn-primary">Home</button></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <form action="login.php" method="post">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control">
                                            <label for="">Password</label>
                                            <input type="text" name="password" class="form-control">
                                            <div class="card-footer mt-2  ">
                                                <button class="btn btn-primary" type="submit"
                                                    name="login">Login</button>
                                                <span class=" float-end ">If you account no yet
                                                    <a href=" register.php">registerhere</a></span>
                                            </div>
                                        </form>

                                    </div>
                                </div>
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