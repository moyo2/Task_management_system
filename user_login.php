<?php include_once ('includes/connection.php');?>
<?php 
SESSION_START()

?>
<?php
if(isset($_POST['userLogin'])){
    $query = "SELECT email, password, name, id FROM users WHERE email = '$_POST[email]' AND password ='$_POST[password]'";
    $query_run = mysqli_query($connection, $query);
    if(mysqli_num_rows($query_run)){

        while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
        }
        

        
        echo "<script type='text/javascript'>
        alert('please enter correct details');
        window.location.href = 'user_dashboard.php';
        </script>";
    }
    else{
        echo "<script type='text/javascript'>
        alert('please enter correct details');
        window.location.href = 'user_login.php';
        </script>";
    }
}

?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            margin-top: 100px;
        }

        .login-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .login-card h2 {
            margin-bottom: 30px;
        }

        .login-card .form-group {
            margin-bottom: 20px;
        }

        .login-card .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="card login-card">
        <h2 class="text-center">Login</h2>
        <form action="user_login.php" method="post">
            <div class="form-group">
                <input type="email" class="form-control" name ="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name= "password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="userLogin">Login</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
