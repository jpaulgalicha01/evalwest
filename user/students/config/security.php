<?php
    
    session_start();
    
    if(!isset($_SESSION['user_id'])){
        header("Location: ../../index.php");
    }
    
    if(isset($_SESSION['user_id']) && isset($_SESSION['user_type1'])=='sub_admin')
    {
        header("Location: ../../sub_admin/index.php");
    }
    if(isset($_SESSION['user_id']) && isset($_SESSION['user_type1'])=='admin')
    {
        header("Location: ../../admin_user/index.php");
    }

    if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type']=='faculty'
    || isset($_SESSION['user_type']) && $_SESSION['user_type']=='faculty')
    {
        header("Location: ../faculty/index.php");
    }
    if(isset($_SESSION['user_id']) && !isset($_SESSION['user_type']) == "student"){
        header("Location: ../../index.php");
    }
?>