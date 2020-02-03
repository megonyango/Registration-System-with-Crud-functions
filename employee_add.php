<?php require '_handlecreaterecord.php'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 80%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <nav aria-label="breadcrumb" style="padding-top:10px ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
            <li class="breadcrumb-item"><a href="student_add.php">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">Employees</li>


            <li class="breadcrumb-item pull-right"><a href="logout.php">Logout</a></li>
            <li class="breadcrumb-item pull-right"><a href="reset-password.php">Reset-Password</a></li>

        </ol>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8" style="margin-left: 120px">
                <div class="page-header">
                    <h2>Create Record</h2>
                </div>
                <p>Please fill this form and submit to add employee record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        <span class="help-block"><?php echo $name_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                        <label>Address</label>
                        <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                        <span class="help-block"><?php echo $address_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                        <label>Salary</label>
                        <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                        <span class="help-block"><?php echo $salary_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>



