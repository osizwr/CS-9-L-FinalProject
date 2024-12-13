<?php
include 'header.php';
include '../dbcon.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['userRole'] !== 'Admin') {
    // Redirect to login if the user is not logged in or is not an admin
    header("Location: ../login.php");
    exit();
}

$studentID = (int)$_GET['studentID']; // Assume studentID is passed via GET

// Fetch all available subjects
$allSubjectsQuery = "SELECT subjectID, subjectName FROM subjects";
$allSubjectsStmt = $con->prepare($allSubjectsQuery);
$allSubjectsStmt->execute();
$allSubjectsResult = $allSubjectsStmt->get_result();

// Fetch subjects currently assigned to the student
$assignedSubjectsQuery = "SELECT subjectID FROM studentsubjects WHERE studentID = ?";
$assignedSubjectsStmt = $con->prepare($assignedSubjectsQuery);
$assignedSubjectsStmt->bind_param("i", $studentID);
$assignedSubjectsStmt->execute();
$assignedSubjectsResult = $assignedSubjectsStmt->get_result();

$assignedSubjects = [];
while ($row = $assignedSubjectsResult->fetch_assoc()) {
    $assignedSubjects[] = $row['subjectID']; // Store assigned subject IDs
}

// Display the form
?>
<head><title>SMS - Edit Subjects</title></head>
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Students</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                    <i class="fas fa-book"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="../manage-st_subjects.php">View Students Subjects</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="manage-subjects.php">Add Subjects to Student</a>
                </li>
              </ul>
            </div>
            <div class="page-category">
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                        <div class="col-md-12 row">
                        <div class="col-md-6">
                          <h1>Add Subjects to Student</h1>
                        </div>
                        <div class="col-md-6">
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="editstsubject.php" method="POST">
                        <input type="hidden" name="studentID" value="<?php echo $studentID; ?>">
                        <label for="subjects">Subjects:</label>
                        <div class="selectgroup selectgroup-pills">
                            <?php while ($row = $allSubjectsResult->fetch_assoc()) : ?>
                                <label class="selectgroup-item">
                                    <input 
                                        type="checkbox" 
                                        name="subjects[]" 
                                        value="<?php echo $row['subjectID']; ?>" 
                                        class="selectgroup-input" 
                                        <?php echo (in_array($row['subjectID'], $assignedSubjects)) ? 'checked' : ''; ?>
                                    >
                                    <span class="selectgroup-button"><?php echo $row['subjectName']; ?></span>
                                </label>
                            <?php endwhile; ?>
                        </div>
                        <button type="submit" class="btn btn-success btn-rounded">Update Subjects</button>
                    </form>
                    </div>
                  </div>
                </div>
            </div>
            </div>
          </div>
        </div>

<?php
include 'footer.php';
?>