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

    // SQL query
    $sql = "
    INSERT INTO students (studentID, firstName, lastName, contactNo, email, yearLevel)
    VALUES ('$student_id', '$firstname', '$lastname', '$phone', '$student_email', '1st Year');
    
    INSERT INTO users (userLogin, userPass, userRole)
    VALUES ('$student_id', '$hashed_password', 'Student');
    ";

    // Execute query
    if (mysqli_multi_query($con, $sql)) {
        header("Location: ../manage-students.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
}
?>
