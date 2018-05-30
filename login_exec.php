<?php
session_start();
include("connect.php");

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    $str = @trim($str);
    if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}

//Sanitize the POST values
$username = clean($_POST['username']);
$password = clean($_POST['pass']);

//Create query
$qry = "SELECT * FROM user WHERE sapid='$username' AND password='$password'";
$result = mysql_query($qry);

//Check whether the query was successful or not
if ($result) {
    if (mysql_num_rows($result) > 0) {
        //Login Successful
        session_regenerate_id();
        $member = mysql_fetch_assoc($result);

        $_SESSION['emp_id'] = $member['emp_id'];
        $_SESSION['sapid'] = $member['sapid'];
        $_SESSION['cpfno'] = $member['cpfno'];
        $_SESSION['name'] = $member['name'];
        $_SESSION['mobileno'] = $member['mobileno'];
        $_SESSION['email'] = $member['email'];

        session_write_close();               
        header("location: index.php");
        exit();

    }else {
        //Login failed
        $errmsg_arr[] = 'user name and password not found';
        $errflag = true;
        if ($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location:login.php?id=1");
            exit();
        }
    }
} else {
    die("Query failed");
}
?>