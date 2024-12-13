<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['studentID'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $phone = $_POST['contactNo'];

    $final_password = $lastname;
    $hashed_password = password_hash($final_password, PASSWORD_DEFAULT);
    $student_email = $student_id . "@psu.palawan.edu.ph";
    
    $insertStudent = "
    INSERT INTO students (studentID, firstName, lastName, contactNo, email, yearLevel)
    VALUES ('$student_id', '$firstname', '$lastname', '$phone', '$student_email', '1st Year');
    ";

    // Execute first query
    if (mysqli_query($con, $insertStudent)) {
        // Insert into users table only after students table insert is successful
        $createAccount = "
        INSERT INTO users (userLogin, userPass, userRole)
        VALUES ('$student_email', '$hashed_password', 'Student');
        ";

        // Execute second query
        if (mysqli_query($con, $createAccount)) {
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
