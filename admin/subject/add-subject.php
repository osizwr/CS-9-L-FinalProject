<?php
include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['userRole'] !== 'Admin') {
    // Redirect to login if the user is not logged in or is not an admin
    header("Location: ../../login.php");
    exit();
}
?>
<head><title>SMS - Add Subject</title></head>

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
                  <a href="manage-subjects.php?adminID=<?php echo $_SESSION['user']['userLogin']; ?>">Subjects</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="add-subject.php?adminID=<?php echo $_SESSION['user']['userLogin']; ?>">Add Subject</a>
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
                          <h1>Subject Details</h1>
                        </div>
                        <div class="col-md-6">
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="addsubject.php" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3">
                                        Subject Code:<input type="text" class="form-control form-control-user" id="subjectCode" name="subjectCode"
                                            placeholder="Code" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Subject Name:<input type="text" class="form-control form-control-user" id="subjectName" name="subjectName"
                                            placeholder="Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        Subject Description:<input type="text" class="form-control form-control-user" id="subjectDescription" name="subjectDescription"
                                            placeholder="Description">
                                    </div>
                                </div>
                                <div class="pull-left">
                                    <button type="submit" class="btn btn-success btn-rounded">Add Subject</button>
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