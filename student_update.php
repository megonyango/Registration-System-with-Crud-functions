<?php
// Include config file
require_once "_config.php";

$surname=$othername=$nationality=$idnumber=$mobilenumber=$email=$dob=$gender=$program="";

//define the errors
$surname_err=$othername_err=$nationality_err=$idnumber_err=$mobilenumber_err=$email_err=$dob_err=$gender_err=$program_err="";


// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    //Validate surname
    $input_surname = trim($_POST["surname"]);
    if(empty($input_surname)){
        $surname_err = "Please enter your surname.";
    } elseif(!filter_var($input_surname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $surname_err = "Please enter a valid name.";
    } else{
        $surname = $input_surname;
    }

    //Validate other name

    $input_othername = trim($_POST["othername"]);
    if(empty($input_othername)){
        $othername_err = "Please enter a your other names.";
    } elseif(!filter_var($input_othername, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $othername_err = "Please enter a valid name.";
    } else{
        $othername = $input_othername;
    }


    // Validate nationality
    $input_nationality = trim($_POST["nationality"]);
    if(empty($input_nationality)){
        $name_err = "Please enter your nationality.";
    } elseif(!filter_var($input_nationality, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nationality_err = "Please enter a valid nationality.";
    } else{
        $nationality = $input_nationality;
    }

    //validate idnumber

    $input_idnumber = trim($_POST["idnumber"]);
    if(empty($input_idnumber)){
        $idnumber_err = "Please enter your id number.";
    } else{
        $idnumber = $input_idnumber;
    }


    //validate mobilenumber

    $input_mobilenumber = trim($_POST["mobilenumber"]);
    if(empty($input_mobilenumber)){
        $mobilenumber_err = "Please enter your mobile number.";
    }
    else{
        $mobilenumber = $input_mobilenumber;
    }


    //validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";
    } else{
        $email = $input_email;
    }



    // Validate dob
    $input_dob = trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Please a date of birth.";
    } else{
        $dob = $input_dob;
    }

    // Validate gender
    $input_gender = trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Please enter your gender.";
    } else{
        $gender = $input_gender;
    }



    // Validate program

    $input_program = trim($_POST["program"]);
    if(empty($input_program)){
        $program_err = "Please enter a program.";
    } else{
        $program = $input_program;
    }




    // Check input errors before inserting in database
    if(empty($surname_err) && empty($othername_err) && empty($nationality_err) && empty($idnumber_err) &&
        empty($mobilenumber_err) && empty($dob_err) && empty($gender_err) && empty($program_err)

    ){
        // Prepare an update statement
        $sql = "UPDATE students SET surname=?, othername=?, nationality=?, idnumber=?, mobilenumber=?, email=?, dob=?, gender=?, program=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_surname, $param_othername, $param_nationality,
                $param_idnumber,$param_mobilenumber,$param_email,$param_dob,$param_gender,$param_program);

            // Set parameters
            $param_surname = $surname;
            $param_othername=$othername;
            $param_nationality=$nationality;
            $param_idnumber=$idnumber;
            $param_mobilenumber=$mobilenumber;
            $param_email=$email;
            $param_dob=$dob;
            $param_gender=$gender;
            $param_program=$program;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: student_view.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM students WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $surname = $row["surname"];
                    $othername = $row["othername"];
                    $nationality = $row["nationality"];
                    $idnumber = $row["idnumber"];
                    $mobilenumber = $row["mobilenumber"];
                    $email = $row["email"];
                    $dob = $row["dob"];
                    $gender = $row["gender"];
                    $program = $row["program"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width:80%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Update Record</h2>
                </div>
                <p>Please edit the input values and submit to update the record.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="student_view.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>