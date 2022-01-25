<?php
if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $pass = $_POST['password'];
    require 'sql.php';
    $sql = new sql();
    $rep = $sql->authentifier($login, $pass);
    if ($rep) {
        session_start();
        $_SESSION['login'] = $login;
        header("location:dashbord.php");
    } else {

        header("location:login.php?msg=Impossible de se connecter!informations incorrectes");
    }
}

?>
<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body style="overflow-x: hidden;">
    <section class="navbar">
        <nav>
            <img class="logo" src="img/logo.png" alt="Cabinet">
            <H2>CABINET</H2>

            <img class="admin" src="img/icon/2203549_admin_avatar_human_login_user_icon.png" alt="">

        </nav>

    </section>

    <section class="login">

        <div>
            <img src="img/logo.png" alt="">
        </div>
        <form action="#" method="post">
            <div class="login-box">
                <div class="textbox">
                    <i class="	fa fa-user" aria-hidden="true"></i>
                    <input type="email" placeholder="Email" name="login" value="" required>
                </div>
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="password" value="">
                </div>
                <p style="color: red;"><?php
                                        if (isset($_GET['msg'])) {
                                            echo $_GET['msg'];
                                        } else {
                                            echo "";
                                        }

                                        ?>
                </p>

                <div class="con">
                    <input class="btn" type="submit" name="submit" value="connexion">
                </div>
            </div>
        </form>

    </section>




    <footer>
        <div class="footer-content">
            <div class="logo-footer">
                <img class="logo" src="img/logo.png" alt="Cabinet">
                <h2>CABINET</Hé>
            </div>

            <P>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit, ipsa esse porro quo inventore
                expedita
                dolore doloribus, sint rerum fuga, exercitationem maxime aliquam.</P>
            <ul class="sociales">
                <a href="#"><img src="img/icon/whatsapp-brands.svg" alt=""></a>
                <a href="#"><img src="img/icon/twitter-brands.svg" alt=""></a>
                <a href="#"><img src="img/icon/facebook-f-brands.svg" alt=""></a>
                <a href="#"><img src="img/icon/instagram-brands.svg" alt=""></a>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2022 Cabinet saadi</p>
        </div>
    </footer>
</body>

</html>