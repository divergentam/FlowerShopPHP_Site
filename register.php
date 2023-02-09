<?php
// ne koristimo required za inout polje jer to ne radi u svim browserima
    require_once "validation.php";
    require_once "classes/database.php";
    require_once "classes/signup.php";

    if(isset($_SESSION["id"])){
        header("location:index.php");
    }

    $validation = true;
    $nameErr = $surnameErr = $passErr = $reErr = $usernameErr = $emailErr = $imageErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['re_password'];
        $email = $_POST['email'];

        if(text_validation(($name))){
            $nameErr = text_validation($name);
            $validation = false;
        }

        if(text_validation(($surname))){
            $surnameErr = text_validation($surname);
            $validation = false;
        }

        if(username_validation($username)){
            $usernameErr = username_validation(($username));
            $validation = false;
        }

        if(password_validation($password)){
            $passErr = password_validation($password);
            $validation = false;
        }

        if($password != $repassword){
            $reErr = "Sifre se ne poklapaju!";
            $validation = false;
        }

        if(email_validation($email)){
            $emailErr = email_validation($email);
            $validation = false;
        }

        if($validation){
            $register = new Register();

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
                        $result = $register->registrationWithImage($name, $surname, $gender, $username, $password, $email, $image);
                        

                        if($result == 10){ 
                            echo "<script>alert('Username ili email su vec upotrebljeni')</script>";
                        }elseif($result){ 
                            echo "<script>alert('Uspesno ste promenili profilnu sliku')</script>"; 
                        }else{
                            echo "<script>alert('Nije moguce promeniti profilnu sliku')</script>"; 
                        }  
                    }
               }else{ 
                   $imageErr = 'Izvinite, samo JPG, JPEG, PNG, i GIF fajlovi su dozvoljeni.'; 
               } 

            }else{
                $result = $register->registration($name, $surname, $gender, $username, $password, $email);

                if($result == 10){
                    echo "<script>alert('Username ili email su vec upotrebljeni')</script>";
                }
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
    <title>Registruj se</title>
</head>
<body>
    <main>
        <section class="registruj" id="registruj">
            <?php
                require_once "header.php"
            ?>
            <div class="pp-container bd-container">
                <?php
                    require_once"user-log.php";
                ?>
                <div class="home-text section-title">
                    Registruj se
                </div>
            </div>
        </section>
    </main>
    <div class="register-continer">
        <form class="register-form" action="" method="post" enctype="multipart/form-data"> 
            <p>
                <input class="box" type="text" placeholder="Ime" name="name" value="<?php if(isset($name))echo $name?>">
                <span class ="err" id="err_name">* <?php echo $nameErr?> </span>
            </p>
            <p>
                <input class="box" type="text" placeholder="Prezime" name="surname" id="" value="<?php if(isset($surname))echo $surname?>">
                <span class ="err" id="err_surname">*<?php echo $surnameErr?></span>

            </p>
            <p>           
                <input type="radio" name="gender" id=""  value="m"  <?php if(isset($gender) && $gender == "m") {echo "checked";} ?> >Male 
                <input type="radio" name="gender" id="" value="f" <?php if(isset($gender) && $gender == "f") {echo "checked";} ?> >Female
                <input type="radio" name="gender" id="" value="o" <?php if(!isset($gender) || $gender == "o") {echo "checked";} ?>>Other
            
            </p>
            <p>
                <input class="box" type="text" placeholder="Username" name="username" id="" value="<?php if(isset($username))echo $username?>">
                <span class ="err" id="err_username">*<?php echo $usernameErr?></span>
            </p>
            <p>
                <input class="box" type="password" placeholder="Password" name="password" id="" value="">
                <span class ="err" id="err_password">*<?php echo $passErr?></span>
            </p>
            <p>
                <input class="box" type="password" placeholder="Ponovo unesi password" name="re_password" id="" value="">
                <span class ="err" id="err_repassword">*<?php echo $reErr?></span>
            </p>
            <p>
                <input class="box" type="email" placeholder="Email" name="email" id="" value="">
                <span class ="err" id="err_email">*<?php echo $emailErr?></span>
            </p>
            <p>
                <input type="file" name="image" class="box">
                <span class ="err" id="err_image">*<?php echo $imageErr?></span>
            </p>
            <p  class="paragraf-button">
                <input class="content1-button" type="submit" value="Registruj se"> 
                <p>
                    Vec imate nagog, <a href="login.php"> loguj se</a>.
                </p>
            </p>
        </form>
    </div>
    <?php
        require_once "footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>