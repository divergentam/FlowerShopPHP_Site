<?php
// ne koristimo required za inout polje jer to ne radi u svim browserima
    require_once "classes/database.php";
    require_once "classes/logup.php";    

    if(isset($_SESSION["id"])){
        header("location:index.php");
    }

    $login = new Login();
 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username_email"];
        $password = $_POST["password"];
        $result = $login->login($username, $password);

        if($result == 1){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $login->getId();
            header("location:index.php");
        }elseif($result == 10){
            echo "<script>alert('User sifra nije tacna')</script>";
        }elseif($result == 100){
            echo "<script>alert('Nije pronadjen korisnik sa tim imenom. Molimo Vas registrujte se!')</script>";
        }
    }
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
    <title>Prijavi se</title>
</head>
<body>
    <main>
        <section class="registruj" id="registruj">
            <?php
                require_once "header.php"
            ?>
            <div class="pp-container bd-container">
                <?php
                    require_once"user-log.php";
                ?>
                <div class="home-text section-title">
                    Prijavi se
                </div>
            </div>
        </section>
    </main>
    <div class="register-continer">
        <form class="register-form" action="" method="post"> 
            <p>
                <input class="box" type="tekst" name="username_email" placeholder="Username/email">
            </p>
            <p>
                <input class="box" type="password" name="password" placeholder="password">
            </p>
            <p  class="paragraf-button">
                <input class="content1-button" type="submit" value="Prijavi se"> 
            </p>
        </form>
    </div>
    <?php
        require_once "footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>