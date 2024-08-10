<?php
session_start();

if (isset($_GET['id']) && isset($_SESSION['details'][$_GET['id']])) {
    unset($_SESSION['details'][$_GET['id']]);
}

header('Location: index.php');
exit;
?>
