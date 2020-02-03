<?php require '_handlestudentaddd.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper1">
    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="padding-top:10px ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                <li class="breadcrumb-item"><a href="employee_view.php">Employees</a></li>
                <li class="breadcrumb-item active" aria-current="page">Students</li>


                <li class="breadcrumb-item pull-right"><a href="logout.php">Logout</a></li>
                <li class="breadcrumb-item pull-right"><a href="reset-password.php">Reset-Password</a></li>

            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="page-header text-center">
                    <h4>Add Student Record</h4>
                    <p class="">Please fill this form and submit to add students record to the database.</p>

                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                     <div class="row">

                    <div class="col-sm-4 <?php echo (!empty($surname_err)) ? 'has-error' : ''; ?>">
                        <label> Surname</label>
                        <input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>">
                        <span class="help-block"><?php echo $surname_err;?></span>
                    </div>


                    <div class="col-sm-4 <?php echo (!empty($othername_err)) ? 'has-error' : ''; ?>">
                        <label> Other Name(s)</label>
                        <input type="text" name="othername" class="form-control" value="<?php echo $othername; ?>">
                        <span class="help-block"><?php echo $othername_err;?></span>

                    </div>

                         <div class="col-sm-4 <?php echo (!empty($nationality_err)) ? 'has-error' : ''; ?>">
                             <label>Nationality</label>
                             <input type="text" name="nationality" class="form-control" value="<?php echo $nationality; ?>">
                             <span class="help-block"><?php echo $nationality_err;?></span>
                         </div>

                     </div>

                    <div class="row">
                        <div class="col-sm-4 <?php echo (!empty($idnumber_err)) ? 'has-error' : ''; ?>">
                            <label>ID/Passport/Birth Certificate No</label>
                            <input type="text" name="idnumber" class="form-control" value="<?php echo $idnumber; ?>">
                            <span class="help-block"><?php echo $idnumber_err;?></span>
                        </div>

                        <div class="col-sm-4 <?php echo (!empty($mobilenumber_err)) ? 'has-error' : ''; ?>">
                        <label>Mobile Number</label>
                        <input type="text" name="mobilenumber" class="form-control" value="<?php echo $mobilenumber; ?>">
                        <span class="help-block"><?php echo $mobilenumber_err;?></span>
                    </div>
                    <div class="col-sm-4 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email address</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                        <span class="help-block"><?php echo $email_err;?></span>
                    </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4 <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>">
                            <span class="help-block"><?php echo $dob_err;?></span>
                        </div>

                        <div class="col-sm-4 <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="intersex">Intersex</option>
                                <span class="help-block"><?php echo $gender_err;?></span>

                            </select>
                        </div>

                        <div class="col-sm-4 <?php echo (!empty($program_err)) ? 'has-error' : ''; ?>">
                            <label>Program </label>
                            <select name="program" id="program" class="form-control">
                                <option value="MIT">MIT</option>
                                <option value="Python">Python</option>
                                <option value="Data Science">Data Science</option>
                                <option value="Javascript">Java Script</option>

                            </select>
                            <span class="help-block"><?php echo $program_err;?></span>


                        </div>

                    </div>

                    </div>


                    <div class="row" style="margin-top: 25px; margin-left:40% ">
                          <button class="btn btn-danger col-sm-4" style="padding:"> Submit Form</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
