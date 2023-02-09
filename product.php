<?php
require_once "classes/database.php";
$database = new DataBase();
$db = $database->connect();
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
    <title>Proizvodi</title>
</head>
<body>
<main>
        <section class="admin" id="admin">
            <?php 
                require_once "header-admin.php";   
            ?>
            <div class="pp-container bd-container">
                <?php 
                   require_once "user-log-admin.php";
                ?>
                <div class="home-text section-title">
                    Proizvodi
                </div>
            </div>
        </section>
    </main>
    
    <div class="gallery-container-admin">
        <?php
            $q = "SELECT * FROM `onlineshop`";
            $result = $db->query($q);
            if($result){
                foreach($result as $row){
                    $image_name = $row["picture"];
                    if($row["productType"] == "Oversize buketi"){
                        $class = "oversize-img";
                    }else{
                        $class = 'content-product-img';
                    }
                    echo "<div class='content-product-div'>
                    <img class='$class ' src='img/$image_name' alt=''>
                    <div class='shadow'>
                        <div class='content1-2-tekst'>
                            <p>".
                             $row["title"]. "<br>" . $row["price"] .  
                            "</p>
                        </div>
                    </div>
                    <div class='shadow-mobile'>
                        <p class='content1-2-tekst2'>". $row["title"] ."</p>
                    </div>
                </div>";
                }
            }
        ?>
    </div>

    <?php
        require_once "footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>