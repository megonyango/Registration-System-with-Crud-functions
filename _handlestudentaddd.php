<?php
// Include config file
require_once "_config.php";

// Define variables and initialize with empty values

$surname=$othername=$nationality=$idnumber=$mobilenumber=$email=$dob=$gender=$program="";

//define the errors
$surname_err=$othername_err=$nationality_err=$idnumber_err=$mobilenumber_err=$email_err=$dob_err=$gender_err=$program_err="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

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
        // Prepare an insert statement
        $sql = "INSERT INTO students (surname, othername, nationality,idnumber,mobilenumber,email,dob,gender,program ) VALUES (?, ?, ?,?,?,?, ?, ?,?)";

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
                // Records created successfully. Redirect to landing page
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
}

