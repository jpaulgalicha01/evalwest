<?php
    session_start();

    if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_type']))
    {
        header("Location: ../index.php");
    }
    if(isset($_SESSION['user_id']) && !isset($_SESSION['name_user'])){
        header("Location: ../index.php");
    }
    if(isset($_SESSION['user_id']) && $_SESSION['user_type'] ==='admin'){
        header("Location: ../admin_user/index.php");
    }
?>