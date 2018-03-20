<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

// Creating connection
$connection = new mysqli($servername, $username, $password, $dbname);


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>


<div class="container" style="margin-top: 50px">

    <table class="table table-striped">
        <thead>
        <th>UID</th>
        <th>Student Name</th>
        <th>Roll</th>
        <th>Phone Number</th>
        <th>Father Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Date of Birth</th>
        <th>Educational Qualification</th>
        </thead>
        <tbody>

        <?php


        $string = "select * from members";
        $contact_list = $connection -> query($string);

        while($row=$contact_list->fetch_assoc())
        {

            echo "<tr><td>";

            echo $row['uid'];
            echo "</td><td>";

            echo $row['student_name'];
            echo "</td><td>";
            echo $row['roll'];
            echo "</td>";

            echo "</td><td>";
            echo $row['phone_number'];
            echo "</td>";

            echo "</td><td>";
            echo $row['father_name'];
            echo "</td>";

            echo "</td><td>";
            echo $row['address'];
            echo "</td>";

            echo "</td><td>";
            echo $row['email'];
            echo "</td>";

            echo "</td><td>";
            echo $row['date_of_birth'];
            echo "</td><td>";

            echo $row['educational_qualification'];
            echo "</td><td>";


            echo "</td></tr>";


        }

        ?>
        </tbody>
    </table>
</div>
</body>
</html>

