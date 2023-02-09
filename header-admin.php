<header class="header" id="header">
    <nav class="nav bd-container">
        <img class="nav-logo" src="img/logo.png" alt="">
        <div class="nav-bar" id="nav-bar">
            <ul class="nav-ul">
                <li class="nav-li"><a href="admin.php" class="nav-a">Dodaj nove proizvode</a></li>
                <li class="nav-li"><a href="product.php" class="nav-a">Proizvodi</a></li>
            </ul>
        </div>
        <div class="nav-icons">
            <a href="#" class="nav-icon"><i class='bx bx-cart'></i></a>
            <a href="#" class="nav-icon" id="user-icon">
                <?php 
                    echo "<img class='nav-avatar' id='nav-avatar' src='img/admin.jpg'>";
                ?>
            </a>
            <a href="#" class="nav-icon" id="nav-menu"><i class='bx bx-menu' ></i></a>
        </div>
    </nav>
</header>