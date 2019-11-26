<?php 
	$title = "Add Shopping Items";
	include '_top.php';
?>
<h1><?php echo $title; ?></h1>

<form method="POST">
    <?php
        if (isset($_POST["btnGo"]))  {
           $product = $_POST["product"];
           $price = $_POST["price"];
           $quantity = $_POST["quantity"];
           $location = $_POST["location"];
           $err = "";

           if  ($product == "") {
                $err = "Product can't be blank<br />";
           }
            if ($price == "") {
                $err = "Price can't be blank<br />";
           }
           if  ($quantity == "") {
                $err = "Quantity can't be blank<br />";
           }
            if ($location == "") {
                $err = "Location can't be blank<br />";
           }
         
           
           if ($err ==   "")  {
               $myFile = fopen('data.txt',"a+");
               $line = PHP_EOL . "$product|$location|$price|$quantity";
               fwrite($myFile, $line);
               fclose($myFile);
               echo "<p>$quantity x $product @ \$$price
               recorded</p>";
           }  else {
               echo "<p>$err</p>";
           } 
        }
        
    ?>


    <label for="product">Product:</label>
    <input type="text" id="product" name="product"  /> 
    <br />
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" />
    <br />
    <label for="quantity">Quantity:</label>
    <input type="text" id="quantity" name="quantity" required />
    <br />
    <label for="location">Location:</label>
    <select name="location" required>
         <option value="">--SELECT ONE</option>
         <option>Hardware</option>
         <option>Beauty</option>
         <option>Food</option>
    </select>
    <br />
    <button type="submit" name="btnGo">Submit</button>

</form>



<?php
    //include '_bottom.php';
?>