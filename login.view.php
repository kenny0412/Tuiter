<?php include('./Model/login.php');?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style-login.css">
    <link rel="stylesheet" href="./css/general/style-general.css">
    <title>Tuiter</title>
</head>

<body>
    <div id="idLogo">
        <div class="descHomePage">
            <p><i class="icono fas fa-search"></i>Sigue lo que interesa</p>
            <p><i class="icono fas fa-users"></i>Enterate de lo que esta hablando la gente</p>
            <p><i class="icono far fa-comment"></i>Unete a la conversacion</p>
        </div>
    </div>
    <div id="idLogin">
        <div class="form-log">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" id="formlogin" name="formlogin">
                <input type="username" placeholder="Nombre de usuario" class="inp-form" id="username" name="username">
                <input type="password" placeholder="Contraseña" class="inp-form" id="pass" name="pass">
                <button class="btnPrin" (onclick)="formlogin.submit()" type="submit">Ingresar</button>
            </form>
            <?php if(!empty($errores)): ?>
            <div class="divError" id="divErrorLogin">
                        <?php echo $errores;?>
                </div>
        <?php endif;?>
        </div>
        <div class="descHomePage">
        <i class="fab fa-twitter"></i>
            <h1>Descubre lo que está pasando en el mundo en este momento</h1>
            <h2>Únete hoy a tuiter.</h2>
            <button class="btnPrin" onclick="location='View/login_register.view.php'">Registrarse</button>
        </div>
    </div>
    <footer class=" footer ">
        <p>©Kenny Cardenas Reyes, Annette Yuliana Navarro Picado,2019</p>
    </footer>
</body>

</html>