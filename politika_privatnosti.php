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

    <title>Politika privatnosti</title>
</head>
<body>
    <main>
        <section class="politika_privatnosti" id="politika_privatnosti">
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
                   Politika privatnosti
                </div>
            </div>
        </section>
    </main>
    <div class="bd-container pp-container2">
        <div class="pp-content1">
            <div class="pp-time-icon-div">
                <i class='bx bx-time pp-time-icon '></i>
            </div>
            <div class="pp-content1-text">
                Hvala vam što ste posetili Flower Shop On-line Store. Mi smo kompanija koja stvara proizvode od sveže rezanog cveća. Molimo pročitajte ovu Politiku privatnosti, dajući saglasnost na dokument kako biste dobili dozvolu za korišćenje naših usluga.
            </div>
        </div>
    </div>
    <div class="pp-container3">
        <div class="pp-content2">
            <div class="section-subtitle">
                KAKVE LIČNE PODATKE PRIKUPLJAMO I ZAŠTO IH PRIKUPLJAMO
            </div>
        </div>
        <div class="pp-content3">
            <div class="pp-content3-box">
                <p class="pp-content3-title section-subtitle">
                    1. ZAŠTITA PRIVATNOSTI PODATAKA
                </p>
                <p class="pp-content3-paragraph">
                U ime CVEĆARE Flower shop obavezujemo se da ćemo čuvati privatnost svih naših kupaca. Prikupljamo samo neophodne, osnovne podatke o kupcima/ korisnicima i podatke neophodne za poslovanje i informisanje korisnika u skladu sa dobrim poslovnim običajima i u cilju pružanja kvalitetne usluge. Dajemo kupcima mogućnost izbora uključujući mogućnost odluke da li žele ili ne da se izbrišu sa mailing lista koje se koriste za marketinške kampanje. Svi podaci o korisnicima/kupcima se strogo čuvaju i dostupni su samo zaposlenima kojima su ti podaci nužni za obavljanje posla. Svi zaposleni CVEĆARE Flower shop i poslovni partneri odgovorni su za poštovanje načela zaštite privatnosti.
                </p>
                <p class="pp-content3-paragraph">
                    CVEĆARA Flower shop može ustupiti Vaše podatke (ime, prezime, adresu na koju se roba dostavlja, kontakt telefon osobe koja robu prima) partnerskoj firmi koja u ime CVEĆARE Flower shop za Vaš račun robu dostavlja do željene adrese. Partnerska firma je u obavezi da poštuje poverljivost Vaših podataka.
                </p>
                <p class="pp-content3-paragraph">
                    Nikada i ni na koji način nećemo zloupotrebiti vaše privatne informacije.
                </p>
                <p class="pp-content3-paragraph">
                    Pored navedenih prikupljamo, analiziramo i obrađujemo podatke o proizvodima koje naši posetioci traže i kupuju, kao i o stranicama koje posećuju. Te podatke koristimo da bismo poboljšali ponudu i izgled naših stranica, i omogućili Vam jednostavnije korišćenje, sigurniju i udobniju kupovinu.
                </p>
            </div>
            <div class="pp-content3-box">
                <p class="pp-content3-title section-subtitle">
                    2. ZAŠTITA POVERLJIVIH PODATAKA O TRANSKACIJI
                </p>
                <p class="pp-content3-paragraph">
                    Prilikom unošenja podataka o platnoj kartici, poverljive informacija se prenose putem javne mreže u zaštićenoj (kriptovanoj) formi upotrebom SSL protokola i PKI sistema, kao trenutno najsavremenije kriptografske tehnologije.
                </p>
                <p class="pp-content3-paragraph">
                    Sigurnost podataka prilikom kupovine, garantuje procesor platnih kartica, Banca Intesa ad Beograd, pa se tako kompletni proces naplate obavlja na stranicama banke. Niti jednog trenutka podaci o platnoj kartici nisu dostupni našem sistemu.
                </p>
            </div>
            <div class="pp-content3-box">
                <p class="pp-content3-title section-subtitle">
                    3. SAGLASNOST I PROMENA USLOVA
                </p>
                <p class="pp-content3-paragraph">
                    Korišćenje naših servisa podrazumeva saglasnost korisnika sa navedenom politikom privatnosti i korišćenja kolačića. CVEĆARA Flower shop se obavezuje da će se pridržavati svega navedenog, a sve promene uslova postaju važeće tek nakon objavljivanja na ovoj strani i slanja e-mail obaveštenja svim registrovanim korisnicima.
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