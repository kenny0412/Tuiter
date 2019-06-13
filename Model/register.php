<?php 
    include('connection.php');
    if (isset($_SESSION['user'])) {
        header('Location: index.php');
    }
    if ($connection) {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $name = filter_var(strtolower($_POST['name']),FILTER_SANITIZE_STRING);
            $email = $_POST['email'];
            $nick = $_POST['nickname'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
        }
        $errores = '';
        $enviado = '';
        if (empty($name) or empty($email) or empty($nick) or empty($password) or empty($confirm)) {
            $errores .= 'Por favor rellena todos los espacios <br>';
        }else{
            // valida que el email no este repetido
            $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

            $result = $connection->query($sql);
            // valida que el nickname no este repetido
            $stat ="SELECT * FROM users WHERE username = '$nick' LIMIT 1";
            $nickname=$connection->query($stat);
    
            if($result ->num_rows > 0){
                $errores .= 'El email ya existe. <br>';
            }
            if ($nickname ->num_rows > 0) {
                $errores .= 'El nombre de usuario ya existe. <br>';
            }
            if ($password != $confirm) {
                $errores .= 'Las contraseñas deben de ser iguales';
            }
            // Insertar el usuario ya validado
            if (!$errores) {
                $sql = $connection->query("INSERT INTO USERS (fullname,username,email,pass) 
                VALUES ('$name','$nick','$email','$password')");
                    if ($sql && $connection) {
                    
    
                    if ($sql) {
                        $succes = 'El usuario ha sido creado';
                    }else{
                        $errores = 'El usuario no ha sido creado';
                    }
                }
                $enviado = true;
            }
        }
    } else {
       $errores = "Error en la base de datos";
    }
    
?>