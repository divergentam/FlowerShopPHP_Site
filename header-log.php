<?php
if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}
?>

<?php
    require_once "classes/database.php";
    $database = new DataBase();
    $db = $database->connect();
    $id = $_SESSION["id"];

    $avatar = true;
    $q = "SELECT * FROM `profiles` WHERE userId = '$id';";
    $result = $db->query($q);
    if($result){
        $row = $result->fetch_assoc();
        if($row["picture"] != NULL){
            $avatar = false;
        }else{
            $pol = $row["gender"];
        }
    }else{
        echo "<script>alert('Nije moguce izvrsiti upit za ucitavanje podataka o prijavljenom korisniku')</script>";
    }
?>

<header class="header" id="header">
    <nav class="nav bd-container">
        <img class="nav-logo" src="img/logo.png" alt="">
        <div class="nav-bar" id="nav-bar">
            <ul class="nav-ul">
                <li class="nav-li"><a href="index.php" class="nav-a">Home</a></li>
                <li class="nav-li"><a href="onlineshop.php" class="nav-a">Online shop</a></li>
                <li class="nav-li"><a href="onama.php" class="nav-a">O nama</a></li>
                <li class="nav-li"><a href="kontakt.php" class="nav-a">Kontaktirajte nas</a></li>
            </ul>
        </div>
        <div class="nav-icons">
            <a href="cart.php" class="nav-icon"><i class='bx bx-cart'></i><span class="number_in_cart"><?php if(isset($cart_count)) echo $cart_count; ?></span></a>
            <a href="#" class="nav-icon" id="user-icon">
                <?php 
                    if($avatar){
                        if($pol == "z" || $pol == "f"){
                            echo "<img class='nav-avatar' id='nav-avatar' src='img/woman_avatar.jpg'>";
                        }
                        elseif($pol == "m"){
                            echo "<img class='nav-avatar' id='nav-avatar' src='img/man_avatar.jpg'>";
                        }else{
                            echo "<img class='nav-avatar' id='nav-avatar' src='img/unisex_avatar.jpg'>";

                        }                     
                    }else{
                        $image_nav = $row["picture"];
                        echo "<img class='nav-avatar' id='nav-avatar' src='img/$image_nav'>";
                    }
                ?>
            </a>
            <a href="#" class="nav-icon" id="nav-menu"><i class='bx bx-menu' ></i></a>
        </div>
    </nav>
</header>