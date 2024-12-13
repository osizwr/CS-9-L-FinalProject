<?php
include 'dbcon.php';

if (isset($_GET['subjectID'])) {
    $subjectID = $_GET['subjectID'];

    // Delete from grades table first to maintain referential integrity
    //$deleteGrades = "DELETE FROM grades WHERE subjectID = '$subjectID'";
    //mysqli_query($con, $deleteGrades);

    // Delete from students table
    $deleteSubject = "DELETE FROM subjects WHERE subjectID = '$subjectID'";
    if (mysqli_query($con, $deleteSubject)) {
        header("Location: ../manage-subjects.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
