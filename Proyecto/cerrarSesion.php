<?php
session_start();
unset ($SESSION['email']);
session_destroy();
header('Location: http://localhost/Proyecto/Proyecto/login.php');
?>