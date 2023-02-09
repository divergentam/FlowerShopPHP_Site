<?php
    session_start();
    require_once "classes/database.php";
    require_once "validation.php";

    $validation = true;
    $oldErr = $newErr = $reErr = "";
    $database = new DataBase();
    $db = $database->connect();
    $id = $_SESSION["id"];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $oldPass = $_POST['old_password'];
        $newPass = $_POST['new_password'];
        $rePass = $_POST['re_new_password'];
        
        if(password_validation($oldPass)){
            $oldErr = password_validation($oldPass);
            $validation = false;
        }

        if(password_validation($newPass)){
            $newErr = password_validation($newPass);
            $validation = false;
        }

        if($rePass != $newPass){
            $reErr = "Sifre se ne poklapaju!";
            $validation = false;
        }
        

        $q = "SELECT * FROM users WHERE id = '$id';";
        $result = $db->query($q);
        if($result){
            $row = $result->fetch_assoc();
            $pass = $row["pass"];
            $checkPassword = password_verify($oldPass, $pass);

            if(!$checkPassword){
                $validation = false;
                $oldErr = "To nije sifra za " . $row["username"] . " profil";
            }
            if($validation){
                $new = password_hash($newPass, PASSWORD_DEFAULT);
                $q = "UPDATE `users` SET `pass` = '$new' WHERE id = '$id';";
                $res = $db->query($q);
                if($res){
                    echo "<script>alert('Sifra je uspesno promenjena')</script>";
                }
                else{
                    echo "<script>alert('Nije moguce izvrsiti upit2')</script>";
                }
            }else{
                echo "<script>alert('Validacija je false')</script>";
            }
        }else{
            echo "<script>alert('Nije moguce izvrsiti upit1')</script>";
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
    <title>Promeni sifru</title>
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
                    Promeni sifru
                </div>
            </div>
        </section>
    </main>
    <div class="register-continer">
        <form class="register-form" action="" method="post"> 
            <p>
                <input class="box" type="password" name="old_password" value="" placeholder="Stara sifra">
                <span class="err" id="err_surname">* <?php echo $oldErr ?> </span>
            </p>
            <p>
                <input class="box" type="password" name="new_password" value="" placeholder="Nova sifra">
                <span class="err" id="err_surname">* <?php echo $newErr ?> </span>
            </p>
            <p>
                <input class="box" type="password" name="re_new_password" value="" placeholder="Unesi ponovo novu sifru">
                <span class="err" id="err_surname">* <?php  echo $reErr ?> </span>
            </p>
            <p class="paragraf-button">
                <input class="content1-button" type="submit" value="Izvrsi promene">
            </p>
        </form>
    </div>
    <?php
        require_once "footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>