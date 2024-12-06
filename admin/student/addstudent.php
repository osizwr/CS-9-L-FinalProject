<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['studentID'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $phone = $_POST['contactNo'];

    // Use studentid as the default password if none is provided
    $final_password = $student_id;
    $student_email = $student_id . "@psu.palawan.edu.ph";
    // Hash the password
    $hashed_password = password_hash($final_password, PASSWORD_DEFAULT);

    // Insert into students table
    $sql1 = "
    INSERT INTO students (studentID, firstName, lastName, contactNo, email, yearLevel)
    VALUES ('$student_id', '$firstname', '$lastname', '$phone', '$student_email', '1st Year');
    ";

    // Execute first query
    if (mysqli_query($con, $sql1)) {
        // Insert into users table only after students table insert is successful
        $sql2 = "
        INSERT INTO users (userLogin, userPass, userRole)
        VALUES ('$student_id', '$hashed_password', 'Student');
        ";

        // Execute second query
        if (mysqli_query($con, $sql2)) {
            header("Location: ../manage-students.php");
            exit();
        } else {
            echo "Error in users table: " . mysqli_error($con);
        }
    } else {
        echo "Error in students table: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
}
?>
