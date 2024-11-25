<?php
    include "localhost.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    $usersql = "select email, password from users where email = '$email'";
    
    $sql = mysqli_query($con, $usersql);
    if($sql){
        $row = $sql->fetch_assoc();
        if($row == NULL){
            echo "<br>Wrong Credentials.";
        }

        else{
            $uemail = $row['email'];
            $upassword = $row['password'];
            if($email == $uemail && $password == $upassword){
                echo "<br>Successfully logged in.";
            }

            else{
                echo "<br>Wrong Credentials";
            }
        }
        
    }
    
    else
        echo "Error";
    
    
?>