<?php
include 'dbcon.php';

if (isset($_GET['student_id'])) {
    $studentID = intval($_GET['student_id']);

    // Fetch enrolled subjects for the selected student
    $query = "SELECT ss.studentSubjectID, sub.subjectName
              FROM studentsubjects ss
              JOIN subjects sub ON ss.subjectID = sub.subjectID
              WHERE ss.studentID = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $studentID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Enrolled Subjects</h3>";

        // Fetch available grades from the grades table
        $grades_query = "SELECT gradeID, grade FROM grades";
        $grades_result = $con->query($grades_query);
        $grades_options = "";

        while ($grade_row = $grades_result->fetch_assoc()) {
            $grades_options .= "<option value='{$grade_row['gradeID']}'>{$grade_row['grade']}</option>";
        }

        // Generate the input fields for each subject
        while ($row = $result->fetch_assoc()) {
            $studentSubjectID = $row['studentSubjectID'];
            $subjectName = $row['subjectName'];

            echo "
            <div class='form-group'>
                <label>{$subjectName}</label>
                <input type='hidden' name='studentsubject_ids[]' value='{$studentSubjectID}'>
                <select class='form-control' name='grades[]' required>
                    <option value=''>Select Grade</option>
                    {$grades_options}
                </select>
            </div>
            ";
        }
    } else {
        echo "<p>No subjects enrolled for this student.</p>";
    }

    $stmt->close();
}
?>
