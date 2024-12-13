<?php
include 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['userRole'] !== 'Admin') {
    // Redirect to login if the user is not logged in or is not an admin
    header("Location: ../login.php");
    exit();
}
?>
<head><title>SMS - Admin Dashboard</title></head>
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Dashboard</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                    <i class="fas fa-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="dashboard.php?adminID=<?php echo $_SESSION['user']['userLogin']; ?>">Dashboard</a>
                </li>
              </ul>
            </div>
            <div class="page-category"><h1>Welcome to Admin Dashboard!</h1></div>
          </div>
        </div>
<?php
include 'footer.php';
?>