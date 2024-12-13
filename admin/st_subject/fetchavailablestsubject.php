<?php
include '../dbcon.php';

$query = "SELECT subjectID, subjectName FROM subjects";
$stmt = $con->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<label class="selectgroup-item">
            <input type="checkbox" name="subjects[]" value="' . $row['subjectID'] . '" class="selectgroup-input">
            <span class="selectgroup-button">' . $row['subjectName'] . '</span>
        </label>';
    }
} else {
    echo "No subjects found.";
}

$stmt->close();
?>
