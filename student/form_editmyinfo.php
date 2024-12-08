<?php
include '../dbcon.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the values from the form
    $student_id = $_POST['studentID'];
    $phone = $_POST['contactNo'];
    $dob = $_POST['dateofbirth'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $cityprovince = $_POST['city_province'];
    // Prepare the SQL query to update the student's information
    $sql = "UPDATE students SET contactNo = ?, street = ?, barangay = ?, city_province = ?, dateofbirth = ? WHERE studentID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssi", $phone, $street, $barangay, $cityprovince, $dob, $student_id);

    if ($stmt->execute()) {
        // Redirect to the manage students page if update is successful
        header("Location: myinfo.php?studentID=$student_id");
        exit();
    } else {
        echo "Error updating student: " . mysqli_error($con);
    }
    // Close the connection
    $stmt->close();
    mysqli_close($con);

}