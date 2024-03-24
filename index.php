<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskVibes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('./images/bg.png');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #f7f7f7;
            background-size: cover; 
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center; 
            
        }

        .overlay {
            background-color: rgba(255, 255, 255, 0.2); /* Add transparent white overlay */
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1; /* Ensure the overlay is above the background */
        }

        .landing-container {
            text-align: center;
        }

        .landing-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .landing-buttons .btn {
            margin: 0 10px;
            padding: 15px 25px;
            font-size: 18px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.2); /* Add transparent black footer */
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>
<div class="overlay">
    <div class="landing-container">
        <h1 style="color: #333;"></h1>
        <div class="landing-buttons">
            <a href="./user_login.php" class="btn btn-primary">User Login</a>
            <a href="./register.php" class="btn btn-success">Register</a>
            <a href="./admin/admin_login.php" class="btn btn-danger">Admin Login</a>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <a href="#" style="color: #fff;">About Us</a>
        <a href="#" style="color: #fff;">Contact Us</a>
        <a href="#" style="color: #fff;">Terms of Service</a>
        <a href="#" style="color: #fff;">Privacy Policy</a>
    </div>
</footer>