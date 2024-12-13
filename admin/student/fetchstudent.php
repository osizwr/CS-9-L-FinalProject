<?php
include 'dbcon.php'; // Include your database connection file

// Query to fetch student data
$query = "SELECT studentID, CONCAT(lastName, ', ', firstName) AS fullName, contactNo, email, yearLevel FROM students";

// Prepare and execute the query
$stmt = $con->prepare($query);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Loop through the result set and display the student details
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
            echo "<td>" . $row['studentID'] . "</td>";
            echo "<td>" . $row['fullName'] . "</td>";
            echo "<td>" . $row['contactNo'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['yearLevel'] . "</td>";
            echo "<td>";
            echo "<a href='student/view-student.php?id_student=" . $row['studentID'] . "' class='btn btn-success btn-rounded'>View</a>";
            echo "&nbsp;&nbsp;&nbsp;";
            echo "<a href='student/edit-student.php?id_student=" . $row['studentID'] . "' class='btn btn-primary btn-rounded'>Edit</a>";
            echo "&nbsp;&nbsp;&nbsp;";
            echo '<a onclick="deleteStudent(\'' . $row['email'] . '\')" class="btn btn-danger btn-rounded">Delete</a>';
            echo "</td>";
        echo "</tr>";
    }
} else {
    echo "No students found.";
}

$stmt->close();
?>
