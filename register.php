<?php
    include_once 'dbConnection.php';
    ob_start();
    $name     = $_POST['name'];
    $gender   = $_POST['gender'];
    $username = $_POST['username'];
    $phno     = $_POST['phno'];
    $password = $_POST['password'];
    $className   = $_POST['className'];
    $studentId   = $_POST['studentId'];

    $name     = ucwords(strtolower($name));
    $name     = stripslashes($name);
    $name     = addslashes($name);
    $name     = ucwords(strtolower($name));

    $gender   = stripslashes($gender);
    $gender   = addslashes($gender);

    $username = stripslashes($username);
    $username = addslashes($username);

    $phno     = stripslashes($phno);
    $phno     = addslashes($phno);

    $password = stripslashes($password);
    $password = addslashes($password);
    $password = md5($password);

    $q3 = mysqli_query($con, "INSERT INTO user VALUES  (NULL,'$name', '$studentId','$className','$gender' ,'$username' ,'$phno', '$password')");
    
    if ($q3) {
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["name"]     = $name;
        
        header("location:studentDashboard.php?q=1");
    } else {
        header("location:index.php?q7=Username already exists. Please choose another&name=$name&username=$username&gender=$gender&phno=$phno&className=$className&studentId=$studentId");
    }
    ob_end_flush();
?>