<?php
    include "localhost.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    $usersql = "select userLogin, userPass, userRole from users where userLogin = '$username'";
    
    $sql = mysqli_query($con, $usersql);
    if($sql){
        $row = $sql->fetch_assoc();
        if($row == NULL){
            echo "<br>Wrong Credentials.";
        }

        else{
            $ueusername = $row['userLogin'];
            $upassword = $row['userPass'];
            $urole = $row['userRole'];
            if($username == $ueusername && $password == $upassword){
                echo "<br>Successfully logged in.";
            }
            
                if($urole == 'Admin'){
                    header('Location: admin_dashboard.html'); 
                    exit();
                }elseif($urole == 'Student'){
                    header('Location: student_dashboard.html'); 
                    exit();
                }

            else{
                echo "<br>Wrong Credentials";
            }
        }
        
    }
    
    else
        echo "Error";
    
    
?>