<?php
session_start();
include "dbcon.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user inputs
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    // Query to fetch user details
    $usersql = "SELECT userLogin, userPass, userRole FROM users WHERE userLogin = '$username'";
    $sql = mysqli_query($con, $usersql);

    if ($sql && mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);

        // Extract details from the database
        $DBusername = $row['userLogin'];
        $DBpassword = $row['userPass']; // Assume this is hashed
        $DBrole = $row['userRole'];

        // Verify password
        if (password_verify($password, $DBpassword)) {
            // Store user details in the session
            $_SESSION['user'] = [
                'userLogin' => $DBusername,
                'userRole' => $DBrole
            ];

            // Redirect based on user role
            if ($DBrole == 'Student') {
                header("Location: student/dashboard.php?studentID=" . urlencode($DBusername));
            } elseif ($DBrole == 'Admin') {
                header("Location: admin/dashboard.php?adminID=" . urlencode($DBusername));
            } else {
                echo "Unknown role.";
            }
            exit();
        } else {
            // Invalid password
            header("Location: login.php?error=Invalid Password");
        }
    } else {
        // User not found
        header("Location: login.php?error=User Not Found");
    }
} else {
    // Invalid request method
    header("Location: login.php");
}
?>
