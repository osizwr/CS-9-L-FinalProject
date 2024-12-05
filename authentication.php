<?php
session_start();
include 'dbcon.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Prepare the SQL statement to fetch the user by username
    $stmt = $con->prepare("SELECT * FROM users WHERE userLogin = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $con->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['userPass'])) {
            // Password is correct, store session variables
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['userRole'] = $user['userRole'];

            // Redirect based on the user role
            if ($user['userRole'] === 'Admin') {
                header("Location: admin/dashboard.php"); // Redirect to Admin dashboard
                exit;
            } else {
                header("Location: student/dashboard.php"); // Redirect to Student dashboard
                exit;
            }
        }
    }

    // Invalid credentials
    $_SESSION['error'] = "Invalid username or password.";
    header("Location: login.html"); // Redirect to login page
    exit;
}
?>