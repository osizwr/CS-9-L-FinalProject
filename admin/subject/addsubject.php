<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_POST['subjectCode'];
    $name = $_POST['subjectName'];
    $desc = $_POST['subjectDescription'];

    $subject = "
    INSERT INTO subjects (subjectCode, subjectName, subjectDescription)
    VALUES ('$code', '$name', '$desc');
    ";

    // Execute first query
    if (mysqli_query($con, $subject)) {
        header("Location: ../manage-subjects.php");
            exit();
    } else {
        echo "Error in students table: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
}
?>
