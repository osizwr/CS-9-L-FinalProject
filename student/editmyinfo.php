<?php
include 'header.php';
?>
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
                  <a href="#">Edit</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#"><?php echo isset($user) ? htmlspecialchars($user['lastName'] . ", " . $user['firstName']) : ''; ?></a>
                </li>
              </ul>
            </div>
            <div class="page-category">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <h1><?php echo isset($user) ? htmlspecialchars($user['lastName'] . ", " . $user['firstName']) : ''; ?></h1>
                            </div>
                        </div>
                        <form action="form_editmyinfo.php" method="POST" class="user">
                        <div class="form-group row">
                            <h4>Personal Information</h4>
                            <div class="col-sm-4 mb-3">
                                <input type="hidden" name="studentID" value="<?php echo isset($user['studentID']) ? $user['studentID'] : ''; ?>">
                                Student ID: <input type="text" class="form-control form-control-user" name="studentIDfake" disabled
                                    value="<?php echo isset($user['studentID']) ? htmlspecialchars($user['studentID']) : ''; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Last Name: <input type="text" class="form-control form-control-user" name="lastName" disabled
                                    value="<?php echo isset($user['lastName']) ? htmlspecialchars($user['lastName']) : ''; ?>">
                            </div>
                            <div class="col-sm-4 mb-3">
                                First Name: <input type="text" class="form-control form-control-user" name="firstName" disabled
                                    value="<?php echo isset($user['firstName']) ? htmlspecialchars($user['firstName']) : ''; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Date of Birth: <input type="date" class="form-control form-control-user" name="dateofbirth"
                                    value="<?php echo isset($user['dateofbirth']) ? htmlspecialchars($user['dateofbirth']) : ''; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Department: <input type="text" class="form-control form-control-user" name="department" disabled
                                    value="<?php echo isset($user['department']) ? htmlspecialchars($user['department']) : ''; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Program: <input type="text" class="form-control form-control-user" name="program" disabled
                                    value="<?php echo isset($user['program']) ? htmlspecialchars($user['program']) : ''; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Year Level: <input type="text" class="form-control form-control-user" name="yearLevel" disabled
                                    value="<?php echo isset($user['yearLevel']) ? htmlspecialchars($user['yearLevel']) : ''; ?>">
                            </div>
                            <h4>Contact Information</h4>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Contact Number: <input type="text" class="form-control form-control-user" name="contactNo"
                                    value="<?php echo isset($user['contactNo']) ? htmlspecialchars($user['contactNo']) : ''; ?>">
                            </div>
                            <div class="col-sm-6 mb-3">
                                Corporate Email: <input type="text" class="form-control form-control-user" name="email" disabled
                                    value="<?php echo isset($user['email']) ? htmlspecialchars($user['email']) : ''; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Street: <input type="text" class="form-control form-control-user" name="street"
                                    value="<?php echo isset($user['street']) ? htmlspecialchars($user['street']) : ''; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Barangay: <input type="text" class="form-control form-control-user" name="barangay"
                                    value="<?php echo isset($user['barangay']) ? htmlspecialchars($user['barangay']) : ''; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                City/Province: <input type="text" class="form-control form-control-user" name="city_province"
                                    value="<?php echo isset($user['city_province']) ? htmlspecialchars($user['city_province']) : ''; ?>">
                            </div>
                            <h4>Academic Information</h4>
                            <div class="col-sm-6 mb-3">
                                Subjects Enrolled:
                                <input type="text" class="form-control form-control-user" name="subject" disabled
                                    value="<?php echo isset($user['subject_1']) ? htmlspecialchars($user['subject_1']) : ''; ?>"><br>
                            </div>
                            <div class="pull-left">
                                    <button type="submit" class="btn btn-success btn-rounded">Update My Info</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
<?php
include 'footer.php';
?>