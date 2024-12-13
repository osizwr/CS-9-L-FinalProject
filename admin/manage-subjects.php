<?php
include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['userRole'] !== 'Admin') {
    // Redirect to login if the user is not logged in or is not an admin
    header("Location: ../login.php");
    exit();
}
?>
<head><title>SMS - Manage Subjects</title></head>
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Subjects</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                    <i class="fas fa-book"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="manage-subjects.php">Subjects</a>
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
                          <h1>List of Subjects</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                            <a href="subject/add-subject.php" class="btn btn-success btn-rounded">Add Subject</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                      <table class="table table-striped mt-3 table-responsive">
                        <thead>
                          <tr>
                            <th>Subject ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            include 'subject/fetchsubject.php';
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
    function deleteSubject(subjectID) {
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
              window.location.href = `subject/delete-subject.php?subjectID=${subjectID}`;
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
