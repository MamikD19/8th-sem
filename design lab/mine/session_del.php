<?php
session_start();
unset($_SESSION['views']);
echo "Views=". $_SESSION['views']; 
?>
