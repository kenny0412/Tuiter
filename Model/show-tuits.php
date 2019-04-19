<?php 
    include('connection.php');
    
    $hay = false;
     $user = $_SESSION['username'];
    if ($connection) {
            if(isset($_POST['profile'])) {
                $sql = "SELECT tuits.tuitId , tuits.timePubli , tuits.message, users.username FROM tuits, users where  tuits.userId= users.userId and  username = '$user'  order by timePubli DESC";
            }else{
                $sql = 'SELECT tuits.tuitId , tuits.timePubli , tuits.message, users.username FROM tuits, users where tuits.userId= users.userId order by timePubli DESC';
                
                
            }
            $result =$connection->query($sql);
            if ($result->num_rows > 0) {
                $hay = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    $fecha=time_passed($row['timePubli']);
                    echo("<div class='box-tuit'> ");
                    echo "<form method='POST' action=''>";
                    // echo "<button class='btnPrin' value='profile' id='profile' name='profile' type='submit'>". $_SESSION['username']."</button>";
                    echo("<a href='' value='profile' id='profile' name='profile'>" .$row['username']."</a>" ."<span style='opacity: 0.5; margin-left: 20px'> @".$row['username']."&nbsp•&nbsp"."&nbsp".$fecha.'</span><br>');
                    echo("<p style='margin: auto;'>".$row['message']."</p><br><br>");                    
                    echo "</form>";
                    echo("</div>");
                }
                }else{
                    console.log("No hay datos");
                }
        } else {
            console.log("Error en la base de datos");
        }



    function time_passed($get_timestamp){

        $timestamp = strtotime($get_timestamp);
        $diff = time() - 28800-(int)$timestamp;
 
        if ($diff == 0) 
             return 'justo ahora';
 
        if ($diff > 604800)
            return date("d M Y",$timestamp);
 
        $intervals = array
        (
            1                   => array('año',    31556926),
            $diff < 31556926    => array('mes',   2628000),
            $diff < 2629744     => array('semana',    604800),
            $diff < 604800      => array('día',     86400),
            $diff < 86400       => array('hora',    3600),
            $diff < 3600        => array('minuto',  60),
            $diff < 60          => array('segundo',  1)
        );
 
        $value = floor($diff/$intervals[1][1]);
        return 'hace '.$value.' '.$intervals[1][0].($value > 1 ? 's' : '');
}

?>

