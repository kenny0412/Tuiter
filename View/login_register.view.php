<?php include('../Model/register.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style-register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar bg-light">
        <div class="content">
            <ul>
                <li class="nav-item cont-left">
                    <a href="../login.view.php">Login</a>
                </li>
                <li class="nav-item cont-rigth">
                    <button class="btnPrin">Tuitear</button>
                </li>
            </ul>
        </div>
    </nav>
    <div class="box-register">
        <div class="box-header">
            <h3>Crear usuario:</h3>
            <hr>
        </div>
        <div class="box-content">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="login">
                    <input type="text" class="inp-form" name="name" placeholder="Nombre Completo" value="<?php if(!$enviado && isset($name)) echo $name ?>">
                    <input type="text" class="inp-form" name="email" placeholder="Email" value="<?php if(!$enviado && isset($email)) echo $email ?>">
                    <input type="text" class="inp-form" name="nickname" placeholder="Nombre de usuario" value="<?php if(!$enviado && isset($nick)) echo $nick ?>">
                    <input type="password" class="inp-form"  name="password" placeholder="Contraseña" value="<?php if(!$enviado && isset($password)) echo $password ?>">
                    <input type="password" class="inp-form"  name="confirm" placeholder="Confirmar contraseña" value="<?php if(!$enviado && isset($confirm)) echo $confirm ?>"confirm>
                   <div class="center">
                       <button class="btnPrin" type="button" id="back" onclick="location='../login.view.php'" value="<?php if(!$enviado && isset($name)) echo $name ?>">Regresar</button>
                       <button class="btnPrin" type="submit" (onclick)="login.submit()">Acceptar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if(!empty($errores)): ?>
            <div class="divError">
                        <?php echo $errores;?>
                </div>
        <?php endif;?>
        <?php if(!empty($succes)): ?>
            <div class="divSucces">
                        <?php echo $succes;?>
                </div>
        <?php endif;?> 
</body>
</html>