<?php
    session_start();
    require_once "classes/database.php";
    require_once "validation.php";

    
    $validation = true;
    $database = new DataBase();
    $db = $database->connect();
    $id = $_SESSION["id"];
    $slika = false;

    $nameErr = $surnameErr = $emailErr = $usernameErr = $imageErr = "";

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

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        if(!empty($_FILES['image']["name"])){
            $image = $_FILES['image']['name'];
            $image_folder = "D:\III god\Veb programiranje\sajt\img/". $image; 
            $fileType = pathinfo($image, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif'); 

            if(in_array($fileType, $allowTypes)){ 
                $image_tmp_name = $_FILES['image']['tmp_name']; 
                $image_size = $_FILES['image']['size'];

                 if($image_size > 2000000){
                     $imageErr = "Slika je prevelika";
                 }else{
                     move_uploaded_file($image_tmp_name, $image_folder);
                     $q = "UPDATE `profiles` SET `picture` = '$image' WHERE `userId` = '$id';";

                     $result = $db->query($q);
                     if($result){ 
                         echo "<script>alert('Uspesno ste promenili profilnu sliku')</script>"; 
                     }else{
                         echo "<script>alert('Nije moguce promeniti profilnu sliku')</script>"; 
                     }  
                 }
            }else{ 
                $imageErr = 'Izvinite, samo JPG, JPEG, PNG, i GIF fajlovi su dozvoljeni.'; 
            } 
        }

  

        if(text_validation($name)) {
            $nameErr = text_validation($name);
            $validation = false;
        }

        if(text_validation($surname)) {
            $surnameErr = text_validation($surname);
            $validation = false;
        }

        if(username_validation($username)) {
            $usernameErr = username_validation($username);
            $validation = false;
        }

        if(email_validation($email)) {
            $emailErr = email_validation($email);
            $validation = false;
        }

        $duplicateUsername = mysqli_query($db, "SELECT * from users WHERE username = '$username';");
        if($duplicateUsername->num_rows > 0){
            if($id != $duplicateUsername->fetch_assoc()["id"]){
                $usernameErr = "Vec postoji profil sa tim username-om!";
                $validation = false;
            }
        }
        $duplicateEmail = mysqli_query($db, "SELECT * from users WHERE email = '$email';");
        if($duplicateEmail->num_rows > 0){
            if($id != $duplicateEmail->fetch_assoc()["id"]){
                $emailErr = "Vec postoji profil sa tim email-om!";
                $validation = false;
            }
        }

        if($validation) {
            $q = "UPDATE `profiles` SET `namee` = '$name', `surname` = '$surname', `gender` = '$gender' WHERE `userId` = '$id';";
            $q .= "UPDATE `users` SET `username` = '$username', `email` = '$email' WHERE `id` = '$id';";

            $res = $db->multi_query($q);
            if($res){
                echo "<script>alert('Uspesno ste promenili podatke za Vas profil')</script>";
            } else{
                echo "<script>alert('Nije moguce izvrsiti upit za promenu podataka')</script>";
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
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Edituj profil</title>
</head>
<body>
    <main>
        <section class="registruj" id="registruj">
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
                    Edituj profil
                </div>
            </div>
        </section>
    </main>
    <div class="register-continer">
        <form class="register-form" action="" method="post" enctype="multipart/form-data"> 
        <h3>Ime:</h3>
        <p>
            <input class="box" type="text" placeholder="Ime" name="name" value="<?php echo $row["namee"]?>">
            <span class ="err" id="err_name">* <?php echo $nameErr?> </span>
        </p>
        <h3>Prezime:</h3>
        <p>
            <input class="box" type="text" placeholder="Prezime" name="surname" id="" value="<?php echo $row["surname"]?>">
            <span class ="err" id="err_surname">*<?php echo $surnameErr?></span>

        </p>
        <h3>Pol:</h3>
        <p>           
            <input type="radio" name="gender" id=""  value="m"  <?php if($row["gender"] == 'm') {echo "checked";} ?> >Male 
            <input type="radio" name="gender" id="" value="f" <?php if($row["gender"] == 'f') {echo "checked";} ?> >Female
            <input type="radio" name="gender" id="" value="o" <?php if($row["gender"] == 'o') {echo "checked";} ?>>Other
           
        </p>
        <h3>Username:</h3>
        <p>
            <input class="box" type="text" placeholder="Username" name="username" id="" value="<?php echo $row2["username"]?>">
            <span class ="err" id="err_username">*<?php echo $usernameErr?></span>
        </p>
        <h3>Email:</h3>
        <p>
            <input class="box" type="email" placeholder="Email" name="email" id="" value="<?php echo $row2["email"]?>">
            <span class ="err" id="err_email">*<?php echo $emailErr?></span>
        </p>
        <h3>Profilna slika:</h3>
        <?php
            echo"<div class='edit-image-div'>";
                if($row["picture"] != NULL){
                        $image_nav = $row["picture"];
                        echo "<img class='edit-image' src='img/$image_nav'>";
                }
            echo "</div>";
        ?>
        <p>
            <input type="file" name="image" class="box">
            <span class ="err" id="err_image">*<?php echo $imageErr?></span>
        </p>
        <p class="paragraf-button">
            <input class="content1-button" type="submit" value="Promeni podatke"> 
        </p>
        </form>
    </div>
    <?php
        require_once "footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>