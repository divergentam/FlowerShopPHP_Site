<?php
session_start();
global $order;

require_once "classes/database.php";
$database = new DataBase();
$db = $database->connect();

if(!(isset($_SESSION['order']))){
    $_SESSION['order'] = 1;
}

$validation = true;
$adressErr = $cityErr = $zipErr = "";
if(isset($_SESSION["id"])){
    $id = $_SESSION["id"];
    $q = "SELECT * FROM `profiles` WHERE userId = '$id';";
    $result = $db->query($q);
    if($result){
        $row = $result->fetch_assoc();
    }else{
        echo "<script>alert('Nije moguce izvrsiti upit za ucitavanje podataka o prijavljenom korisniku')</script>";
    }
    $q = "SELECT * FROM `users` WHERE id = '$id';";
    $result2 = $db->query($q);
    if($result2){
        $row2 = $result2->fetch_assoc();
    }else{
        echo "<script>alert('Nije moguce izvrsiti upit za ucitavanje podataka o prijavljenom korisniku')</script>";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_SESSION["id"];
    $adress= $_POST["adress"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];

    if(empty($adress)){
        $adressErr = "Polje ne sme da bude prazno!";
        $validation = false;
    }
    if(empty($city)){
        $cityErr = "Polje ne sme da bude prazno!";
        $validation = false;
    }
    if(empty($zip)){
        $zipErr = "Polje ne sme da bude prazno!";
        $validation = false;
    }

    if($validation){
        $shopId = $_SESSION['order'];
        foreach($_SESSION["shopping_cart"] as &$value) {
            $id_product = $value['id'];
            $amount = $value['quantity'];
            $q = "INSERT INTO `cart`(`shoppingId`, `productId`, `userId`, `amount`, `dateAndTime`, `adress`, `city`, `zip`) VALUES ('$shopId','$id_product','$id','$amount', CURRENT_TIMESTAMP, '$adress','$city','$zip');";
            $result = $db->query($q);
            if($result){
                $_SESSION['order'] = $shopId + 1;
                echo '<script>window.open("pdfCheckout.php","_blank")</script>';
                unset($_SESSION["shopping_cart"]);
            }else{
                echo "<script>alert('Vas upit nije uspeo')</script>";
            }
        }
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
    <title>Poruci</title>
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
                    Poruci
                </div>
            </div>
        </section>
    </main>
    <?php
    if(!isset($_SESSION["id"])){
        echo "<div class='prijava-div'>";
        echo "<span class='prijava'>Morate da se prijavite kako bi porucili proizvode!</span>";
        echo "<p>Imate nalog? <a href='login.php'>Prijavite se</a>";
        echo "<p>Nemate nalog? <a href='register.php'>Registrujte se</a>";
        echo "</div>";
    }else{?>
        <div class="register-continer">
        <form class="register-form" action="" method="post" enctype="multipart/form-data"> 
            <h3>Ime:</h3><?php echo $row["namee"]?>
            <h3>Prezime:</h3><?php echo $row["surname"]?>
            <h3>Email:</h3><?php echo $row2["email"]?>
            <h3>Adresa:</h3>
            <p>
                <input class="box" type="adress" placeholder="Adresa" name="adress" id="" value="">
                <span class ="err" id="err_adresa">*<?php echo $adressErr?></span>
            </p>
            <h3>Grad:</h3>
            <p>
                <input class="box" type="city" placeholder="Grad" name="city" id="" value="">
                <span class ="err" id="err_city">*<?php echo $cityErr?></span>
            </p>
            <h3>Postanski broj:</h3>
            <p>
                <input class="box" type="zip" placeholder="Zip" name="zip" id="" value="">
                <span class ="err" id="err_zip">*<?php echo $zipErr?></span>
            </p>
            <p  class="paragraf-button">
                <input class="content1-button" type="submit" value="Poruci"> 
            </p>
        </form>
    </div>
    <?php
    }
    ?>
    <?php
        require_once "footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>