
<?php session_start();
include('../Model/connection.php');
if(isset($_POST['cerrar'])){
session_destroy();
session_unset();
header('location: http://localhost/Proyecto%20Ambiente%20Web%20Cliente/login.view.php');
}

if(isset($_POST['btnTuitPrin'])){
    $user=$_SESSION['username'];
    $mensaje=$_POST['textTuit'];
    $sql = $connection->query("SELECT userId FROM USERS WHERE USERNAME = '$user'");
    while($row = mysqli_fetch_assoc($sql)){
        $id= $row['userId'];
    }
    if(!empty($mensaje)){
        $consulta = "INSERT INTO tuits (message,userId) VALUES('$mensaje', '$id')";
        $connection->query($consulta);
        header("http://localhost/Proyecto%20Ambiente%20Web%20Cliente/View/dashboard.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style-dashboard.css">
    <link rel="stylesheet" href="../css/general/style-general.css">
    <script type="text/javascript" src="../Controller/tuits.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <nav class="navbar bg-light">
        <div class="content">
            <ul>
                <li class="nav-item cont-left">
                    <a href=""><i class="fas fa-home"></i>Inicio</a>
                </li>
                <li class="nav-item cont-rigth">
                <form action="" method="POST">
                    <button class="btnPrin" type="submit" value="cerrar" name="cerrar" id="cerrar">Cerrar Sesion</button>
                </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="perfil cont-left">
                        <?php  
                            echo "<form method='POST' action=''>";
                            echo "<button value='profile' id='profile' name='profile' type='submit'>". $_SESSION['username']."</button>";
                            echo "</form>";
                        ?>

    </div>
    <div class="box-tuit">
        <div class="cont-cent">
        <?php echo $_SESSION['username'];  ?>
        <form action="" method="POST">
            <textarea name="textTuit" placeholder="Que haces?" id="textTuit" maxlength="140"></textarea>
            <button name="btnTuitPrin" id="btnTuitPrin" type="submit">Tuitear</button>
            <!-- <input type="text" class="inp-tuit" placeholder="Que haces?" id="inpTuit"> -->
        </form>
        </div>
    </div>
    <?php include('../Model/show-tuits.php');?>
    
    <!-- <div class="box-tuit">
       <div class="cont-cent">
            <a href="" class="usernameTuit">username</a> <span style='opacity: 0.5'> @  • </span>
            <p id="pResp">Aqui va el Tuit</p>
        </div> 
    </div> -->

</body>

</html>