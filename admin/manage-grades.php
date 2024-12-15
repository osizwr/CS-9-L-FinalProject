<?php
include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['userRole'] !== 'Admin') {
    // Redirect to login if the user is not logged in or is not an admin
    header("Location: ../login.php");
    exit();
}
?>
<head><title>SMS - Manage Student Grade</title></head>

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Students</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                    <i class="fas fa-graduation-cap"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="manage-students.php">View Students Grades</a>
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
                          <h1>List of Students Grades</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                            <a href="grade/add-grade.php" class="btn btn-success btn-rounded">Add Grades to Student</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                      <table class="table table-striped mt-3 table-responsive">
                        <thead>
                          <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Corporate Email</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            include 'grade/fetchgrade.php';
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
            </div>
          </div>
        </div>

        <footer class="footer">
          <div class="container-fluid">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="http://www.themekita.com"> ThemeKita </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright ms-auto">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">ThemeKita</a>
            </div>
          </div>
        </footer>
      </div>
    </div>
<?php
include 'footer.php';
?>