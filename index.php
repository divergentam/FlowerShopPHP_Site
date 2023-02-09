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
    
    <title>Flower Shop</title>
</head>
<body>
    <main>
        <section class="home" id="home">
            <?php 
                if(isset($_SESSION["id"])){
                    require_once "header-log.php";
                }else{
                    require_once "header.php";
                }
            ?>
            <div class="home-container bd-container">
                <?php 
                    if(isset($_SESSION["id"])){
                        require_once "user-log-logged.php";
                    }else{
                        require_once "user-log.php";
                    }
                ?>
                <div class="home-text">
                    <span class="home-title">Bez ljubavi</span>
                    <p class="home-rest"> i ljudi venu kao cvece,</p>
                    <p class="home-rest2">bez obzira na onu staklenu vazu u kojoj stoje</p>
                </div>
            </div>
        </section>
    </main>
    <div class="content1">
        <div class="content1-2-div">
            <div class="content1-text">
                Veliki izbor najluksuznijih buketa, oversize buketa, specijalnih saksijskih cveća i prelpih poklona za nju koji u kombinaciiji sa nekim lepim buketom čine perfektan poklon za svaku priliku.
            </div>
            <div class="content1-button-div">
                <a class="content1-button" href="onlineshop.php">Pogledaj ponudu</a>
            </div>
        </div>
    </div>
    <div class="content1-2">
        <div class="content1-2-div">
            <div class="content1-2-img-div">
                <img class="content1-2-img" src="img/luxury.jpeg" alt="">
                <div class="shadow">
                    <div class="content1-2-tekst">
                        <p>
                            Luksuzni buketi
                        </p>
                    </div>
                </div>
                <div class="shadow-mobile">
                    <p class="content1-2-tekst2">Luksuzni buketi</p>
                </div>
            </div>
            <div class="content1-2-img-div">
                <img class="content1-2-img" src="img/os1.jpg" alt="">
                <div class="shadow">
                    <div class="content1-2-tekst">
                        <p>
                            Oversize buketi
                        </p>
                    </div>
                </div>
                <div class="shadow-mobile">
                        <p class="content1-2-tekst2">Oversize buketi</p>
                </div>
            </div>
            <div class="content1-2-img-div">
                <img class="content1-2-img" src="img/home-wedding.jpeg" alt="">
                <div class="shadow">
                    <div class="content1-2-tekst">
                        <p>
                            Bidermajeri
                        </p>
                    </div>
                </div>
                <div class="shadow-mobile">
                        <p class="content1-2-tekst2">Bidermajeri</p>
                </div>
            </div>
            <div class="content1-2-img-div">
                <img class="content1-2-img" src="img/14.jpg" alt="">
                <div class="shadow">
                    <div class="content1-2-tekst">
                        <p>
                            Pokloni za nju
                        </p>
                    </div>
                </div>
                <div class="shadow-mobile">
                    <p class="content1-2-tekst2">Pokloni za nju</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content2">
        <img class="content2-img" src="img/smile.jpeg" alt="">
    </div>

    <div class="content3-icons">
        <div class="content3-container">
            <div class="content3-possition">
                <center>
                    <div class="content3-color">
                        <img src="img/bezbednost.svg">
                    </div>
                </center>
                <p class="zt">
                    Bezbednost
                </p>
                <p class="ztt">
                    Plaćanje online je
                    osigurano SSL sertifikatom
                </p>
            </div>
            <div class="content3-possition">
                <center>
                    <div class="content3-color">
                        <img src="img/garancija.svg">
                    </div>
                </center>
                <p class="zt">
                    Garancija i povracaj
                </p>
                <p class="ztt">
                    Ukoliko niste zadovoljni nekom od naših usluga nudimo vam povraćaj novca. 
                </p>
            </div>
            <div class="content3-possition">
                <center>
                    <div class="content3-color">
                        <img src="img/dostava.svg">
                    </div>
                </center>
                <p class="zt">
                    Besplatna dostava
                </p>
                <p class="ztt">
                    Svuda na teritoriji Niša
                    za račun preko 1500 din.
                </p>
            </div>
            <div class="content3-possition">
                <center>
                    <div class="content3-color">
                        <img src="img/podrska.svg">
                    </div>
                </center>
                <p class="zt">
                    Korisnička podrška
                </p>
                <p class="ztt">
                    Dostupni smo za vas
                    24/7 za što bolju uslugu.
                </p>
            </div>          
        </div>  
    </div>
    <div class="content4-flowershop">
        <img class="content4-flowershop-img" alt="" src="img/flower shop.jpg">
    </div>

    <?php
        require_once "footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>