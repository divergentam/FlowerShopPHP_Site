<?php
 require_once "validation.php";
 require_once "classes/database.php";

$databese = new DataBase();
$db = $databese->connect();

 $validation = true;
 $titleErr = $priceErr = $imageErr = $selectErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST["product_name"];
    $price = $_POST["price"];
    $select = $_POST["admin-flowers"];

    if(text_validation(($title))){
        $titleErr = text_validation($title);
        $validation = false;
    }

    if(empty($price)){
        $priceErr = "Morate da unesete cenu za proizvod!";
        $validation = false;
    }

    if($select == "Select"){
        $validation = false;
        $selectErr = "Molim Vas da selektujete odredjeni tip!";
    }

    if($validation){
        if(!empty($_FILES['image-admin']["name"])){
            $image = $_FILES["image-admin"]["name"];
            $tmp_name = $_FILES["image-admin"]["tmp_name"];
            $image_folder = "D:\III god\Veb programiranje\sajt\img/". $image;
            $file_Type = pathinfo($image, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
    
            if(in_array($file_Type, $allowTypes)){
                if(move_uploaded_file($tmp_name, $image_folder)){
                    $q = "INSERT INTO `onlineshop`(`title`, `price`,`picture`, `productType`) VALUES ('$title', '$price', '$image', '$select')";
                    $result = $db->query($q);
                    if($result){
                        echo "<script>alert('Uspesno ste dodali novi proizvod')</script>";
                    }
                    else{
                        echo "<script>alert('Nije moguce dodati proizvod!')</script>";
                    }
                }else{
                    $imageErr = "Nije moguce premestiti sliku!";
                }
            }else{
                $imageErr = "Izvinite, samo JPG, JPEG, PNG, i GIF fajlovi su dozvoljeni.";
            }
    
        }else{
            $imageErr = "Morate dodate sliku proizvoda!";
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
    <title>Admin</title>
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
                    Admin
                </div>
            </div>
        </section>
    </main>
    <div class="register-continer">
        <form class="register-form" action="" method="post" enctype="multipart/form-data"> 
            <p>
                <input class="box" type="tekst" name="product_name" placeholder="Ime proizvoda">
                <span class ="err" id="err_titleErr">*<?php echo $titleErr?></span>

            </p>
            <p>
                <input class="box" type="number" name="price" placeholder="Cena proizvoda">
                <span class ="err" id="err_priceErr">*<?php echo $priceErr?></span>
            </p>
            <p>
                <select class="box" id="admin-select" name="admin-flowers">
                    <option value="Select">--Izaberite neku od ponudjenih opcija</option>
                    <option value="Luksuzni buketi">Luksuzni buketi</option>
                    <option value="Oversize buketi">Oversize buketi</option>
                    <option value="Bidermajeri">Bidermajeri</option>
                    <option value="Pokloni za nju">Pokloni za nju</option>
                </select>
                <span class ="err" id="err_selectErr">*<?php echo $selectErr?></span>

            </p>
            <p>
                <input class="box" type="file" name="image-admin"> 
                <span class ="err" id="err_imageErr">*<?php echo $imageErr?></span>
            </p>
            <p>
                <input class="content1-button" type="submit" value="Dodaj proizvod"> 
            </p>
        </form>
    </div>
    <?php
        require_once "admin-footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>