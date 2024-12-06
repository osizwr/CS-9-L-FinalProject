<?php
include 'dbcon.php';

if (isset($_GET['studentID'])) {
    $studentID = $_GET['studentID'];

    // Delete from grades table first to maintain referential integrity
    $deleteGrades = "DELETE FROM grades WHERE studentID = '$studentID'";
    mysqli_query($con, $deleteGrades);

    // Delete from students table
    $deleteStudent = "DELETE FROM students WHERE studentID = '$studentID'";
    if (mysqli_query($con, $deleteStudent)) {
        header("Location: ../manage-students.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
