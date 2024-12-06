<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject_id = $_POST['subjectID'];
    $code = $_POST['subjectCode'];
    $name = $_POST['subjectName'];
    $desc = $_POST['subjectDescription'];

    // Prepare the SQL query to update the student's information
    $sql = "UPDATE subjects SET subjectCode = ?, subjectName = ?, subjectDescription = ? WHERE subjectID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssi", $code, $name, $desc, $subject_id);

    if ($stmt->execute()) {
        // Redirect to the manage students page if update is successful
        header("Location: ../manage-subjects.php");
        exit();
    } else {
        echo "Error updating subjects: " . mysqli_error($con);
    }

    // Close the connection
    $stmt->close();
    mysqli_close($con);
}

// Fetch student data for editing
$row = null; // Initialize $row to avoid undefined variable error
if (isset($_GET['id_subject'])) {
    $subject_id = $_GET['id_subject'];

    $sql = "SELECT * FROM subjects WHERE subjectID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $subject_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Subject not found.";
    }
} else {
    echo "No subject selected.";
}

?>