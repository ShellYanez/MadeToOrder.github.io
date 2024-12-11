<?php  
//defining all php variables before the start of the html
session_start();

//- open link to database 
include ('admin/config/dbcon.php');


//write queries for each cart item
$itemQuery = "SELECT * FROM cart";

//fetch products from database
$itemResult = $con->query($itemQuery);

//end php definitions
?> 

<!-- Begin html code for website design -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart Page</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="style.css">
    <link 
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images\logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="menu.php">Menu</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <!--select query-->
                        <?php
                        $total_quantity_query = mysqli_query($con, "SELECT SUM(quantity) AS total_quantity FROM `cart`");
                        $total_quantity = mysqli_fetch_assoc($total_quantity_query)['total_quantity'] ?? 0;
                        ?>
                        <a href ="cart.php" class = "cart-icon" id="shoppingCart"><span><?php echo $total_quantity; ?></span>My Cart</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!--NavBar section ends -->


    <section class="cart-items">
        <div class= "container">
            <h2 class="text-center">My Cart</h2>
            <br>
                <div class="menu-container">
                    <div class="food-menu-box-cart">
                        <table >
                            <thead>
                                <tr>
                                    <th>SR#</th>
                                    <th>Food Item</th>
                                    <th>Food Image</th>
                                    <th>Food Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <!-- opening php code to pull from database-->
                            <?php
                            //pull each item
                            if ($itemResult->num_rows > 0) {
                                while($row = $itemResult->fetch_assoc()) {
                                     echo"<thead>"; 
                                        //SR#
                                        echo"<th>Filler</th>";
                                        //name
                                        echo"<th>".$row['name']."</th>";
                                        //image
                                        echo"<th><div class='food-menu-img'>";
                                            echo "<img class='img-responsive img-curve' src='admin/uploads/".$row['image']."'>";
                                            echo "</div></th>";
                                        //quantity
                                        echo"<th>".$row['quantity']."</th>";
                                        //price
                                        echo"<th>$".($row['quantity']*$row['price'])."</th>";
                                        //Action
                                        echo"<th>Filler</th>";
                                    echo "</thead>";
                                }
                            }
                            
                            ?>
                            
                        </table>
            
                    </div>
                </div>
        </div>
            
    </section>




</body>
</html>
