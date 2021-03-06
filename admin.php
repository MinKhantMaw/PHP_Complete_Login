<?php 
    session_start();
    require 'connect.php';
    if(!isset($_SESSION['user_array'])){ 
        header("Location:login.php");
    }
    else{
        if ($_SESSION['user_array']['role'] != 'admin') {
           header("Location:user-dashboard.php");
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
    <?php 
    $edit= false;
        if(isset($_GET['user_id'])){
            $edit=true;
            $user_id=$_GET['user_id'];
            $query="SELECT * FROM user WHERE id=$user_id";
           $result= mysqli_query($db,$query);
           if ($result) {
                $user=mysqli_fetch_assoc($result);
           }else{
             die("Error" . mysqli_error($db));
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
                                    <a href="admin.php">
                                        <h5>Admin Dashboard</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="logout.php" method="GET">
                                    <button type="submit" name="logout" class="btn btn-sm btn-danger float-end"
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
                            <div class="col-md-3">
                                <div class="card shadow border">
                                    <div class="card-body">
                                        <h6>Admin Info</h6>
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
                                <div class="card shadow mt-2">
                                    <?php if($edit==true): ?>
                                    <div class="card-header  bg-secondary text-white">
                                        <div class="card-heading">
                                            User Editing Form
                                        </div>
                                    </div>
                                    <form action="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="<?php echo $user['name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="<?php echo $user['email']; ?>">
                                            </div>
                                            <div class=" form-group">
                                                <label for="">Address</label>
                                                <textarea name="address" class="form-control" id="" cols="8" rows="2">
                                                    <?php echo $user['address']; ?>
                                                </textarea>
                                            </div>
                                            <div class=" form-group">
                                                <label for="">Role</label>
                                                <select name="role" class="form-control">
                                                    <option value="">Select Role</option>
                                                    <option value="admin" <?php if($user['role']== 'admin'){ ?> selected
                                                        <?php } ?>>
                                                        Admin
                                                    </option>
                                                    <option value="user" <?php if($user['role']== 'user'){ ?> selected
                                                        <?php } ?>>
                                                        User</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="col-md-9">
                                <h5>User List</h5>
                                <table class="shadow table table-hover">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //select all user row
                                        $query="SELECT * FROM user";
                                        $result=mysqli_query($db,$query);
                                        foreach($result as $user) {
                                            ?>
                                        <tr>
                                            <td><?php echo $user['id']; ?></td>
                                            <td><?php echo $user['name']; ?></td>
                                            <td><?php echo $user['email']; ?></td>
                                            <td><?php echo $user['address']; ?></td>
                                            <td><?php echo $user['role']; ?></td>
                                            <td>
                                                <a href=" admin.php?user_id=<?php echo $user['id']; ?>"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>