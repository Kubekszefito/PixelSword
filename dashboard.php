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
    <?php session_start();
        if (!isset($_SESSION['logged123']))
        {
            header('Location: login.php');
            exit();
        }
    ?>
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
                            $sql = "SELECT `coin`, `level` FROM `users` WHERE id = ".$_SESSION["id"]."";
                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo($row["coin"]);
                            $_SESSION["coin"] = $row["coin"];
                            $_SESSION["lvl"] = $row["level"];
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
                            $numbers = array();

                            for ($i = 0; $i < 3; $i++) {
                                do {
                                    $random = rand(1, 6);
                                } while (in_array($random, $numbers));
                                $numbers[] = $random;
                                $sql = "SELECT * FROM `task` WHERE id='$random'";
                                $sql1 = "SELECT * FROM `taskcfg` WHERE lvl = ".$_SESSION["lvl"]."";
                                $result = mysqli_query($connect, $sql);
                                $result1 = mysqli_query($connect, $sql1);
                                $row = mysqli_fetch_assoc($result);
                                $row1 = mysqli_fetch_assoc($result1);
                                $gold = rand($row1["goldmin"], $row1["goldmax"]);
                                $xp = rand($row1["xpmin"], $row1["xpmax"]);
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
                                                <p>".$gold."</p>
                                            </div>
                                            <div class='loot-item'>
                                                <img src='assets/img/xp.png' alt='xp' id='xp'>
                                                <p>".$xp."</p>
                                            </div>
                                            <div class='loot-item'>
                                                <img src='assets/img/time.png' alt='pieniądz' id='time'>
                                                <p>".$row1["time"]."s</p>
                                            </div>
                                        </div>
                                        <div class='discription-button'> 
                                            <form action='dashboard.php' method='post'>
                                                <input type='hidden' name='xp' value='".$xp."'>
                                                <input type='hidden' name='gold' value='".$gold."'>
                                                <input type='hidden' name='title' value='".$row["title"]."'>
                                                <input type='submit' name='submit-task' id='task-button' value='Przyjmij'>
                                            </form>
                                        </div>
                                    </div>
                                </div>");
                            }
                            if(isset($_POST["submit-task"])){
                                $_SESSION["curretxp"] = $_POST["xp"];
                                $_SESSION["curretgold"] = $_POST["gold"];
                                $_SESSION["currettitle"] = $_POST["title"];
                                $_SESSION["task"] = true;
                                echo("<script>window.location.href = '?link=wyprawa';</script>");
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div id="eq-con">
                <div class="eq-inner">
                    <div id="charakter">
                        <?php
                            $sql = "SELECT users.login, users.inteligencja, users.wytrzymalosc, users.sila,
                             users.szczescie, users.level, users.levelpoints, users.PU, character.title
                             FROM `users` INNER JOIN `character` ON users.klasa = character.id WHERE users.id=".$_SESSION["id"]."";
                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_row($result);
                            echo('
                            <div class="charakter-info">
                                <div class="charakter-info-item"><p>Nazwa postaci:</p><p>'.$row[0].'</p></div>
                                <div class="charakter-info-item"><p>Poziom postaci:</p><p>'.$row[5].' lvl</p></div>
                                <div class="charakter-info-item"><p>Klasa postaci:</p><p>'.$row[8].'</p></div>
                            </div>
                            <div class="upgrades">
                                <div class="upgrade-punkt"><p>Dostępne punkty ulepszeń: '.$row[7].'</p></div>
                                <div class="upgrade-item">
                                    <div class="upgrade-info">
                                        <p>Inteligencja</p>
                                        <p>'.$row[1].'</p>
                                    </div>
                                    <div class="upgrade-button">
                                        <form action="dashboard.php" method="post">
                                            <input type="hidden" name="option" value="inteligencja">
                                            <input type="submit" name="submit-upgrade" id="plus" value="+">
                                        </form>
                                    </div>
                                </div>
                                <div class="upgrade-item">
                                    <div class="upgrade-info">
                                        <p>Wytrzymałość</p>
                                        <p>'.$row[2].'</p>
                                    </div>
                                    <div class="upgrade-button">
                                        <form action="dashboard.php" method="post">
                                            <input type="hidden" name="option" value="wytrzymalosc">
                                            <input type="submit" name="submit-upgrade" id="plus" value="+">
                                        </form>
                                    </div>
                                </div>
                                <div class="upgrade-item">
                                    <div class="upgrade-info">
                                        <p>Siła</p>
                                        <p>'.$row[3].'</p>
                                    </div>
                                    <div class="upgrade-button">
                                        <form action="dashboard.php" method="post">
                                            <input type="hidden" name="option" value="sila">
                                            <input type="submit" name="submit-upgrade" id="plus" value="+">
                                        </form>
                                    </div>
                                </div>
                                <div class="upgrade-item">
                                    <div class="upgrade-info">
                                        <p>Szczęście</p>
                                        <p>'.$row[4].'</p>
                                    </div>
                                    <div class="upgrade-button">
                                        <form action="dashboard.php" method="post">
                                            <input type="hidden" name="option" value="szczescie">
                                            <input type="submit" name="submit-upgrade" id="plus" value="+">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            ');
                            if(isset($_POST["submit-upgrade"])){
                                $action = $_POST["option"];
                                if($row[7] > 0){
                                    $sql2 = "UPDATE `users` SET PU=PU-1 WHERE id=".$_SESSION["id"]."";
                                    $sql3 = "UPDATE `users` SET $action=$action+1 WHERE id=".$_SESSION["id"]."";
                                    mysqli_query($connect, $sql2);
                                    mysqli_query($connect, $sql3);
                                    echo("<script>window.location.href = '?link=ekwipunek';</script>");
                                }else{
                                    echo("<script>window.location.href = '?link=ekwipunek';</script>");
                                }
                            }
                        ?>
                    </div>
                    <div id="eq">
                        <?php
                            $sql = "SELECT ekwipunek.id, items.image FROM `ekwipunek` INNER JOIN `items` ON ekwipunek.id_item = items.id WHERE ekwipunek.id_user=".$_SESSION["id"]."";
                            $result = mysqli_query($connect, $sql);
                            $count = 0;
                            while($row = mysqli_fetch_row($result)){
                                echo('
                                <div class="item-box">
                                    <img src="assets/img/'.$row[1].'" alt="item" id="item-eq">
                                </div>  
                                ');
                                $count++;
                            }
                            for($count; $count<6; $count++){
                                echo('<div class="item-box"></div>');
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div id="shop-con">
                <div class="shop-inner">
                    <?php
                        $sql = "SELECT * FROM `items`";
                        $result = mysqli_query($connect, $sql);
                        if (isset($_POST["submit-buy"])) {
                            $itemid = (int) $_POST["item-id"];
                            $userId = (int) $_SESSION["id"];
                        
                            $sql1 = "SELECT `id_user`, `id_item` FROM `ekwipunek` WHERE `id_user` = $userId AND `id_item` = $itemid";
                            $result1 = mysqli_query($connect, $sql1);
                        
                            if (mysqli_num_rows($result1) > 0) {
                                echo "<script>$('#task-con, #eq-con').hide(); $('#shop-con').show();</script>";
                                echo "<script>alert('Nie możesz kupić tego przedmiotu')</script>";
                            } else {
                                $sql2 = "SELECT `price` FROM `items` WHERE `id` = $itemid";
                                $result2 = mysqli_query($connect, $sql2);
                                $itemPrice = mysqli_fetch_assoc($result2)['price'];
                        
                                if ($_SESSION["coin"] >= $itemPrice) {
                                    $sql3 = "INSERT INTO `ekwipunek`(`id_user`, `id_item`) VALUES ($userId, $itemid)";
                                    mysqli_query($connect, $sql3);
                        
                                    $sql4 = "UPDATE `users` SET `coin` = `coin` - $itemPrice WHERE `id` = $userId";
                                    mysqli_query($connect, $sql4);
                        
                                    echo "<script>window.location.href = '?link=zbrojownia';</script>";
                                } else {
                                    echo "<script>$('#task-con, #eq-con').hide(); $('#shop-con').show();</script>";
                                    echo "<script>alert('Nie możesz kupić tego przedmiotu')</script>";
                                }
                            }
                        }
                        
                        while($row = mysqli_fetch_row($result)){
                            echo('
                            <div class="shop-item">
                                <div class="item-img">
                                    <img src="assets/img/'.$row[2].'" alt="item" id="item-shop">
                                </div>
                                <div class="item-infos">
                                    <div class="item-title">
                                        <p>'.$row[1].'</p>
                                    </div>
                                    <div class="item-info">
                                        <div class="item-info-price">
                                            <img src="assets/img/coin.png" alt="pieniądz" id="coin">
                                            <p>'.$row[3].'</p>
                                        </div>
                                        <div class="item-info-extras">
                                            <p>'.$row[4].'</p>
                                        </div>
                                    </div>  
                                    <div class="item-buy-button">
                                        <form action="dashboard.php" method="post">
                                            <input type="hidden" name="item-id" value="'.$row[0].'"> 
                                            <input type="submit" name="submit-buy" id="buy" value="Kup">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            ');
                        }
                        if(isset($_GET["link"])){
                            switch($_GET["link"]){
                                case "ekwipunek":
                                    echo("<script> $('#task-con').hide(); $('#shop-con').hide(); $('#eq-con').show(); </script>");
                                    break;
                                case "zbrojownia":
                                    echo("<script>$('#task-con').hide(); $('#eq-con').hide(); $('#shop-con').show();</script>");
                                    break;
                                case "wyprawa":
                                    if($_SESSION["task"]){
                                        header("Location: wyprawa.php");
                                    }
                                    break;
                            }
                        }
                        mysqli_close($connect);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="loading"><div id="loader"></div></div>
    <script src="assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>
</html>