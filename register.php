<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIXELSWORD - REGISTER</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="main">
        <div id="logo">
            <img src="assets/img/logo2.png" alt="logo">
        </div>
        <div id="content" class="center">
            <div class="actualLogin">
                <div class="login-box">
                    <p class="loginText">Rejestracja</p>
                    <form method="post" action="register.php">
                        <div class="user-box">
                            <input required="" name="username" type="text">
                            <label>Nazwa Użytkownika</label>
                        </div>
                        <div class="user-box">
                            <input required="" name="password" type="password">
                            <label>Hasło</label>
                        </div>
                        <div class="user-box">
                            <input required="" name="password-rep" type="password">
                            <label>Powtórz hasło</label>
                        </div>
                        <div class="user-box">
                            <p>Postać</p> <br>
                            <select class="adminDelSelect" name="character" id="select">
                                <option value="0">--Wybierz postać--</option>
                                <option value="1">Wojownik</option>
                                <option value="2">Łucznik</option>
                                <option value="3">Mag</option>
                            </select>
                        </div><br>
                        <div class="button-div">
                            <input type="submit" class="loginButton" value="Zarejestruj się" name="submit">
                            <input type="button" class="loginButton" value="Powrót" onclick="window.location.href='index.html'">
                        </div>
                        <div class="loginResult">
                            <p>
                                <?php session_start();
                                    if (isset($_SESSION['logged123'])){
                                        header('Location: dashboard.php');
                                        exit();
                                    }
                                    if(isset($_POST["submit"])){
                                        $login = $_POST["username"];
                                        $password = $_POST["password"];
                                        $passwordrep = $_POST["password-rep"];
                                        $character = $_POST["character"];
                                        $connect = mysqli_connect("localhost", "root", "", "pixelsword");
                                        $sql = ("SELECT `login` FROM `users` WHERE login='$login'");
                                        $sql2 = "INSERT INTO `users`(`id`, `login`, `password`, `inteligencja`, `wytrzymalosc`, `sila`, `szczescie`, `level`, `levelpoints`, `klasa`, `PU`, `coin`)
                                         VALUES ('','$login','$password','0','0','0','0','1','0','$character','0','0')";
                                        $result = mysqli_query($connect, $sql);
                                        if(!empty($login) && !empty($password) && !empty($passwordrep) && $character!=0){
                                            if(mysqli_num_rows($result)==0){
                                                if(sha1($password) == sha1($passwordrep)){
                                                    mysqli_query($connect, $sql2);
                                                    echo("Zajerestrowałeś sie!");
                                                }else{
                                                    echo("Hasła są różne");
                                                }
                                            }else{
                                                echo("Taki login juz istnieje!");
                                            }
                                        }else{
                                            echo("Wypełnij wszystkie pola!");
                                        }
                                    }
                                ?>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="footer">
            PIXELSWORD &copy; 2023
        </div>
    </div>
    <div id="loading"><div id="loader"></div></div>
    <script src="assets/js/app.js"></script>
</body>
</html>