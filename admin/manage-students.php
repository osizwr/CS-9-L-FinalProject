<?php
include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['userRole'] !== 'Admin') {
    // Redirect to login if the user is not logged in or is not an admin
    header("Location: ../login.php");
    exit();
}
?>
<head><title>SMS - Manage Students</title></head>
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
                  <a href="manage-students.php">View Students</a>
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
                          <h1>List of Students</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                            <a href="student/add-student.php" class="btn btn-success btn-rounded">Add Student</a>
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
                            <th>Contact No.</th>
                            <th>Corporate Email</th>
                            <th>Year Level</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            include 'student/fetchstudent.php';
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

    <script>
    function deleteStudent(studentID) {
      swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          buttons: {
            cancel: {
              visible: true,
              text: 'No, cancel!',
              className: 'btn btn-danger'
            },
            confirm: {
              text: 'Yes, delete it!',
              className: 'btn btn-success'
            }
          }
        })
        .then((willDelete) => {
          if (willDelete) {
            // Delay the redirection by 2 seconds (2000 ms)
            setTimeout(function() {
              window.location.href = `student/delete-student.php?studentID=${studentID}`;
            }, 1000); // 2 seconds delay
            
            swal("Poof! The student has been deleted!", {
              icon: "success",
              buttons: {
                confirm: {
                  className: 'btn btn-success'
                }
              }
            });
          } else {
            swal("The student is safe!", {
              buttons: {
                confirm: {
                  className: 'btn btn-success'
                }
              }
            });
          }
        });
    }
    </script>
<?php
include 'footer.php';
?>
