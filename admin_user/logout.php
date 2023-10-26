<?php
include 'config/security.php';


		session_unset();
		session_destroy();
        ob_end_flush(header("Location: ../index.php"));     


?>