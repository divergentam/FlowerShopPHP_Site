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

    <title>O nama</title>
</head>
<body>
    <main>
        <section class="onama" id="onama">
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
                    Ne postoji tajna uspeha
                </div>
                <div class="section-subtitle onama-text">
                    Uspeh je rezultat pripreme, napornog rada i učenja iz neuspeha. - Colin Powell
                </div>
                <div class="onama-button">
                    <a href="">PORUČITE </a>
                </div>
            </div>
        </section>
    </main>

    <div class="bd-container pp-container2">
        <div class="onama-container">
            <p class="section-title">
                Priča o nama
            </p>
            <p>
            Cvećara Flower Shop je porodična firma koja već 25 godina posluje na čelu industrije cveća i biljaka u Srbiji. Sa radom je počela 1985. godine sa prvom radnjom u ulici Vizantijski Bulevae 22 da bi danas poslovala na ukupno četiri lokacije, Bulevar kralja Aleksandra, Delta Planet, Auto komanda i Forum Shopping Centar.
            </p>
            <div class="onama-content">
                <div class="onama-content1">
                    <div>
                        Pomoću sofisticiranog transportnog pogona cveće mogu dostaviti bilo gde u svetu. Brzo i efikasno! Strast i inovacije uz ogroman asortiman cveća, biljka, ukrasnih materijala i galanterije kompaniju Ivona čine liderom u regionu. Uz konstantno usavršavanje svih ovih godina uspevaju da zadovolje i zadrže svoje kupce
                    </div>
                    <div>
                        <p class="section-subtitle onama-title">Lični kontakt sa kupcem</p>
                        <p>
                            Cvećara Flower Shop sa velikim iskustvom i asortimanom svakodnevno u ponudi ima kvalitetne bukete cveća, rezano i saksijsko cveće i dekorativnu galanteriju za različite povode, poslovne i svečane prilike. Na licu mesta aranžiraju cveće po zahtevu klijenta ili po porudžbini.
                        </p>
                    </div>
                </div>
                <div class="onama-content1">
                    <div>
                        Strast prema dizajnu i usluzi kupcu je ono što cvećare Ivona izdvaja kao premijum brend na domaćem tržištu cvećarstva. Osoblje u radnjama i online je edukovano kako bi posetiocima pružilo jedinstveni doživljaj pružajući, kroz lepezu najraznovrsnijih cvetnih aranžmana i galanterije, vrhunsku uslugu i doživljaj kupovine. U svojim cvećarama, garantuju najkvalitetnije cveće i biljke uz galanteriju i dekorativan asortiman proizvoda koji odgovara željama tržišta.                    </div>
                    <div>
                        <p class="section-subtitle onama-title">Svetski trendovi</p>
                        <p>
                            Prisutni su na domaćim i svetskim sajmovima cveća, a svakog novembra u Amsterdamu.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <hr class="horisontal-line">
    <br>

    <div class="onama-picture">
        <img class="onama-picture-img" src="img/onama.jpeg" alt="">
    </div>

    <?php
        require_once "footer.php";
    ?>

    <script src="main.js"></script>
</body>
</html>