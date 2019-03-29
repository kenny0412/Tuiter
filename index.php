<?php session_start();
if (isset($_SESSION['user'])) {
    header('Location: View/dashboard.html ');
}else {
    header('Location: View/login.html');
}
?>