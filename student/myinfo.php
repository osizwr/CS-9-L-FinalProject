<?php
include 'header.php';
?>
<head><title>SMS - My Personal Info</title></head>
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">My Personal Info</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                    <i class="icon-user"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="myinfo.php">My Personal Info</a>
                </li>
              </ul>
            </div>
            <div class="page-category">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <h1><?php echo isset($user) ? htmlspecialchars($user['lastName'] . ", " . $user['firstName']) : 'N/A'; ?></h1>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h4>Personal Information</h4>
                            <div class="col-sm-4 mb-3">
                                Student ID: <input type="text" class="form-control form-control-user" name="studentID" disabled
                                    value="<?php echo isset($user['studentID']) ? htmlspecialchars($user['studentID']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Last Name: <input type="text" class="form-control form-control-user" name="lastName" disabled
                                    value="<?php echo isset($user['lastName']) ? htmlspecialchars($user['lastName']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-4 mb-3">
                                First Name: <input type="text" class="form-control form-control-user" name="firstName" disabled
                                    value="<?php echo isset($user['firstName']) ? htmlspecialchars($user['firstName']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Date of Birth: <input type="date" class="form-control form-control-user" name="dateofbirth" disabled
                                    value="<?php echo isset($user['dateofbirth']) ? htmlspecialchars($user['dateofbirth']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Department: <input type="text" class="form-control form-control-user" name="department" disabled
                                    value="<?php echo isset($user['department']) ? htmlspecialchars($user['department']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Program: <input type="text" class="form-control form-control-user" name="program" disabled
                                    value="<?php echo isset($user['program']) ? htmlspecialchars($user['program']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Year Level: <input type="text" class="form-control form-control-user" name="yearLevel" disabled
                                    value="<?php echo isset($user['yearLevel']) ? htmlspecialchars($user['yearLevel']) : 'N/A'; ?>">
                            </div>
                            <h4>Contact Information</h4>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Contact Number: <input type="text" class="form-control form-control-user" name="contactNo" disabled
                                    value="<?php echo isset($user['contactNo']) ? htmlspecialchars($user['contactNo']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-6 mb-3">
                                Corporate Email: <input type="text" class="form-control form-control-user" name="email" disabled
                                    value="<?php echo isset($user['email']) ? htmlspecialchars($user['email']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Street: <input type="text" class="form-control form-control-user" name="street" disabled
                                    value="<?php echo isset($user['street']) ? htmlspecialchars($user['street']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Barangay: <input type="text" class="form-control form-control-user" name="barangay" disabled
                                    value="<?php echo isset($user['barangay']) ? htmlspecialchars($user['barangay']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                City/Province: <input type="text" class="form-control form-control-user" name="cityProvince" disabled
                                    value="<?php echo isset($user['city_province']) ? htmlspecialchars($user['city_province']) : 'N/A'; ?>">
                            </div>
                            <h4>Academic Information</h4>
                            <div class="col-sm-6 mb-3">
                                Subjects Enrolled:
                                <input type="text" class="form-control form-control-user" name="subject" disabled
                                    value="<?php echo isset($user['subject_1']) ? htmlspecialchars($user['subject_1']) : 'N/A'; ?>"><br>
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