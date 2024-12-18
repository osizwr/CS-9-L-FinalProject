<?php
include 'dbcon.php';

$row = null; // Initialize $row to avoid undefined variable error

if (isset($_GET['id_student'])) {
    $student_id = $_GET['id_student'];

    $sql = "SELECT * FROM students WHERE studentID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Student not found.";
    }
} else {
    echo "No student selected.";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SMS - View > <?php echo isset($row) ? htmlspecialchars($row['lastName'] . ", " . $row['firstName']) : 'N/A'; ?></title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="../../assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
		WebFont.load({
			google: {"families":["Public Sans:300,400,500,600,700"]},
			custom: {"families":["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../../assets/css/kaiadmin.min.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img src="../../assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
						<button class="btn btn-toggle toggle-sidebar">
							<i class="gg-menu-right"></i>
						</button>
						<button class="btn btn-toggle sidenav-toggler">
							<i class="gg-menu-left"></i>
						</button>
					</div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-section">
                <h4 class="text-section">MAIN</h4>
              </li>
              <li class="nav-item">
                <a href="../dashboard.php">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-users"></i>
                  <p>Students</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../manage-students.php">
                        <span class="sub-item">View Students</span>
                      </a>
                    </li>
                    <li>
                        <a href="../manage-st_subjects.php">
                          <span class="sub-item">View Students Subjects</span>
                        </a>
                    </li>
                    <li>
                        <a href="../manage-grades.php">
                          <span class="sub-item">View Students Grades</span>
                        </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a href="../manage-subjects.php">
                  <i class="fas fa-book"></i>
                  <p>Subjects</p>
                </a>
              </li>
              <li class="nav-section">
                <h4 class="text-section">Settings</h4>
              </li>
              <li class="nav-item">
                <a href="#base">
                  <i class="fas fa-user"></i>
                  <p>Edit Profile Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#base">
                  <i class="fas fa-key"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img src="../../assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input type="text" placeholder="Search ..." class="form-control" />
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input type="text" placeholder="Search ..." class="form-control" />
                      </div>
                    </form>
                  </ul>
                </li>
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="../../assets/img/profile.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span> <span class="fw-bold">USER HERE</span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="../../assets/img/profile.jpg"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4>USER HERE</h4>
                            <p class="text-muted">userLogin Here</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">View Personal Information</a>
                        <a class="dropdown-item" href="#">Account Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>

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
                  <a href="../manage-students.php">View</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#"><?php echo isset($row) ? htmlspecialchars($row['lastName'] . ", " . $row['firstName']) : 'N/A'; ?></a>
                </li>
              </ul>
            </div>
            <div class="page-category">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <h1><?php echo isset($row) ? htmlspecialchars($row['lastName'] . ", " . $row['firstName']) : 'N/A'; ?></h1>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h4>Personal Information</h4>
                            <div class="col-sm-4 mb-3">
                                Student ID: <input type="text" class="form-control form-control-user" name="studentID" disabled
                                    value="<?php echo isset($row['studentID']) ? htmlspecialchars($row['studentID']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Last Name: <input type="text" class="form-control form-control-user" name="lastName" disabled
                                    value="<?php echo isset($row['lastName']) ? htmlspecialchars($row['lastName']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-4 mb-3">
                                First Name: <input type="text" class="form-control form-control-user" name="firstName" disabled
                                    value="<?php echo isset($row['firstName']) ? htmlspecialchars($row['firstName']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Date of Birth: <input type="date" class="form-control form-control-user" name="dateofbirth" disabled
                                    value="<?php echo isset($row['dateofbirth']) ? htmlspecialchars($row['dateofbirth']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Department: <input type="text" class="form-control form-control-user" name="department" disabled
                                    value="<?php echo isset($row['department']) ? htmlspecialchars($row['department']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Program: <input type="text" class="form-control form-control-user" name="program" disabled
                                    value="<?php echo isset($row['program']) ? htmlspecialchars($row['program']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Year Level: <input type="text" class="form-control form-control-user" name="yearLevel" disabled
                                    value="<?php echo isset($row['yearLevel']) ? htmlspecialchars($row['yearLevel']) : 'N/A'; ?>">
                            </div>
                            <h4>Contact Information</h4>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Contact Number: <input type="text" class="form-control form-control-user" name="contactNo" disabled
                                    value="<?php echo isset($row['contactNo']) ? htmlspecialchars($row['contactNo']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-6 mb-3">
                                Corporate Email: <input type="text" class="form-control form-control-user" name="email" disabled
                                    value="<?php echo isset($row['email']) ? htmlspecialchars($row['email']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Street: <input type="text" class="form-control form-control-user" name="street" disabled
                                    value="<?php echo isset($row['street']) ? htmlspecialchars($row['street']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Barangay: <input type="text" class="form-control form-control-user" name="barangay" disabled
                                    value="<?php echo isset($row['barangay']) ? htmlspecialchars($row['barangay']) : 'N/A'; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                City/Province: <input type="text" class="form-control form-control-user" name="cityProvince" disabled
                                    value="<?php echo isset($row['city_province']) ? htmlspecialchars($row['city_province']) : 'N/A'; ?>">
                            </div>
                            <h4>Academic Information</h4>
                            <div class="col-sm-6 mb-3">
                                Subjects Enrolled:
                                <input type="text" class="form-control form-control-user" name="subject" disabled
                                    value="<?php echo isset($row['subject_1']) ? htmlspecialchars($row['subject_1']) : 'N/A'; ?>"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
