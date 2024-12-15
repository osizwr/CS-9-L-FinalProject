<?php
                        include 'dbcon.php';

                        // Fetch all students
                        $students_query = "SELECT studentID, CONCAT(firstName, ' ', lastName) AS fullName FROM students";
                        $students_result = $con->query($students_query);
                        ?>

                        <!-- Student Selection Form -->
                        <form id="studentForm" method="post" action="addgrade.php">
                            <h2>Select Student</h2>
                            <div class="form-group">
                                <label for="student">Choose a student:</label>
                                <select id="student" name="student_id" class="form-control" required>
                                    <option value="">Select a student</option>
                                    <?php
                                    while ($row = $students_result->fetch_assoc()) {
                                        echo "<option value='{$row['studentID']}'>{$row['fullName']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div id="subjectsContainer">
                                <?php include 'fetchsubject.php'; ?>
                            </div>

                            <button type="submit" class="btn btn-success btn-rounded" style="display: none;" id="submitGrades">Submit Grades</button>
                        </form>

                        <script>
                            document.getElementById('student').addEventListener('change', function () {
                                const studentID = this.value;

                                if (studentID) {
                                    fetch(`fetchsubject.php?student_id=${studentID}`)
                                        .then(response => response.text())
                                        .then(html => {
                                            document.getElementById('subjectsContainer').innerHTML = html;
                                            document.getElementById('submitGrades').style.display = 'block';
                                        });
                                } else {
                                    document.getElementById('subjectsContainer').innerHTML = '';
                                    document.getElementById('submitGrades').style.display = 'none';
                                }
                            });
                        </script>