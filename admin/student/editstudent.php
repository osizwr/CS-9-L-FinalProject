<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the values from the form
    $student_id = $_POST['studentID'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $phone = $_POST['contactNo'];
    $email = $_POST['email'];
    $dob = $_POST['dateofbirth'];
    $year_level = $_POST['yearLevel'];

    // Prepare the SQL query to update the student's information
    $sql = "UPDATE students SET studentID = ?, firstName = ?, lastName = ?, contactNo = ?, email = ?, dateofbirth = ?, yearLevel = ? WHERE studentID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssi", $student_id, $firstname, $lastname, $phone, $email, $dob, $year_level, $student_id);

    if ($stmt->execute()) {
        // Redirect to the manage students page if update is successful
        header("Location: ../manage-students.php");
        exit();
    } else {
        echo "Error updating student: " . mysqli_error($con);
    }

    // Close the connection
    $stmt->close();
    mysqli_close($con);
}

// Fetch student data for editing
$row = null; // Initialize $row to avoid undefined variable error
if (isset($_GET['id_student'])) {
    $student_id = $_GET['id_student'];

    $sql = "SELECT * FROM students WHERE studentID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Student not found.";
    }
} else {
    echo "No student selected.";
}

?>