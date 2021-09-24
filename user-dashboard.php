<?php 
    session_start();
    require 'connect.php';
   if(!isset($_SESSION['user_array'])){
    header("Location:login.php");
   }
  else{
     if($_SESSION['user_array']['role'] != 'user'){
           header("Location:admin.php");
       }
  }
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
    </style>
</head>

<body class="mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">
                                    <h5>User Dashboard</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="logout.php" method="GET">
                                    <button type="submit" name="logout" class="btn btn-danger float-end"
                                        onclick="return confirm('Are you sure you want to logout')">
                                        Logout
                                    </button>

                                </form>
                                <!-- <a href="register.php" class="float-end mx-2 btn btn-danger">Register</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card shadow border">
                                    <div class="card-body">
                                        <h6>User Info</h6>
                                        <div class="text-info fs-5">
                                            Role: <?php echo $_SESSION['user_array']['role']; ?>
                                        </div>
                                        <div class="">
                                            Name: <?php echo $_SESSION['user_array']['name'] ;?>
                                        </div>
                                        <div class="">
                                            Email: <?php echo $_SESSION['user_array']['email'] ;?>
                                        </div>
                                        <div class="">
                                            Address: <?php echo $_SESSION['user_array']['address'] ;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                            </div>
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