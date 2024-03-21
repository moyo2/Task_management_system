<?php 

include_once 'header.php';

?>

<body>
    <div class="row">
        <div class="col-md-3 m-auto">
            <form action="" method="post">
                <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>

                <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                <input type="submit" name="userlogin" value="Login" class="btn btn-warning" placeholder="Enter Email" required>
                </div>

            </form>
        </div>
    </div>
</body>
</html>