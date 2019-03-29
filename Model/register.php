<?php session_start();
    include('connection.php');
    if (isset($_SESSION['user'])) {
        header('Location: index.php');
    }
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $name = filter_var(strtolower($_POST['name']),FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $nick = $_POST['nickname'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
    }
    $errores = '';
    if (empty($name) or empty($email) or empty($nick) or empty($password) or empty($confirm)) {
        $errores .= '<li>Por favor rellena todos los espacios<li>';
        echo "<script type=\"text\javasript\">
        document.getElementbyId("error").innerHTML = $errores;
        </script>";
    }else{

    }
?>