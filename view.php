<?php
//<input type='submit' class='button-onlineshop-title' value='Dodaj u korpu'>

foreach($result as $row){
    $image_name = $row["picture"];
    $id_product = $row["id"];
    if($row["productType"] == "Oversize buketi"){
        $class = "oversize-img";
    }else{
        $class= "content-product-img";
    }
    echo "<div class='content-product-div'>
    <img class='$class' src='img/$image_name' alt=''>
    <div class='shadow'>
        <div class='content1-2-tekst'>
            <p>".
                $row["title"]. 
            "<br>" .
                $row["price"] ." din
            </p>
        </div>
        <div class='button-onlineshop'>
            <a href='onlineshop.php?type=$id_product' class='button-onlineshop-title'>Dodaj u korpu</a>
        </div>
    </div>
    <div class='shadow-mobile'>
        <p class='content1-2-tekst2'>". $row["title"] ."</p>"
        . "<p class='content1-2-tekst2 price'>". $row["price"] . " din</p>
    </div>
</div>";
}