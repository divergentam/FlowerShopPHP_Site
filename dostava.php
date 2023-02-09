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

    <title>Dostava</title>
</head>
<body>
    <main>
        <section class="dostava" id="dostava">
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
                    Dostava
                </div>
            </div>
        </section>
    </main>
    <div class="bd-container pp-container2">
        <div class="pp-content1">
            <div class="dostava-icon-div">
                <img class="dostava-icon" src="img/dostava.svg" alt="">
            </div>
            <div class="pp-content1-text dostava-text">
            Hvala vam što ste posetili Flower Shop On-line Store. Mi smo kompanija koja stvara proizvode od sveže rezanog cveća i sigurno i brzo dostavlja na vašu adresu potpuno besplatno.
            </div>
        </div>
    </div>
    <div class="pp-container3">
        <div class="pp-content3">
            <div class="pp-content3-box">
                <p class="pp-content3-title section-subtitle">
                    1. DOSTAVA
                </p>
                <p class="pp-content3-paragraph">
                    U ponudi usluga koje nudi naša cvećara je i dostava cveća na željenu adresu. Dostavu cveća u Nišu vršimo svakog dana od 09:00 do 22:00h (postoji mogućnost dogovora i za drugo vreme dostave cveća ukoliko je porudžbina od danas za sutra). Za narudžbine “danas za danas” cvećara Ivona će izvršiti isporuku u najkraćem mogućem roku u skladu sa objektivnim mogućnostima. Za narudžbine “danas za sutra” (ili drugi datum) isporuka se vrši u vreme dogovoreno sa klijentom, ali zadržavamo pravo da se dostava cveća zbog nepredviđenih okolnosti može izvršiti 30-60 minuta ranije ili kasnije u odnosu na dogovoreno vreme, ali uz prethodno obaveštavanje klijenta o tome. Po izvršenoj dostavi cveća klijent će biti obavešten o tome na način koji mu najviše odgovara (SMS, Viber, e-mail i sl).
                </p>
                <p class="pp-content3-paragraph">
                    Klijent je obavezan da bude dostupan da ga kontaktiramo u vreme kada je dogovorena dostava cveća zbog rešavanja eventualnih komplikacija tokom dostave cveća (složenost lokacije na kojoj se nalazi adresa za dostavu cveća, odsustvo primaoca porudžbine na dogovorenoj adresi, određivanje alternativne adrese za dostavu cveća i dr). Ukoliko u roku od 30 minuta ne možemo stupiti u kontakt sa klijentom, smatraćemo da je dostava cveća izvršena, te ukoliko želi klijent može podići aranžman kod nas u roku od 24 sata od trenutka kada smo ga obavestili o tome.
                </p>
                <p class="pp-content3-paragraph">
                Naši kuriri će se u svakoj situaciji maksimalno potruditi da izvrši dostavu cveća, ali će se u dole navedenim slučajevima ista ipak smatrati izvršenom, a o tome će biti obavešten klijent:
                </p>
                <p class="pp-content3-paragraph">
                    <ul class="dostava-ul">
                        <li>osoba naznačena kao primalac odbija da primi cvetni aranžman</li>    
                        <li>pogrešna adresa i podaci o primaocu</li>
                        <li>primalac se ne nalazi na navedenoj adresi u dogovoreno vreme za dostavu cveća, a nema ni drugih lica (drugi stanari, članovi porodice) kojima bi se uručio cvetni aranžman ili su prisutni ali odbijaju da prime cveće</li>
                    </ul>
                </p>
            </div>
        </div>
    </div>


    <?php
        require_once "footer.php";
    ?>

    <script src="main.js"></script>
</body>
</html>