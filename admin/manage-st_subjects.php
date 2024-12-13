<?php
include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['userRole'] !== 'Admin') {
    // Redirect to login if the user is not logged in or is not an admin
    header("Location: ../login.php");
    exit();
}
?>
<head><title>SMS - Manage Student Subjects</title></head>
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
                  <a href="manage-st_subjects.php">View Students Subjects</a>
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
                          <h1>List of Student Subjects</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                            <a href="st_subject/add-st_subject.php" class="btn btn-success btn-rounded">Add Subjects to Student</a>
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
                            <th>Subject Count</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            include 'st_subject/fetchstsubject.php';
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

    <script>
    function deletestsubject(studentID) {
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
              window.location.href = `st_subject/delete-subject.php?studentID=${studentID}`;
            }, 1000); // 2 seconds delay
            
            swal("Poof! The subject has been deleted!", {
              icon: "success",
              buttons: {
                confirm: {
                  className: 'btn btn-success'
                }
              }
            });
          } else {
            swal("The subject is safe!", {
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