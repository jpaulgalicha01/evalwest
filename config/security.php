<?php
ob_start();
  // security for admin and sub_admin
  if(isset($_SESSION['user_id']) && isset($_SESSION['user_type1']) && $_SESSION['user_type1']=='admin')
  {
      ob_end_flush(header("Location: admin_user/index.php"));
  }
  elseif(isset($_SESSION['user_id']) && isset($_SESSION['user_type1']) && $_SESSION['user_type1']=='sub_admin')
  {
     ob_end_flush(header("Location: sub_admin/index.php"));
  }

//   security for user
  if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type']=='Student'
  || isset($_SESSION['user_type']) &&  $_SESSION['user_type']=='student')
  {
      ob_end_flush(header("Location: user/students/index.php"));
  }
  if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type']=='faculty'
  || isset($_SESSION['user_type']) &&  $_SESSION['user_type']=='Full-time Faculty'
  || isset($_SESSION['user_type']) &&  $_SESSION['user_type']=='Part-time Faculty'
  || isset($_SESSION['user_type']) &&  $_SESSION['user_type']=='Program Chair'
  || isset($_SESSION['user_type']) &&  $_SESSION['user_type']=='School Director'
  || isset($_SESSION['user_type']) &&  $_SESSION['user_type']=='Dean of Instruction'
  || isset($_SESSION['user_type']) &&  $_SESSION['user_type']=='Campus Administrator')
  {
    ob_end_flush(header("Location: user/faculty/index.php"));
  }
 
?>