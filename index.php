<?php
    require 'connect.php';
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
                                    <h5>Home</h5>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <a href="login.php" class="float-end mx-2 btn btn-primary">Login</a>
                                <a href="register.php" class="float-end mx-2 btn btn-danger">Register</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>About Our Website</h5>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit fugiat
                            officiis exercitationem dolor libero perferendis, error optio quo. Ex culpa voluptate
                            natus deleniti ducimus nesciunt fugiat adipisci tempore aliquam?
                        </p>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, iure architecto expedita
                            exercitationem deleniti magni atque harum molestiae! Voluptas ut aliquam odit officiis
                            sunt optio tempore natus, molestias voluptatibus facilis.
                        </p>
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