<?php
session_start();
session_destroy();
header("Location: login.php");//use for page redirection
?>