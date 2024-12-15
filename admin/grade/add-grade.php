<?php
include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['userRole'] !== 'Admin') {
    // Redirect to login if the user is not logged in or is not an admin
    header("Location: ../login.php");
    exit();
}
?>
<head><title>SMS - Add Student Grades</title></head>
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Students</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                    <i class="fas fa-users"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="../manage-students.php">View Students Grade</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="add-student.php">Add Grades to Student</a>
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
                          <h1>Add Grades</h1>
                        </div>
                        <div class="col-md-6">
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php
                    include 'fetchstudent.php';
                    ?>
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