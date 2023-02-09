<header class="header" id="header">
    <nav class="nav bd-container">
        <img class="nav-logo" src="img/logo.png" alt="">
        <div class="nav-bar" id="nav-bar">
            <ul class="nav-ul">
                <li class="nav-li"><a href="menager-ordered.php" class="nav-a">Naručeni proizvodi</a></li>
                <li class="nav-li"><a href="menager-shopping.php" class="nav-a">Kupovine</a></li>
            </ul>
        </div>
        <div class="nav-icons">
            <a href="#" class="nav-icon"><i class='bx bx-cart'></i></a>
            <a href="#" class="nav-icon" id="user-icon">
                <?php 
                    echo "<img class='nav-avatar' id='nav-avatar' src='img/menagerAvatar.png'>";
                ?>
            </a>
            <a href="#" class="nav-icon" id="nav-menu"><i class='bx bx-menu' ></i></a>
        </div>
    </nav>
</header>