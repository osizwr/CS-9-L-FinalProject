<?php
include 'header.php';
?>
<head><title>SMS - Student Dashboard</title></head>
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Dashboard</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="dashboard.php?studentID=<?php echo $user['studentID']; ?>">Dashboard</a>
                </li>
              </ul>
            </div>
            <div class="page-category"><h1>Welcome to Student Dashboard!</h1></div>
          </div>
        </div>
<?php
include 'footer.php';
?>