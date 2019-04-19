<?php session_start();
include("connection.php");
if ($_SERVER['REQUEST_METHOD']=='POST') {
$message = filter_var(strtolower($_POST['textTuit']),FILTER_SANITIZE_STRING);
$ema = $_SESSION['username'];
}
$errores = "";
if (!$connection) {
    $errores = "Error al conectar en base de datos";
}else {

    $sql = "SELECT * FROM USERS where email = $ema";
      $result = $connection->prepare($sql);
   
        $sql = "SELECT userId FROM USERS where username = $ema";
        
       

            if(empty($message)){ 
                $errores .= "El mensaje no puede estar vacio";
             } else {
        
        }
    
    }




?>