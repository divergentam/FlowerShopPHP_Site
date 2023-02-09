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

    <title>Uslovi korišćenja</title>
</head>
<body>
    <main>
        <section class="uslovi" id="uslovi">
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
                    Uslovi korišćenja
                </div>
            </div>
        </section>
    </main>
    <div class="bd-container pp-container2">
        <div class="pp-content1">
            <div class="pp-time-icon-div">
                <i class='bx bx-package pp-time-icon' ></i>
            </div>
            <div class="pp-content1-text">
                U našoj cvećari svakim danom možete poručiti veliki broj cvetnih aranžmana za različite prilike (svadbe, privatne proslave, korporativne proslave, rođendane, krštenja i sl). Takođe, možete poručiti bukete, ruže u kutiji, 101 ružu (u korpi, kutiji, buketu i dr.), kao i saksijsko cveće. Ukoliko želite nešto što se trenutno ne nalazi u našoj ponudi kontaktirajte nas da se dogovorimo.            
            </div>
        </div>
    </div>
    <div class="bd-container pp-container2">
        <div class="pp-content3">
            <div class="section-subtitle uslovi-subtitle">
                Poručivanje cveća u našoj cvećari možete izvršiti na više načina:
            </div>
            <p>
                <ul class="dostava-ul">
                    <li>Online putem našeg sajta (dodavanjem proizvoda u korpu, potvrdom porudžbine i popunjavanjem traženih podataka, nakon čega će Vam na e-mail stići potvrda porudžbenice i predračun)</li>
                    <li>Putem naše e-mail adrese (na sve e-mailove odgovaramo u kratkom roku)</li>
                    <li>Telefonskim pozivom na jedan od naših brojeva. Ukoliko zovete iz inostranstva mozete nas kontaktirati i posredstvom aplikacija Viber i Whatsapp na broj +381(064)4685-5215</li>
                    <li>Dolaskom u našu cvećaru</li>
                </ul>
            Za koji god način poručivanja cveća da se odlučite, na nama je da Vaše želje ispunimo na najbolji, najkvalitetniji i najbrži način. Pre preuzimanja ili dostave cveća na adresu neko od naših zaposlenih će Vam poslati fotografiju (Viber, MMS, e-mail) gotove porudžbine kako biste bili sigurni da je u skladu sa Vašim željama.
            </p>
        </div>
    </div>
    <div class="pp-container3">
        <div class="pp-content2">
            <div class="section-subtitle">
                USLOVI SU SLEDEĆI
            </div>
        </div>
        <div class="pp-content3">
            <div class="pp-content3-box">
                <p class="pp-content3-title section-subtitle">
                    1. NAČIN PLAĆANJA
                </p>
                <p>
                    <ol>
                       <li>
                            <p><b>Plaćanje karticom</b> – možete platiti putem Interneta platnim karticama VISA, Maestro ili MasterCard koje podržavaju plaćanje preko Interneta.</p>
                            <p>Prilikom unošenja podataka o platnoj kartici, poverljive informacija se prenose putem javne mreže u zaštićenoj (kriptovanoj) formi upotrebom SSL protokola i PKI sistema, kao trenutno najsavremenije kriptografske tehnologije.</p>
                            <p>Sigurnost podataka prilikom kupovine, garantuje procesor platnih kartica, Banca Intesa ad Beograd, pa se tako kompletni proces naplate obavlja na stranicama banke.</p>
                            <p>Niti jednog trenutka podaci o platnoj kartici nisu dostupni našem sistemu</p>
                            <p>Sva plaćanja biće izvršena u lokalnoj valuti Republike Srbije – dinar (RSD). Za informativni prikaz cena u drugim valutama koristi se srednji kurs Narodne Banke Srbije.</p>
                            <p>Iznos za koji će biti zadužena Vaša platna kartica biće izražen u Vašoj lokalnoj valuti kroz konverziju u istu po kursu koji koriste kartičarske organizacije, a koji nama u trenutku transakcije ne može biti poznat. Kao rezultat ove konverzije postoji mogućnost neznatne razlike od originalne cene navedene na našem sajtu. Hvala Vam na razumevanju.</p>
                            <p>CVEĆARA Flower Shop (pun naziv pravnog lica: Samostalna zanatska cvećarska radnja Flower Shop preduzetnik Niš (Duvanište) nije u sistemu PDV-a.</p>
                            <p></p>
                       </li> 
                       <li>
                        <p>
                            <b>Ostali načini plaćanja</b>- plaćanje možete izvršiti i preko PayPal naloga, pouzećem ili na naš tekući račun prema sledećim instrukcijama: Flower Shop, Vizantijski Bulevar 23, Niš, br. Računa: Banka Intesa 150-895245-36.
                        </p>
                        <p>
                            Prodavac zadržava pravo izmene cena bez prethodnog obavešavanja kupaca, ako nije drugačije navedeno (u slučaju akcija i specijalnih popusta). Cene važe u trenutku kreiranja porudžbine i imaju dejstvo i validnost i za naredni period.
                        </p>
                       </li>
                    </ol>
                </p>
            </div>
            <div class="pp-content3-box">
                <p class="pp-content3-title section-subtitle">
                    2. OTKAZIVANJE PORUDŽBINE
                </p>
                <p class="pp-content3-paragraph">
                    Već naručena porudžbina se može otkazati u razumnom roku pre isporuke kontaktom na e-mail adresu shop@flowershop.rs ili pozivom na broj telefona (064)894-64-72. Ukoliko je porudžbina već plaćena pre otkazivanja novčana sredstva će biti vraćena naručiocu u ukupnom iznosu ili u iznosu koji je umanjen za realne troškove koji su postojali do momenta otkazivanja.
                </p>
            </div>
            <div class="pp-content3-box">
                <p class="pp-content3-title section-subtitle">
                    3. POVRAĆAJ SREDSTAVA
                </p>
                <p class="pp-content3-paragraph">
                    Povraćaja sredstava kupcu koji je prethodno platio nekom od platnih kartica, vrši se delimično ili u celosti, a bez obzira na razlog vraćanja. Flower shop je u obavezi da povraćaj vrši isključivo preko VISA, EC/MC i Maestro metoda plaćanja, što znači da će banka na zahtev prodavca obaviti povraćaj sredstava na račun korisnika kartice.
                </p>
            </div>
            <div class="pp-content3-box">
                <p class="pp-content3-title section-subtitle">
                    4. PRIMEDBE I REKLAMACIJE
                </p>
                <p class="pp-content3-paragraph">
                    Žalbe, reklamacije i primedbe se realizuju slanjem na e-mail adresu shop@flowershop.rs ili pozivom na broj telefona (064)894-64-72.
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