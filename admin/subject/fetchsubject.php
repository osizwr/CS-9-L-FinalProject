<?php
include 'dbcon.php'; // Include your database connection file

// Query to fetch student data
$query = "SELECT * FROM subjects";

// Prepare and execute the query
$stmt = $con->prepare($query);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Loop through the result set and display the student details
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
            echo "<td>" . $row['subjectID'] . "</td>";
            echo "<td>" . $row['subjectCode'] . "</td>";
            echo "<td>" . $row['subjectName'] . "</td>";
            echo "<td class='col-sm-4'>" . $row['subjectDescription'] . "</td>";
            echo "<td>";
            echo "<a href='subject/edit-subject.php?id_subject=" . $row['subjectID'] . "' class='btn btn-primary btn-rounded'>Edit</a>";
            echo "&nbsp;&nbsp;&nbsp;";
            echo '<a onclick="deleteSubject(\'' . $row['subjectID'] . '\')" class="btn btn-danger btn-rounded">Delete</a>';
            echo "</td>";
        echo "</tr>";
    }
} else {
    echo "No Subject Found.";
}

$stmt->close();
?>
