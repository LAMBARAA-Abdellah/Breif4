<?php
session_start();
if (!isset($_SESSION['login'])) {
    echo "you are logged out";
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dashbord.css">
</head>

<body style="overflow-x: hidden;">
    <section class="navbar">
        <nav>
            <img class="logo" src="img/logo.png" alt="Cabinet">
            <H2>CABINET</H2>
            <div class="log">


                <h1> <?php
                        // session_start();
                        $_SESSION['login'];
                        echo $_SESSION['login'];
                        ?></h1>
                <a href="deconecter.php">
                    <img class="admin" src="img/icon/sign-out-alt-solid.svg" alt="">
                </a>
            </div>
        </nav>
    </section>
    <?php

    require_once 'sql.php';
    $sql = new sql();
    $rep = $sql->countpt()->fetchColumn();
    $cpt = $sql->countdct()->fetchColumn();

    ?>
    <section class="statistique">
        <div class="st">
            <div>
                <img src="img/icon/hospital-user-solid.svg" alt="">
            </div>
            <div class="info">
                <h1>Patients</h1>
                <h2><?php echo $rep ?></h2>
            </div>
        </div>
        <div class="st">
            <div>
                <img src="img/icon/user-md-solid.svg" alt="">
            </div>
            <div class="info">
                <h1>Doctors
                </h1>
                <h2><?php echo $cpt ?></h2>
            </div>
        </div>
        <div class="st">
            <div>
                <img src="img/icon/code-branch-solid.svg" alt="">
            </div>
            <div class="info">
                <h1>Specilty</h1>
                <h2>4</h2>
            </div>
        </div>

    </section>
    <section class="tab">
        <div class="option">
            <div class="search">
                <div class="wrap">
                    <div class="search">
                        <input type="text" class="searchTerm" placeholder="Search">
                        <button type="submit" class="searchButton">
                            Search
                        </button>
                    </div>
                </div>

            </div>
            <div class="add-user">
                <a href="ajouter.php">
                    <button type="submit" class="">

                        Ajouter <img src="img/icon/user-plus-solid.svg" alt="">

                    </button>
                </a>
            </div>

        </div>
        <div class="table">
            <table>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>date naissance</th>
                    <th>telephone</th>
                    <th>email</th>
                    <th>maladie</th>
                    <th>doctor</th>
                    <th colspan="2">Firstname</th>

                </tr>
                <?php
                $i = 0;
                // require 'sql.php';
                $sql = new sql();
                $rep = $sql->aficherpatient();
                while ($l = $rep->fetch()) {
                ?>




                    <tr>
                        <td><?= ++$i; ?></td>
                        <td><?php echo $l['nom_p']; ?></td>
                        <td><?php echo $l['prenom_p']; ?></td>
                        <td><?php echo $l['dateNaissance_p']; ?></td>
                        <td><?php echo $l['tel']; ?></td>
                        <td><?php echo $l['email_p']; ?></td>
                        <td><?php echo $l['maladie']; ?></td>
                        <td><?php echo $l['nom'], " ", $l['prenom']; ?></td>
                        <td style="width: 75px;" class="edit"><a href="modifier.php?id_p=<?= $l['id_p']; ?>"><img src="img/icon/edit-solid.svg" alt=""></a></td>
                        <td style="width: 75px;" class="delete"><a href="delete.php?id_p=<?= $l['id_p']; ?>" data-id=<?= $l['id_p']; ?>><img src="img/icon/trash-alt-solid.svg" alt=""></a></td>


                    </tr>
                <?php
                }
                ?>
            </table>

        </div>


    </section>

    <script>
        const deleteLinks = document.querySelectorAll(".delete a");
        deleteLinks.forEach(link => {
            link.addEventListener("click", (e) => {
                e.preventDefault()
                const id = link.getAttribute("data-id")
                const answer = confirm(`do you really want to remove "${id}"`);
                if (answer) {
                    window.location.href = link.href;
                }
            })
        })
    </script>






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