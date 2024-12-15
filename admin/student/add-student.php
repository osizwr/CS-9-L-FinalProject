<?php
include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['userRole'] !== 'Admin') {
    // Redirect to login if the user is not logged in or is not an admin
    header("Location: ../login.php");
    exit();
}
?>
<head><title>SMS - Add Student</title></head>
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
                  <a href="../manage-students.php">View Students</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="add-student.php">Add Student</a>
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
                          <h1>Student Details</h1>
                        </div>
                        <div class="col-md-6">
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="addstudent.php" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3">
                                        <input type="text" class="form-control form-control-user" id="studentID" name="studentID"
                                            placeholder="Student ID" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="firstName" name="firstName"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="lastName" name="lastName"
                                            placeholder="Last Name" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <input type="text" class="form-control form-control-user" id="contactNo" name="contactNo"
                                            placeholder="Contact Number" required>
                                    </div>
                                </div>
                                <div class="pull-left">
                                    <button type="submit" class="btn btn-success btn-rounded">Add Student</button>
                                </div>
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