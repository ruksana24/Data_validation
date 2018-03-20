<?php
//echo uniqid();
$error_message = "";

//if all data is via post method
if (isset($_POST['student_name']) && isset($_POST['roll']) && isset($_POST['phone_number']) &&
    isset($_POST['father_name']) && isset($_POST['address']) &&
    isset($_POST['email']) && isset($_POST['date_of_birth']) &&
    isset($_POST['educational_qualification'])
) {

    //checking if any of the fields are empty or not
    if ($_POST['student_name'] == "")
        $error_message .= "please enter student name!<br>";
    if ($_POST['roll'] == "")
        $error_message .= "please valid enter roll!<br>";
    if ($_POST['phone_number'] == "")
        $error_message .= "please enter valid phone number!<br>";
    if ($_POST['father_name'] == "")
        $error_message .= "please enter Fathers name!<br>";
    if ($_POST['address'] == "")
        $error_message .= "please enter valid Address!<br>";
    if ($_POST['email'] == "")
        $error_message .= "please enter valid email address!<br>";
    if ($_POST['date_of_birth'] == "")
        $error_message .= "please enter Date of Birth!<br>";
    if ($_POST['educational_qualification'] == "")
        $error_message .= "please enter Educational qualification!<br>";


    /***validation part starts ***/
    //CSE RU student's roll must be at a number and must be at least 8 digit
    if (!is_numeric($_POST['roll']) || (strlen($_POST['roll']) < 8 || strlen($_POST['roll']) >10)) {
        $error_message .= "Invalid Roll Number!<br>";
    } //phone number must be a digit and at least 11 digit
    if (!is_numeric($_POST['phone_number']) || strlen($_POST['phone_number']) != 11)
        $error_message .= "Invalid Phone Number!<br>";

    //built in function to validate email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format!<br>";
    }


    //checking if student is over 18 years or not
    $given_year = new DateTime($_POST['date_of_birth']);
    $current_year = new DateTime();
    $diff = $given_year->diff($current_year);

    if ($diff->y < 18)
        $error_message = "Student must be at least 18 years!!<br>";


    //if no error found, save to database
    if (strlen($error_message) == 0) {
        //saving to database

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "data";

        // Creating connection
        $connection = new mysqli($servername, $username, $password, $dbname);

        $student_name = $_POST['student_name'];
        $roll = $_POST['roll'];
        $phone_number = $_POST['phone_number'];
        $father_name = $_POST['father_name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $date_of_birth = $_POST['date_of_birth'];
        $educational_qualification = $_POST['educational_qualification'];
        $uid = uniqid(); //creating a unique id


        $query_string = "INSERT INTO MEMBERS VALUES('$student_name','$roll','$phone_number'
                        ,'$father_name','$address','$email','$date_of_birth'
                        ,'$educational_qualification'
                        ,'$uid')";

        $connection -> query($query_string);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h3 align="center">Fill the fields</h3>

    <h3 align="center"><?php echo $error_message; ?></h3>

    <div class="row">

        <form method="post" class="form-horizontal" action="">
            <div class="form-group">

                <label class="control-label col-sm-4" for="student_name">Name : </label>
                <div class="col-sm-4">
                    <input type="text" name="student_name" class="form-control" id="student_name" required>
                </div>
            </div>

            <div class="form-group">

                <label class="control-label col-sm-4" for="roll">Roll : </label>
                <div class="col-sm-4">
                    <input type="text" name="roll" class="form-control" id="roll" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="phone_number">Phone Number : </label>
                <div class="col-sm-4">
                    <input type="text" name="phone_number" class="form-control" id="phone_number"
                           required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="father_name">Father's name : </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="father_name" name="father_name" required>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-4" for="address">Address : </label>
                <div class="col-sm-4">
                    <input type="text" name="address" class="form-control" id="address" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="email">Email : </label>
                <div class="col-sm-4">
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="date_of_birth">Date of Birth : </label>
                <div class="col-sm-4">
                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-4" for="educational_qualification">Educational Qualification
                    : </label>
                <div class="col-sm-4">
                    <input type="text" name="educational_qualification" class="form-control"
                           id="educational_qualification" required>
                </div>
            </div>

            <div class="col-sm-offset-5 col-sm-6">
                <input class="btn btn-primary" type="submit" value="Register">
            </div>

        </form>
    </div>

    
</div>
</body>
</html>