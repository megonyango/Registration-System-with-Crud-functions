<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <style type="text/css">
        .wrapper{
            width: 80%;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>

<div class="wrapper">
    <nav aria-label="breadcrumb" style="padding-top:10px ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
            <li class="breadcrumb-item"><a href="employee_view.php">Employees</a></li>
            <li class="breadcrumb-item active" aria-current="page">Students</li>


            <li class="breadcrumb-item pull-right"><a href="logout.php">Logout</a></li>
            <li class="breadcrumb-item pull-right"><a href="reset-password.php">Reset-Password</a></li>

        </ol>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Student Details</h2>
                    <p>
                    </p>
                    <a href="student_add.php" class="btn btn-success pull-right">Add New Student</a>


                </div>
                <?php
                // Include config file
                require_once "_config.php";

                // Attempt select query execution
                $sql = "SELECT * FROM students";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Surname</th>";
                        echo "<th>Names</th>";
                        echo "<th>Nationality</th>";
                        echo "<th>Id Number</th>";
                        echo "<th>Mobile Number</th>";
                        echo "<th>Email</th>";
                        echo "<th>Dob</th>";
                        echo "<th>Gender</th>";
                        echo "<th>Program</th>";

                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['surname'] . "</td>";
                            echo "<td>" . $row['othername'] . "</td>";
                            echo "<td>" . $row['nationality'] . "</td>";
                            echo "<td>" . $row['idnumber'] . "</td>";
                            echo "<td>" . $row['mobilenumber'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['dob'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['program'] . "</td>";
                            echo "<td>";
                            echo "<a href='student_read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                            echo "<a href='student_update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                            echo "<a href='student_delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
