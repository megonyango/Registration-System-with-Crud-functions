<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 550px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {height: auto;}
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Dashboard</a></li>

            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav hidden-xs">
            <img src="images/meglogo.png" alt="Loading">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#section1">Dashboard</a></li>
                <li class=""><a href="employee_view.php">Employees</a></li>
                <li><a href="student_add.php">Students</a></li>
                <li><a href="reset-password.php">Reset Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul><br>
        </div>
        <br>

        <div class="col-sm-9">
            <div class="well">
                <h3>Hi <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, Welcome .</h3>
                <p>This is a simple php system that allowes you to use the basic CRUD functions . it has been done using procedural php.</p>
                <p>Enjoy working through it...</p>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="well">
                        <h4>System  Users</h4>
                        <p>3</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="well">
                        <h4>Employees</h4>
                        <p>50</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well">
                        <h4>Students</h4>
                        <p>3</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="well">
                        <p><a href="" class="btn btn-primary btn-block ">Create Users</a></p>
                        <p><a href="users_view.php" class="btn btn-primary btn-block">View Users</a></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well">
                        <p><a href="employee_add.php" class="btn btn-danger btn-block  ">Add Employees</a></p>
                        <p><a href="employee_view.php" class="btn btn-danger btn-block">View Employees</a></p>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well">
                        <p><a href="student_add.php" class="btn btn-success btn-block ">Add a Student</a></p>
                        <p><a href="student_view.php" class="btn btn-success btn-block ">View Students</a></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
