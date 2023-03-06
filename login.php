<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIXELSWORD - LOGIN</title>
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
                    <p class="loginText">Logowanie</p>
                    <form method="post" action="login.php">
                        <div class="user-box">
                            <input required="" name="username" type="text">
                            <label>Nazwa Użytkownika</label>
                        </div>
                        <div class="user-box">
                            <input required="" name="password" type="password">
                            <label>Hasło</label>
                        </div>
                        <div class="button-div">
                            <input type="submit" class="loginButton" value="Zaloguj się" name="submit">
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
                                    $connect = mysqli_connect("localhost", "root", "", "pixelsword");
                                    $sql = ("SELECT users.id, users.login, users.password, character.image FROM `users` INNER JOIN `character`
                                    ON users.klasa = character.id WHERE login='$login' AND password='$password'");
                                    $result = mysqli_query($connect, $sql);
                                    if(!empty($login) && !empty($password)){
                                        if(mysqli_num_rows($result)>0){
                                            $row = mysqli_fetch_row($result);
                                            $_SESSION["id"] = $row[0];
                                            $_SESSION["username"] = $login;
                                            $_SESSION["logged123"] = true;
                                            $_SESSION["avatar"] = $row[3];
                                            header('Location: dashboard.php');
                                            exit();
                                        }else{
                                            echo("Nieprawidłowy login bądz hasło!");
                                        }
                                    }else{
                                        echo("Wypełnij wszystkie pola!");
                                    }
                                    mysqli_close($connect);
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