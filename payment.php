<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="[time in seconds]"> -->
    <title>home</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/home.css">
    <script src="https://kit.fontawesome.com/a627fa96ad.js" crossorigin="anonymous"></script>

</head>
<style>
    img{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: auto;
        margin-right: auto;
    }
    body{
        background-color: white;
    }
    .main{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        position: relative;
        background-color: white;
    }
    button.btn_back {
        width: 20vw;
        height: 5vw;
        background-color: #b44848;
        font-size: 30px;
        color: white;
        border: white 3px solid;
        border-radius: 30px;
        position: absolute;
        bottom:0;
        right:30px;
    }
    button.btn_back:hover {
        background-color: #820000;
    }
</style>
<?php
    session_start();
	function random_num($length)
	{

		$text = "";
		if($length < 5)
		{
			$length = 5;
		}

		//random num 4-20 
		$len = rand(4,$length);

		for ($i=0; $i < $len; $i++) { 
			# code...
			//random num 0-9	
			$text .= rand(0,9);
		}

		return $text;
	}

    function getData(){
        $dbname = 'webappdb';
        $tablename = 'product';
        $servername = "localhost"; 
        $username = "root"; 
        $password = "";
        $sql = "SELECT * FROM $tablename";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
    
    function insert_product($product_id ,$product_name, $product_price, $product_image, $product_detail, $product_category){
        $dbname = 'webappdb';
        $tablename = 'product';
        $servername = "localhost"; 
        $username = "root"; 
        $password = "";
        // Check connection
        if (!mysqli_connect($servername, $username, $password)){
            die("Connection failed : " . mysqli_connect_error());
        }
    
        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        $con = mysqli_connect($servername, $username, $password);
        // execute query
        if(mysqli_query($con , $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);
    
        // sql to create new table
    
        $sql = " CREATE TABLE IF NOT EXISTS $tablename
                (product_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                 product_name VARCHAR (25) NOT NULL,
                 product_price FLOAT NOT NULL,
                 product_image VARCHAR (100) NOT NULL,   
                 product_detail TEXT NOT NULL,
                 product_category VARCHAR (25) NOT NULL 
                );";
    
            if (!mysqli_query($con, $sql)) {
                echo "Error creating table : " . mysqli_error($con);
            }
        }
            // $product_id = random_num(20);
            $con = mysqli_connect($servername, $username, $password, $dbname);
            $query = "INSERT INTO $tablename (product_id, product_name, product_price, product_image, product_detail, product_category) VALUES ('$product_id', '$product_name', '$product_price', '$product_image', '$product_detail','$product_category')";
            mysqli_query($con, $query);
            echo "
                <script> alert ('item inserted') </script>
            ";
            // header("Location: user_login.php");

    }
    
    function component($productname, $productprice, $productimg, $productid, $productdetail){
        $element = "
        
        <div class=\"item\">
            <form method=\"post\">
                <div class=\"top\">
                    <img src=\"$productimg\">
                </div>
                <div class=\"middle\">
                    <h4>$productname</h4>
                    <p>$productdetail</p>
                </div>
                <div class=\"bottom\">
                    <div class=\"left\">
                        <h5>RM$productprice</h5>
                    </div>
                    <div class=\"right\">
                        <input type='hidden' name='product_id' value='$productid'>
                        <input type='hidden' name='product_price' value='$productprice'>
                        <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button> 
                    </div>
                </div>  
            </form>
        </div>
    
        ";
        echo $element;
    }

    function check_login()
    {
        // $_SESSION['user_id'] 
        // if global variable ($_SESSION['user_id']) is isset which mean exist 
        if(isset($_SESSION['user_id'])) 
        {

            $user_id = $_SESSION['user_id'];

            //read from database
            //query means to select (* = all) from (users = database table which name users) where by (user_id = variable name in users table) = '$id' limit 1 )
            //sql code
            $con = mysqli_connect('localhost','root','','webappdb');
            $query= "SELECT * FROM user_login WHERE user_id = '$user_id' LIMIT 1" ;

            //  mysqli_query($con,$query)
            //  get row information depend on id from database table asset to $result
            $result = mysqli_query($con,$query);
            // if got result and the result is more than 0
            if($result && mysqli_num_rows($result) > 0)
            {
                //fetch mean take 
                //assoc = associative array 关联数组 
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        else{
        //redirect 转去 to login.php page 
        header("Location: user_login.php");
        die;//code will no continue like return
        }

    }


    function insert_cart($product_id,$product_price){
        $dbname = 'webappdb';
        $tablename = 'cart';
        $servername = "localhost"; 
        $username = "root"; 
        $password = "";
        // Check connection
        if (!mysqli_connect($servername, $username, $password)){
            die("Connection failed : " . mysqli_connect_error());
        }
    
        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        $con = mysqli_connect($servername, $username, $password);
        // execute query
        if(mysqli_query($con , $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);
    
        // sql to create new table
    
        $sql = " CREATE TABLE IF NOT EXISTS $tablename
                (cart_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                 user_id INT(11) NOT NULL,
                 product_id INT(11) NOT NULL,
                 quantity INT(11),
                 subtotal FLOAT
                );";
    
            if (!mysqli_query($con, $sql)) {
                echo "Error creating table : " . mysqli_error($con);
            }
        }

            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM $tablename WHERE user_id = '$user_id' AND product_id = '$product_id'";
            $result = mysqli_query($con, $sql);
            if($result && mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
                $cart_id = $row['cart_id'];
                $quantity = $row['quantity'] + 1;
                $subtotal = $row['subtotal'] + $row['subtotal'];         
                $con = mysqli_connect($servername, $username, $password, $dbname);        
                $sql = "UPDATE $tablename SET quantity = '$quantity', subtotal= '$subtotal' WHERE cart_id = '$cart_id'";
                mysqli_query($con, $sql);
                echo "
                    <script> alert('item added') </script>
                ";
            }
            else{
                
                $cart_id = random_num(20);
                $user_id = $_SESSION['user_id'];
                $con = mysqli_connect($servername, $username, $password, $dbname);  
                // $query = "INSERT INTO $tablename (product_id, product_name, product_price, product_image, product_detail) VALUES ('$product_id', '$product_name', '$product_price', '$product_image', '$product_detail')";
                $query = "INSERT INTO $tablename (cart_id, user_id, product_id, quantity, subtotal) VALUES ('$cart_id', '$user_id', '$product_id','1','$product_price')";
                mysqli_query($con, $query);
                echo "
                    <script> alert('new item added') </script>
                ";
                
            }
    }


    function get_cart(){
        $dbname = 'webappdb';
        $tablename = 'cart';
        $servername = "localhost"; 
        $username = "root"; 
        $password = "";
        // Check connection
        if (!mysqli_connect($servername, $username, $password)){
            die("Connection failed : " . mysqli_connect_error());
        }
    
            $con = mysqli_connect($servername, $username, $password, $dbname);
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM $tablename WHERE user_id = '$user_id'";
            $result = mysqli_query($con, $sql);
            return $result;
 
    }
?>
<body>
    <?php

        $user_data = check_login();
        // insert_product('aaaa', '1234', './IMAGE/sandwich1.png', 'aaaa','food');
        // insert_product($product_id, $product_name, $product_price, $product_image, $product_detail);
    ?>
    <div class="header">
        <div class="left">
          <a href="./cover_page.php"><img src="./IMAGE/logo.png" alt=""></a>
        </div>
        <div class="middle">
          <form class="d-flex" role="search" action="search.php" method = "POST">
            <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="submit-search">Search</button>
          </form>
        </div>
        <div class="right">
            <a href="./user_logout.php" class="logo_user" onclick=""><i class="fa-solid fa-user"></i> &nbsp;<?php echo $user_data['user_acc']; ?> &nbsp;<i class="fa-solid fa-right-from-bracket"></i></a>
            <a href="./user_cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i>
            
            <?php
                $result = get_cart();
                $total = 0;
                while ($row = mysqli_fetch_assoc($result)){
                    $x = $row['quantity'];
                    $total = $x + $total;
                }
      
                echo "<span>$total</span>";
    
            ?>
    
            </a>
          </div>
    
      </div>
    
        <ul class="nav_link">
            <li><a href="./home.php">Home</a></li>
            <li><a href="./category_food.php">Food</a></li>
            <li><a href="./category_drink.php">Drink</a></li>
            <li><a href="./category_dessert.php">Dessert</a></li>
            <li><a href="./shipping.php">Shipping</a></li>
        </ul>
    
      <!-- head -->  
      <div class="main">
        <div class="img">
            <img src="./IMAGE/TNG.jpeg" alt="">
        </div>
        <a href="./home.php">
            <button class="btn_back">
                Continue
            </button>
        </a>
      </div>


      
    <div class="footer-container">
        <div class="footer-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
  
        <div class="footer-middle">
            <h4>Copyright © 2022. All rights reserved.</h4>
        </div>
  
        <div class="footer-contact-us">
            <a href=""><i class="fa-solid fa-phone-rotary"></i>Contact us</a>
        </div>
        
      </div>
</body>
</html>