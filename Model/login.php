<?php session_start();

include('connection.php');
    $mail="";
    $connection->set_charset("utf8");
    $errores = "";
    if (!$connection) {
        $errores = "Error al conectar en base de datos";
    }else {  
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $username = filter_var(strtolower($_POST['username']));
            $password = filter_var(strtolower($_POST['pass']));
        }
        $errores = '';
        $enviado = '';
        if (empty($username) or empty($password)) {
            $errores .= 'Por favor rellena todos los espacios <br>';
        }else{
            $sql = "SELECT * FROM users WHERE username = '$username' and pass = '$password'  LIMIT 1";
            $result = $connection->query($sql);
            $mail = $username;
            // valida que el email y contrasena sea de un usuario
            if($result->num_rows == 0){
                $errores .= 'Email o contraseña incorrectos <br>';
            }else{
                // Ingresar el usuario ya validado
                            if (!$errores) {
                                    if ($sql) {
                                        $_SESSION['username'] = $mail;
                                        header('location:http://localhost/Proyecto%20Ambiente%20Web%20Cliente/View/dashboard.php');
                                    }else{
                                        $errores = 'El usuario no se pudo logear';
                                    }
                                }
            }
            }
        }
?>