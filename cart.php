<?php
session_start();

if(!(isset($_SESSION['order']))){
    $_SESSION['order'] = 1;
}

if (isset($_POST['action']) && $_POST['action']=="remove"){
    if(!empty($_SESSION["shopping_cart"])) {
        foreach($_SESSION["shopping_cart"] as $key => $value) {
            if($_POST['code'] == $key){
            unset($_SESSION["shopping_cart"][$key]);
            echo "<script>alert('Proizvod je uklonjen iz Vase korpe!')</srcipt>";
            header("location:cart.php");
        }
        if(empty($_SESSION["shopping_cart"]))
            unset($_SESSION["shopping_cart"]);
            header("location:cart.php");
        }		
    }
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST['code']){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
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
    <title>Korpa</title>
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
                    Korpa
                </div>
            </div>
        </section>
    </main>
    <div class="cart">
        <?php
        if(isset($_SESSION["shopping_cart"])){
            $total_price = 0;
        ?>
        <table class="table">
        <tbody>
        <tr>
            <td></td>
            <td>Ime proizvoda</td>
            <td>Kolicina</td>
            <td>Cena po proizvodu</td>
            <td>Ukupna cena</td>
        </tr>
        <?php		
        foreach ($_SESSION["shopping_cart"] as $product){
        ?>
        <tr>
            <td>
                <img src='img/<?php echo $product["image"]; ?>' width="150" height="100" />
            </td>
            <td><?php echo $product["name"]; ?><br />
                <form method='post' action=''>
                    <input type='hidden' name='code' value="<?php echo $product['code']; ?>" />
                    <input type='hidden' name='action' value="remove"/>
                    <button type='submit' class='remove'>Obrisi proizvod</button>
                </form>
            </td>
            <td>
                <form method='post' action=''>
                    <input type='hidden' name='code' value="<?php echo $product['code']; ?>" />
                    <input type='hidden' name='action' value="change"/>
                    <select name='quantity' class='quantity' onChange="this.form.submit()">
                        <?php
                            for($i = 1; $i <= $product["avalible"]; $i++){
                                $selected="";
                                if($product["quantity"]==$i) $selected="selected";
                                echo "<option $selected value='$i'>$i</option>";
                            }
                        ?>
                    </select>
                </form>
            </td>
            <td><?php echo $product["price"]." din"; ?></td>
            <td><?php echo $product["price"]*$product["quantity"] . " din"; ?></td>
        </tr>
        <?php
        $total_price += ($product["price"]*$product["quantity"]);
        }
        ?>
        <tr>
            <td colspan="5" align="right">
            <strong>UKUPNO: <?php echo $total_price . "din"; ?></strong>
            </td>
        </tr>
        </tbody>
        </table>		

        <a href="order.php" class="content1-button order">Poruci</a>
        <?php
        }else{
            echo "<h3>Vasa korpa je prazna!</h3>";
            }
        ?>
    </div>
    <div style="clear:both;"></div>
    <?php
        require_once "footer.php";
    ?>
    <script src="main.js"></script>
</body>
</html>