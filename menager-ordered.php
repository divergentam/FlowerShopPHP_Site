<?php
 require_once "validation.php";
 require_once "classes/database.php";

$databese = new DataBase();
$db = $databese->connect();

$q = "SELECT DISTINCT cart.productId, onlineshop.title FROM `cart` INNER JOIN `onlineshop` ON `cart`.productId = `onlineshop`.id ";
$result = $db->query($q);
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
    <title>Menager</title>
</head>
<body>
    <main>
        <section class="admin" id="admin">
            <?php 
                require_once "menager-header.php";   
            ?>
            <div class="pp-container bd-container">
                <?php 
                   require_once "user-log-menager.php";
                ?>
                <div class="home-text section-title">
                    Menadžer
                </div>
            </div>
        </section>
    </main>
    <div class="register-continer menager">
        <form class="register-form" action="pdfreport.php" method="post" target="_blank"> 
            <select name="title" id="" class="box">
                <?php
                    foreach($result as $rows){
                        echo '<option value="' . $rows["title"] . '">' . $rows["title"] . '</option>';
                    }
                ?>
            </select>
            <button class="content1-button" type="submit" name="button">Pretraži</button>
        </form>
    </div>
    <?php
        require_once "menager-footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>