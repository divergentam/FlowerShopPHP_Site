<?php
session_start();
require_once "classes/database.php";
$database = new DataBase();
$db = $database->connect();

if (isset($_GET['type']) && $_GET['type']!=""){
$id = $_GET['type'];
$result = mysqli_query($db,"SELECT * FROM `onlineshop` WHERE `id`='$id'");
$row = mysqli_fetch_assoc($result);
$name = $row['title'];
$price = $row['price'];
$image = $row['picture'];
$avalible = $row['avalible'];
$code = $name.$id;

$cartArray = array(
	"$code"=>array(
    'code'=>$code,
	'name'=>$name,
	'id'=>$id,
	'price'=>$price,
	'quantity'=>1,
    'avalible'=>$avalible,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    echo "<script>alert('Proizvod je dodat u Vasu korpu!')</script>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
        echo "<script>alert('Proizvod je vec dodat u Vasu korpu!')</script>";
    } else {
    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
    echo "<script>alert('Proizvod je dodat u Vasu korpu!')</script>";
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
    <title>Online shop</title>
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
                    Online shop
                </div>
            </div>
        </section>
    </main>
    <div class = "all-container">
        <div class="filter">

            <h1 class="filter-text">Filter</h1>
            <div class="filter-form-container filter-nav-icons">
                <div class="filter-nav-icons1" >
                    <input class="box-search" type="search" id="search-in" placeholder="Pretrazite proizvode"/>
                </div>
                <div class="filter-nav-icons2">
                    <a href="#" class="filter-search" id="search"><i class='bx bx-search-alt-2' ></i></a>
                </div>
            </div>
            <div class="filter-form-container">
                <form class="filter-form" id="filter-form" method="POST" action="">
                    <h3>Tip kategorije:</h3>
                    <p>
                        <input type="checkbox" name="cvece[]" value="Luksuzni buketi" <?php if((isset($_POST["cvece"]) && in_array("Luksuzni buketi", $_POST["cvece"])) || ( isset($_GET["tip"]) && $_GET["tip"] == "Luksuznibuketi")) echo "checked"; ?>>Luksuzni buketi
                    </p>
                    <p>
                        <input type="checkbox" name="cvece[]" value="Oversize buketi" <?php if((isset($_POST["cvece"]) && in_array("Oversize buketi", $_POST["cvece"])) || (isset($_GET["tip"]) && $_GET["tip"] == "Oversizebuketi")) echo "checked"; ?>>Oversize buketi
                    </p>
                    <p>
                        <input type="checkbox" name="cvece[]" value="Bidermajeri" <?php if((isset($_POST["cvece"]) && in_array("Bidermajeri", $_POST["cvece"])) || (isset($_GET["tip"]) && $_GET["tip"] == "Bidermajeri")) echo "checked"; ?>>Bidermajeri
                    </p>
                    <p>
                        <input type="checkbox" name="cvece[]" value="Pokloni za nju" <?php if((isset($_POST["cvece"]) && in_array("Pokloni za nju", $_POST["cvece"])) || (isset($_GET["tip"]) && $_GET["tip"] == "Poklonizanju")) echo "checked"; ?>>Pokloni za nju
                    </p>
                    <h3>Sortiraj po ceni:</h3>
                    <p>
                        <input type="radio" name="radio-cena" value="ASC" checked>rastuce
                    </p>
                    <p>
                        <input type="radio" name="radio-cena" value="DESC">opadajuce
                    </p>
                    <h3>Sortiraj po nazivu:</h3>
                    <p>
                        <input type="radio" name="radio-cvece" value="ASC" checked>rastuce
                    </p>
                    <p>
                        <input type="radio" name="radio-cvece" value="DESC">opadajuce
                    </p>
                    </div>
                        <input class="content1-button" type="submit" value="Filtriraj">
                        <a class="content1-button" href="onlineshop.php">Resetuj filter</a>
                    </div>
                </form>
        <div class="gallery-container">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST["cvece"])){
                    $type = $_POST["cvece"];
                    $sort = false;
                }else{
                    $sort = true;
                }
                $orderCena = $_POST["radio-cena"];
                $orderNaziv = $_POST["radio-cvece"];

                if($sort){
                    $q = "SELECT * FROM `onlineshop` ORDER BY `price` $orderCena, `title` $orderNaziv;";
                    $result = $db->query($q);
                    if($result){
                        foreach($result as $row){
                            require_once "view.php";
                        }
                    }
                }else{
                    $q = "SELECT * FROM `onlineshop` WHERE `productType` LIKE";
                    for($i = 0; $i < sizeof($type); $i++){
                        $el =  $type[$i];
                        if($i == sizeof($type)-1){
                            $q .= " '$el' ";
                        }else{
                            $q .= " '$el' OR";
                        }
                    }
                    $q .= "ORDER BY `price` $orderCena, `title` $orderNaziv;";
                    $result = $db->query($q);
                    if($result){
                        foreach($result as $row){
                            require_once "view.php";
                        }
                    }
                }
            
            
            }
            else{
                $q = "SELECT * FROM `onlineshop`";
                $result = $db->query($q);
                if($result){
                    foreach($result as $row){
                        require_once "view.php";
                    }
                }
            }
        ?>
    </div>
    </div>


    <?php
        require_once "footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>