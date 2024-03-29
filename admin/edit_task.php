<?php
include_once('../includes/connection.php');
include_once('../includes/header.php');
?>

<body>
    <!-- header starts here -->
    <div class="row" id="header">
        <div class="col-md-12">
            <h3> <i class="fa fa-solid fa-list" style="padding-right: 15px;"></i> Task Management </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" style="color: white;"><br>
            <h3 style="color: black;">Edit the task</h3><br>
            <form action="" method="post">
                <input type="hidden" name="id" class="form-control" value="" required>
            </form>
        </div>

        <div class="form-group">
            <label for="assignedUser">Assign To:</label>
            <select class="form-control" id="assignedUser" name="assignedUser" required>
                <?php
                include_once('../includes/connection.php');
                $query = "SELECT uid, name, email FROM users";
                $query_run = mysqli_query($connection, $query);
                if (mysqli_num_rows($query_run)) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div> 
    </form> 
        </div>
    </div>
</body>
</html>
