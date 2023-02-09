<?php
if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
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
            <a href="#" class="nav-icon" id="user-icon"><i class='bx bx-user-circle'></i></a>
            <a href="#" class="nav-icon" id="nav-menu"><i class='bx bx-menu' ></i></a>
        </div>
    </nav>
</header>