<?php
include '../dbcon.php'; // Include your database connection file

// Query to fetch student data
$query = "SELECT s.studentID, 
        CONCAT(s.lastName, ', ', s.firstName) AS fullName, email,
        COUNT(ss.subjectID) AS subjectCount
    FROM students s
    LEFT JOIN StudentSubjects ss ON s.studentID = ss.studentID
    GROUP BY s.studentID, s.lastName, s.firstName";

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
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['subjectCount'] . "</td>";
            echo "<td>";
            echo "<a href='st_subject/edit-stsubject.php?id_student=" . $row['studentID'] . "' class='btn btn-primary btn-rounded'>Edit</a>";
            echo "&nbsp;&nbsp;&nbsp;";
            echo '<a onclick="deletestsubject(\'' . $row['studentID'] . '\')" class="btn btn-danger btn-rounded">Delete</a>';
            echo "</td>";
        echo "</tr>";
    }
} else {
    echo "No students found.";
}

$stmt->close();
?>
