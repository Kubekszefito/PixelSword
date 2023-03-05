<?php session_start();
    if (!isset($_SESSION['logged123']))
    {
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIXELSWORD - GAME</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div id="conteiner">
        <div id="infos">
            <div id="title">
                <div id="avatar">
                    <?php echo("<img src='assets/img/".$_SESSION["avatar"]."' alt='avatar'>"); ?>
                </div>
                <div id="count">
                    <img src="assets/img/coin.png" alt="pieniądz" id="coin">
                    <p>
                        <?php
                            $connect = @new mysqli("localhost", "root", "", "pixelsword");
                            $sql = "SELECT `coin` FROM `users` WHERE id = ".$_SESSION["id"]."";
                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo($row["coin"]);
                        ?>
                    </p>
                </div>
            </div>
            <div id="folds">
                <div class="folder-item" id="fold1">
                    <p>Wyprawa</p>
                </div>
                <div class="folder-item" id="fold2">
                    <p>Ekwipunek</p>
                </div>
                <div class="folder-item" id="fold3">
                    <p>Zbrojownia</p>
                </div>
                <div class="folder-item logout" onclick="window.location.href = 'logout.php';">
                    <p>Wyloguj sie</p>
                </div>
            </div>
        </div>
        <div id="game">
            <div id="task-con">
                <div class="task-inner">
                    <h1>WYPRAWA</h1>
                    <div id="task-box">
                        <?php
                            $connect = @new mysqli("localhost", "root", "", "pixelsword");
                            $numbers = array();

                            while (count($numbers) < 3) {
                                $random = rand(1, 6);
                                if (!in_array($random, $numbers)) {
                                    $numbers[] = $random;
                                }
                            }

                            foreach ($numbers as $i => $random) {
                                $sql = "SELECT * FROM `task` WHERE id='$random'";
                                $result = mysqli_query($connect, $sql);
                                $row = mysqli_fetch_assoc($result);
                                echo("
                                <div class='task-item'>
                                    <div class='task-title' id='task".($i+1)."'>
                                        <h3>".$row["title"]."</h3>
                                    </div>
                                    <div class='task-discription' id='dis".($i+1)."'>
                                        <div class='discription-title'>
                                            <h3>".$row["boss"]."</h3>
                                            <p>".$row["discription"]."</p>
                                        </div>
                                        <div class='discription-loot'>
                                            <div class='loot-item'>
                                                <img src='assets/img/coin.png' alt='pieniądz' id='coin'>
                                                <p>".$row["coin"]."</p>
                                            </div>
                                            <div class='loot-item'>
                                                <img src='assets/img/xp.png' alt='xp' id='xp'>
                                                <p>".$row["xp"]."</p>
                                            </div>
                                            <div class='loot-item'>
                                                <img src='assets/img/time.png' alt='pieniądz' id='time'>
                                                <p>".$row["time"]."s</p>
                                            </div>
                                        </div>
                                        <div class='discription-button'> 
                                            <form action='index.html' method='post'>
                                                <input type='submit' name='submit' id='task-button' value='Przyjmij'>
                                            </form>
                                        </div>
                                    </div>
                                </div>");
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div id="eq-con">
                <div class="eq-inner">
                    <div id="charakter">
                        <?php
                            $connect = @new mysqli("localhost", "root", "", "pixelsword");
                            $sql = "SELECT * FROM `users` WHERE id = ".$_SESSION["id"]."";
                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo('
                            <div class="charakter-info">
                                <div class="charakter-info-item"><p>Nazwa postaci:</p><p>'$row["login"]'</p></div>
                                <div class="charakter-info-item"><p>Poziom postaci:</p><p>'$row["level"]'lvl</p></div>
                                <div class="charakter-info-item"><p>Klasa postaci:</p><p>Łucznik</p></div>
                            </div>
                            <div class="upgrades">
                                <div class="upgrade-punkt"><p>Dostępne punkty ulepszeń: 1</p></div>
                                <div class="upgrade-item">
                                    <div class="upgrade-info">
                                        <p>Inteligencja</p>
                                        <p>20</p>
                                    </div>
                                    <div class="upgrade-button">
                                        <form action="index.html" method="post">
                                            <input type="submit" name="submit" id="plus" value="+">
                                        </form>
                                    </div>
                                </div>
                                <div class="upgrade-item">
                                    <div class="upgrade-info">
                                        <p>Wytrzymałość</p>
                                        <p>20</p>
                                    </div>
                                    <div class="upgrade-button">
                                        <form action="index.html" method="post">
                                            <input type="submit" name="submit" id="plus" value="+">
                                        </form>
                                    </div>
                                </div>
                                <div class="upgrade-item">
                                    <div class="upgrade-info">
                                        <p>Siła</p>
                                        <p>20</p>
                                    </div>
                                    <div class="upgrade-button">
                                        <form action="index.html" method="post">
                                            <input type="submit" name="submit" id="plus" value="+">
                                        </form>
                                    </div>
                                </div>
                                <div class="upgrade-item">
                                    <div class="upgrade-info">
                                        <p>Szczęście</p>
                                        <p>20</p>
                                    </div>
                                    <div class="upgrade-button">
                                        <form action="index.html" method="post">
                                            <input type="submit" name="submit" id="plus" value="+">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            ')
                        ?>
                    </div>
                    <div id="eq">
                        <div class="item-box">
                            
                        </div>
                        <div class="item-box">

                        </div>
                        <div class="item-box">

                        </div>
                        <div class="item-box">

                        </div>
                        <div class="item-box">

                        </div>
                        <div class="item-box">

                        </div>
                        <div class="item-box">

                        </div>
                        <div class="item-box">

                        </div>
                    </div>
                </div>
            </div>
            <div id="shop-con">
                <div class="shop-inner">
                    <div class="shop-item">
                        <div class="item-img">
                            <img src="assets/img/zlotylancuch.png" alt="pieniądz" id="item-shop">
                        </div>
                        <div class="item-infos">
                            <div class="item-title">
                                <P>Zloty lancuch</P>
                            </div>
                            <div class="item-info">
                                <div class="item-info-price">
                                    <img src="assets/img/coin.png" alt="pieniądz" id="coin">
                                    <p>120</p>
                                </div>
                                <div class="item-info-extras">
                                    <p>+20 golda</p>
                                    <p>+30 xp</p>
                                </div>
                            </div>  
                            <div class="item-buy-button">
                                <form action="index.html" method="post">
                                    <input type="submit" name="submit" id="buy" value="Kup">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="shop-item">
                        <div class="item-img">
                            <img src="assets/img/zlotylancuch.png" alt="pieniądz" id="item-shop">
                        </div>
                        <div class="item-infos">
                            <div class="item-title">
                                <P>Zloty lancuch</P>
                            </div>
                            <div class="item-info">
                                <div class="item-info-price">
                                    <img src="assets/img/coin.png" alt="pieniądz" id="coin">
                                    <p>120</p>
                                </div>
                                <div class="item-info-extras">
                                    <p>+20 golda</p>
                                    <p>+30 xp</p>
                                </div>
                            </div>  
                            <div class="item-buy-button">
                                <form action="index.html" method="post">
                                    <input type="submit" name="submit" id="buy" value="Kup">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="shop-item">
                        <div class="item-img">
                            <img src="assets/img/zlotylancuch.png" alt="pieniądz" id="item-shop">
                        </div>
                        <div class="item-infos">
                            <div class="item-title">
                                <P>Zloty lancuch</P>
                            </div>
                            <div class="item-info">
                                <div class="item-info-price">
                                    <img src="assets/img/coin.png" alt="pieniądz" id="coin">
                                    <p>120</p>
                                </div>
                                <div class="item-info-extras">
                                    <p>+20 golda</p>
                                    <p>+30 xp</p>
                                </div>
                            </div>  
                            <div class="item-buy-button">
                                <form action="index.html" method="post">
                                    <input type="submit" name="submit" id="buy" value="Kup">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="shop-item">
                        <div class="item-img">
                            <img src="assets/img/zlotylancuch.png" alt="pieniądz" id="item-shop">
                        </div>
                        <div class="item-infos">
                            <div class="item-title">
                                <P>Zloty lancuch</P>
                            </div>
                            <div class="item-info">
                                <div class="item-info-price">
                                    <img src="assets/img/coin.png" alt="pieniądz" id="coin">
                                    <p>120</p>
                                </div>
                                <div class="item-info-extras">
                                    <p>+20 golda</p>
                                    <p>+30 xp</p>
                                </div>
                            </div>  
                            <div class="item-buy-button">
                                <form action="index.html" method="post">
                                    <input type="submit" name="submit" id="buy" value="Kup">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="shop-item">
                        <div class="item-img">
                            <img src="assets/img/zlotylancuch.png" alt="pieniądz" id="item-shop">
                        </div>
                        <div class="item-infos">
                            <div class="item-title">
                                <P>Zloty lancuch</P>
                            </div>
                            <div class="item-info">
                                <div class="item-info-price">
                                    <img src="assets/img/coin.png" alt="pieniądz" id="coin">
                                    <p>120</p>
                                </div>
                                <div class="item-info-extras">
                                    <p>+20 golda</p>
                                    <p>+30 xp</p>
                                </div>
                            </div>  
                            <div class="item-buy-button">
                                <form action="index.html" method="post">
                                    <input type="submit" name="submit" id="buy" value="Kup">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="shop-item">
                        <div class="item-img">
                            <img src="assets/img/zlotylancuch.png" alt="pieniądz" id="item-shop">
                        </div>
                        <div class="item-infos">
                            <div class="item-title">
                                <P>Zloty lancuch</P>
                            </div>
                            <div class="item-info">
                                <div class="item-info-price">
                                    <img src="assets/img/coin.png" alt="pieniądz" id="coin">
                                    <p>120</p>
                                </div>
                                <div class="item-info-extras">
                                    <p>+20 golda</p>
                                    <p>+30 xp</p>
                                </div>
                            </div>  
                            <div class="item-buy-button">
                                <form action="index.html" method="post">
                                    <input type="submit" name="submit" id="buy" value="Kup">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="loading"><div id="loader"></div></div>
    <script src="assets/js/app.js"></script>
</body>
</html>