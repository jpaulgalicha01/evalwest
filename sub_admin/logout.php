<?php
include 'config/security.php';


session_unset();
session_destroy();
header("Location: ../admin.php");     


?>