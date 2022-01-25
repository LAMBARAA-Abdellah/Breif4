<?php
$id = $_GET['id_p'];
require_once  'sql.php';
$cnx = new sql();
$prep = $cnx->patient($id);
$l = $prep->fetch();

// var_dump($l);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/modifier.css">

</head>

<body style="overflow-x: hidden;">
    <section class="navbar">
        <nav>
            <img class="logo" src="img/logo.png" alt="Cabinet">
            <H2>CABINET</H2>
            <div class="log">
                <h1>LambaraaAbdellah</h1>
                <img class="admin" src="img/icon/2203549_admin_avatar_human_login_user_icon.png" alt="">
            </div>
        </nav>
    </section>
    <div class="container">

        <section class="modifier">
            <h1>Modifier Patient</h1>
            <form method="POST" action="">
                <div class=" all">

                    <div>
                        <label for="id">Id :</label>
                        <input type="text" id="id" name="id" value="<?= $l['id_p'] ?>" disabled>
                    </div>
                    <div>
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" value="<?= $l['nom_p'] ?>">
                    </div>
                    <div>
                        <label for="name">Prenom :</label>
                        <input type="text" id="p" name="prenom" value="<?= $l['prenom_p'] ?>">
                    </div>
                    <div>
                        <label for="tel">Telephone :</label>
                        <input type="text" id="tel" name="tel" value="<?= $l['tel'] ?>">
                    </div>
                    <div>
                        <label for="email">Email :</label>
                        <input type="text" id="email" name="email" value="<?= $l['email_p'] ?>">
                    </div>
                    <div>
                        <label for="date">Date naissance :</label>
                        <input type="date" id="date" name="date" value="<?= $l['dateNaissance_p'] ?>">
                    </div>
                    <div>
                        <label for="maladie">Maladie :</label>
                        <input type="text" id="maladie" name="maladie" value="<?= $l['maladie'] ?>">
                    </div>
                    <div>
                        <label for=" doctor">Doctor :</label>
                        <!-- <input type="text" id="doctor" name="doctor" value="<?= $l['id'] ?>"> -->
                        <?php
                        include_once 'sql.php';
                        $sql = new sql();
                        $result = $sql->aficherdoctor();
                        $d = $result->fetchAll();
                        // var_dump($l);
                        // var_dump($d);

                        // echo "<br/>";
                        // var_dump($l);
                        ?>

                        <select id="pet-select" name="doctor">
                            <option value="">--Please choose your id</option>
                            <?php foreach ($d as $val) :
                            ?>
                                <option value="<?= $val['id']  ?>" <?= $val["id"] == $l["id"] ? "selected" : "" ?>><?= $val['nom']   ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class=" button">
                    <input class="mod" type="submit" name="modifier" value="modifier" onclick="msg()">
                    <input class="clos" type="submit" name="close" value="close">

                </div>
            </form>
        </section>
        <?php
        if (isset($_POST['modifier'])) {
            $id = $_GET['id_p'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $date = $_POST['date'];
            $maladie = $_POST['maladie'];
            $doctor = $_POST['doctor'];
            $cnx = new sql();
            $prep = $cnx->updatepatient($id, $nom, $prenom, $date, $tel, $email, $maladie, $doctor);

            header("location:dashbord.php");
        }


        ?>

    </div>
    <footer>
        <div class=" footer-content">
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