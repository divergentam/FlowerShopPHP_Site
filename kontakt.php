<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Contact us</title>
</head>
<body>
    <main>
        <section class="kontakt" id="kontakt">
            <?php 
                if(isset($_SESSION["id"])){
                    require_once "header-log.php";
                }else{
                    require_once "header.php";
                }
            ?>
            <div class="pp-container bd-container">
                <?php 
                    if(isset($_SESSION["id"])){
                        require_once "user-log-logged.php";
                    }else{
                        require_once "user-log.php";
                    }
                ?>
                <div class="home-text section-title">
                    Kontaktirajte nas
                </div>
            </div>
        </section>
    </main>
    <div class="kontakt-content1">
        
        <div class="lokacija1">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.6617169068204!2d21.920291915448587!3d43.32134047913407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0eb0f8588ed%3A0xe165521979d2fa34!2sVizantijski%20bulevar%2022%2C%20Ni%C5%A1!5e0!3m2!1ssr!2srs!4v1673132807454!5m2!1ssr!2srs" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="adresa">
            <p><b>Ulica i broj: </b> Vizantijski bulevar 22</p>
            <p><b>Grad: </b>Niš</p>
            <p><b>Postanski broj: </b> 18 000</p>
            <p><b>Mobilni telefon: </b> (064)894-64-72</p>
            <p><b>Fiksni telefon: </b> 016/777-777</p>
        </div>
        
    </div>
    <div class="call">
        <div class="vreme">
            <table >
                <caption>Radno vreme</caption>
                <tr>
                    <td class="br">dan</td>
                    <td class="br">vreme</td>
                </tr>
                   
                <tr>
                    <td>ponedeljak</td>
                    <td rowspan="5">09:00 - 21:00</td>
                </tr>

                <tr>
                    <td>utorak</td>
                </tr>

                <tr>
                    <td>sreda</td>
                </tr>

                <tr>
                    <td>četvrtak</td>
                </tr>

                <tr>
                    <td>petak</td>
                </tr>

                <tr>
                    <td>subota</td>
                    <td rowspan="2">10:00 - 20:00</td>
                </tr>

                <tr>
                    <td>nedelja</td>
                </tr>


            </table>
        </div>

        <div class="poziv">
            <div class="piccall">
                <div class="slusalica">
                    <img class="slikacall" alt="call" src="img/phone-call.png">
                </div>
            </div>
            
            <div class="brtel">
                <p class="broj">
                    06456891235
                </p>
            </div>

        </div>
    </div>

    <?php
        require_once "footer.php"
    ?>

    <script src="main.js"></script>
</body>
</html>