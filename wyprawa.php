<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div id="task-active">
        <?php session_start(); echo("<h1>".$_SESSION["currettitle"]."</h1>") ?>
        <p id="timer"></p>
        <?php 

        if(isset($_GET["link"])){
            switch($_GET["link"]){
                case "wyprawa":
                    echo("<script>$('#timer').hide();</script>");
                    $xp = $_SESSION["curretxp"];
                    $gold =$_SESSION["curretgold"];
                    $connect = @new mysqli("localhost", "root", "", "pixelsword");
                    $sql = "SELECT items.extras FROM `ekwipunek` INNER JOIN items ON ekwipunek.id_item = items.id WHERE ekwipunek.id_user=".$_SESSION["id"]."";
                    $result = mysqli_query($connect, $sql);
                    while($row = mysqli_fetch_row($result)){
                        $check = $row[0];
                        switch($check){
                            case "15% Golda":
                                $gold = $gold + $gold*0.15;
                                break;
                            case "15 % XP":
                                $xp = $xp + $xp*0.15;
                                break;
                        }
                    }
                    if($_SESSION["task"] == true){
                        $sql1 = "UPDATE `users` SET `levelpoints`=levelpoints+$xp, `coin`=coin+$gold WHERE id=".$_SESSION["id"]."";
                        mysqli_query($connect, $sql1);
                    }
                    $sql2 = "SELECT `lvlpoint` FROM `lvlcfg` WHERE lvl = ". $_SESSION["lvl"]."";
                    $result2 = mysqli_query($connect, $sql2);
                    $lvlfetch = mysqli_fetch_row($result2);

                    $sql3 = "SELECT `levelpoints` FROM `users` WHERE id=".$_SESSION["id"]."";
                    $result3 = mysqli_query($connect, $sql3);
                    $lvlpoints = mysqli_fetch_row($result3);

                    if($lvlpoints[0] >= $lvlfetch[0]){
                        $points = $lvlpoints[0] - $lvlfetch[0];
                        $sql4 = "UPDATE `users` SET `level`=level+1,`levelpoints`='".$points."' WHERE id=".$_SESSION["id"]."";
                        mysqli_query($connect, $sql4);
                    }

                    echo('
                    <div id="drop">
                    <div class="drop-title">
                        <h2>Łupy</h2>
                    </div>
                    <div class="drop-left">
                        <img src="assets/img/coin.png" alt="pieniądz" id="coin">
                        <p>'.(int)$gold.'</p>
                    </div>
                    <div class="drop-right">
                        <img src="assets/img/xp.png" alt="xp" id="xp">
                        <p>'.(int)$xp.'</p>
                    </div>
                    <div class="drop-button">
                        <a href="dashboard.php">
                            <input type="button" id="drop-back" value="Powrót">
                        </a>
                    </div>
                </div>
                    ');
                    $_SESSION["task"] = false;
                    break;
            }
        }
        ?>
        
    </div>
    <script>
        window.addEventListener("load", function(){
            let data = new Date(new Date().getTime() + 2000);

            let timer = setInterval(function () {

            let now = new Date().getTime();
            let c = data - now;

            document.getElementById('timer').innerHTML = `Pozostały czas: ${Math.floor((c % (1000 * 60)) / 1000)} sekund`;

            if(c <= 0) {
                clearInterval(timer);
                window.location.href = '?link=wyprawa';
            }
            }, 1000);
        })
    </script>
</body>
</html>