<?php

    session_start();
    session_destroy();
    unset($_SESSION['sapid']);
    unset($_SESSION['cpfno']);
    unset($_SESSION['name']);
    unset($_SESSION['mobileno']);
    unset($_SESSION['email']);
    unset($_SESSION['emp_id']);
    header("location:index.php");
    ?>