<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #8B0000;
            color: #000000;
            padding: 10px 20px;
            text-align: center;
        }
        .sub-header {
            color: yellow;
            margin-top: 5px; 
            margin-bottom: 5px; 
        }

        nav {
            text-align: right;
            margin-top: -40px;
        }
        nav a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #555;
            color: #fff;
            margin: 0px 10px;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #777;
        }
        .container {
            max-width: 60%;
            max-height: 10%;
            margin: 5px auto;
            padding: 0 10px;
            margin-top: 30px;
        }
        .product {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 50px;
            background-color: #fff;
            max-height: 500px;
        }
        .product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .product button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .product button:hover {
            background-color: #45a049;
        }
        .cart {
            position: fixed;
            bottom: 200px;
            right: 40px;
            background-color: red;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
        }
        .column {
            float: left;
            width: 20%; 
            height: 435px;
            padding: 3px;
        
            
        }
        .row {
            
            margin-top: -5px;
            
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: -18px;
            width: 100%;
            
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .footer a {
            color: #FFFFED;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-text {
            float: left;
            margin-right: 10px;
        }
        form {
        text-align: center;
        }
        input[type="text"] {
        width: 500px; 
        padding: 6px; 
        font-size: 16px; 
        }
        input[type="submit"] {
      
        padding: 6px; 
        font-size: 16px; 
        background-color: maroon;
        color: #ddd;
        
        }
    
    </style>
</head>
<?php 
    session_start();
    require("../../model/productdb.php");
    if(!isset($_SERVER["data"])){
        $_SERVER["data"] = null;
    }
?>
<body>
    <header>
        <h1>TechMak</h1>
        <p class="sub-header" style="color: #FFFFED">The Technology Makers</p>
    </header>
    <div class="footer">
        <div class="footer-text">TechMak</div>
        <p>Address: Road-1, House-61, Block-A, Bashundhara R/A</p>
        <p>Contact: 01601899738</p>
        <p>Email: techmak66@gmail.com</p>
        <div>
            <a href="#">EMI Terms</a>
            <a href="#">Privacy Policy</a>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
            <a href="#">Online Delivery</a>
        </div>
    </div>
    <nav>
        <a href="home.php">Home</a>
        <a href="home.php">Products</a>
        <a href="../about.php">About</a>
        <a href="../login.php">Logout</a>
        <a href="../contuct_us.php">Contact Us</a>
    </nav>
    <div class="container">
        <div class="row">
            <input type="text" name="search_value" id="search_value" placeholder="Search here">
            <button name="search_submit" id="search_submit" value="Search" onclick="searchProduct()">Search</button>
        </div>
        <div class="row" id="product_list">
        
            <?php
            if($_SERVER["data"] == null){
                $_SERVER['data'] = listProduct();
                $products = $_SERVER["data"];
            }
                foreach($_SERVER['data'] as $p){
                    echo "<div class='column'>";
                    echo "<form method='post' action='../../controller/cart_controller.php'>";
                    echo "<input type='hidden' name='product_id' value='".$p[0]."'>";
                    echo "<div class='product'>";
                    echo "<img src='../resources/images/".$p[4]."' alt='Product Image' height='200px' width='200px'>";
                    echo "<h3>".$p[1]."</h3>";
                    echo "<p>".$p[3]."</p>";
                    echo "<p><b> Price:".$p[2]."৳</b></p>";
                    echo "<button type='submit' name='add_to_cart'>Add to Cart</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
       
    </div>
    <a href="cart_view.php">
    <b><div class="cart" style="color: white"></b>
        <?php
            require("../../model/cartdb.php");
            echo $_SESSION['user']['name'];
            echo "<br>Cart: ".getCount();
        ?>
    </div>
    </a>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>   
    var products = <?php echo json_encode($_SERVER['data']) ?>;
    console.log(products);
    function searchProduct(){
        let product_name = $.trim($('#search_value').val());
        if(product_name !== "" ){
            var products = <?php echo json_encode($_SERVER['data']) ?>;
            var newData = [];
            products.forEach(element => {
                if(element[1].toLowerCase().includes(product_name.toLowerCase())){
                    newData.push(element);
                }
            });

            var elements = "";

            console.log(newData);
            console.log(newData.length);

            if(newData.length > 0){
                newData.forEach( element => {
                    var col = "<div class='column'>" +
                        "<form method='post' action='../../controller/cart_controller.php'>" +
                        "<input type='hidden' name='product_id' value='" + element[0] + "'>" +
                        "<div class='product'>"+
                        "<img src='../resources/images/" + element[4] + "' alt='Product Image' height='200px' width='200px'>"+
                        "<h3>" + element[1] + "</h3>" +
                        "<p>" + element[3] + "</p>" +
                        "<p><b> Price:" + element[2] + "৳</b></p>" +
                        "<button type='submit' name='add_to_cart'>Add to Cart</button>" +
                        "</form>" + 
                        "</div></div>";

                    elements += col;

                });
            }
            else{
                elements = "No Products found";
            }
            $('#product_list').html(elements);
            
        }
    }
</script>
</html>


