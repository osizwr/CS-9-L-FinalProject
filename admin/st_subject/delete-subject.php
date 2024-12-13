<?php
include '../dbcon.php';

if (isset($_GET['studentID'])) {
    $studentID = $_GET['studentID'];

    // Delete from grades table first to maintain referential integrity
    //$deleteGrades = "DELETE FROM grades WHERE studentID = '$studentID'";
    //mysqli_query($con, $deleteGrades);

    $deleteSubject = "DELETE FROM studentsubjects WHERE studentID = '$studentID'";
    if (mysqli_query($con, $deleteSubject)) {
        header("Location: ../manage-st_subjects.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
