<?php  
//defining all php variables before the start of the html
session_start();

//- open link to database 
include ('admin/config/dbcon.php');

//write appropriate queries for each category
$breakfastQuery = "SELECT * FROM MenuItem WHERE Category LIKE '%breakfast%'";
$dinnerQuery = "SELECT * FROM MenuItem WHERE Category LIKE '%dinner%'";
$lunchQuery = "SELECT * FROM MenuItem WHERE Category LIKE '%lunch%'";
$drinksQuery = "SELECT * FROM MenuItem WHERE Category LIKE '%drinks%'";

// Fetch products from the database
$breakfastResult = $con->query($breakfastQuery);
$lunchResult = $con->query($lunchQuery);
$dinnerResult = $con->query($dinnerQuery);
$drinksResult = $con->query($drinksQuery);

//end php definitions
?> 

<!-- Begin html code for website design -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="style.css">
    <link 
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
</head>

<body >
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
                        <a href ="#" class = "cart-icon" id="shoppingCart"><span>0</span>My Cart</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!--NavBar section ends -->



    <!-- fOOD MEnu Section Starts Here -->
    <main>
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <br>
            <!--BREAKFASTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT-->
            <div id = "Breakfast" class="menu-container">
                <h3 class="text-left" style="color: white; font-size:28px;">Breakfast</h3>
                 
                <!-- opening php code to pull from database-->
                <?php
                //pull each value
                if ($breakfastResult->num_rows > 0) {
                    while($row = $breakfastResult->fetch_assoc()) {
                        echo "<div class='food-menu-box''>";

                            //the image
                            echo "<div class='food-menu-img'>";
                                echo "<img class='img-responsive img-curve' src='admin/uploads/".$row['image']."'>";
                                echo "</div>"; //end food-menu-img

                           //the description 
                           echo "<div class='food-menu-desc'>";
                                echo "<h4 class= 'item'>".$row['ItemName']."</h4>";
                                echo "<p class='food-price'>$".$row['Price']."</p>";
                                echo "<p class='food-detail'>".$row['description']."</p>";
                                echo "<br>";
                                echo "<button class='add-to-cart'>Add to Cart</button>";
                            echo "</div>";//end food-menu-desc
                        echo "</div>";//end food-menu-box
                    }//end while
                }//end if
                else{
                    echo "No Products available.";
                }
                ?>
        
            </div>
            <!----BREAKFAST END ----------------------------------------------------------->

        <!--------------------Lunch Start-------------------------------------------------->

        <div id = "Lunch" class="menu-container">
            <h3 class="text-left" style="color: white; font-size:28px;">Lunch</h3>
                            
                <!-- opening php code to pull from database-->
                <?php
                //pull each value
                if ($lunchResult->num_rows > 0) {
                    while($row = $lunchResult->fetch_assoc()) {
                        echo "<div class='food-menu-box''>";

                            //the image
                            echo "<div class='food-menu-img'>";
                                echo "<img class='img-responsive img-curve' src='admin/uploads/".$row['image']."'>";
                                echo "</div>"; //end food-menu-img

                           //the description 
                           echo "<div class='food-menu-desc'>";
                                echo "<h4 class= 'item'>".$row['ItemName']."</h4>";
                                echo "<p class='food-price'>$".$row['Price']."</p>";
                                echo "<p class='food-detail'>".$row['description']."</p>";
                                echo "<br>";
                                echo "<button class='add-to-cart'>Add to Cart</button>";
                            echo "</div>";//end food-menu-desc
                        echo "</div>";//end food-menu-box
                    }//end while
                }//end if
                else{
                    echo "No Products available.";
                }
                ?>
    
        </div>
            <!----Lunch END ----------------------------------------------------------->
            
        <!--------------------Dinner Start-------------------------------------------------->

        <div id = "Dinner" class="menu-container">
            <h3 class="text-left" style="color: white; font-size:28px;">Dinner</h3>
            
                <!-- opening php code to pull from database-->
                <?php
                //pull each value
                if ($dinnerResult->num_rows > 0) {
                    while($row = $dinnerResult->fetch_assoc()) {
                        echo "<div class='food-menu-box''>";

                            //the image
                            echo "<div class='food-menu-img'>";
                                echo "<img class='img-responsive img-curve' src='admin/uploads/".$row['image']."'>";
                                echo "</div>"; //end food-menu-img

                           //the description 
                           echo "<div class='food-menu-desc'>";
                                echo "<h4 class= 'item'>".$row['ItemName']."</h4>";
                                echo "<p class='food-price'>$".$row['Price']."</p>";
                                echo "<p class='food-detail'>".$row['description']."</p>";
                                echo "<br>";
                                echo "<button class='add-to-cart'>Add to Cart</button>";
                            echo "</div>";//end food-menu-desc
                        echo "</div>";//end food-menu-box
                    }//end while
                }//end if
                else{
                    echo "No Products available.";
                }
                ?>   

        </div>
            <!----Dinner END ----------------------------------------------------------->
            
            
        <!--------------------Drinks Start-------------------------------------------------->
        <div id = "Drinks" class="menu-container">
            <h3 class="text-left" style="color: white; font-size:28px;">Drinks</h3>
            
             <!-- opening php code to pull from database-->
                <?php
                //pull each value
                if ($drinksResult->num_rows > 0) {
                    while($row = $drinksResult->fetch_assoc()) {
                        echo "<div class='food-menu-box''>";

                            //the image
                            echo "<div class='food-menu-img'>";
                                echo "<img class='img-responsive img-curve' src='admin/uploads/".$row['image']."'>";
                                echo "</div>"; //end food-menu-img

                           //the description 
                           echo "<div class='food-menu-desc'>";
                                echo "<h4 class= 'item'>".$row['ItemName']."</h4>";
                                echo "<p class='food-price'>$".$row['Price']."</p>";
                                echo "<p class='food-detail'>".$row['description']."</p>";
                                echo "<br>";
                                echo "<button class='add-to-cart'>Add to Cart</button>";
                            echo "</div>";//end food-menu-desc
                        echo "</div>";//end food-menu-box
                    }//end while
                }//end if
                else{
                    echo "No Products available.";
                }
                ?> 
            
            </div> 
            
            <!----Dinner END ----------------------------------------------------------->
            
            <div class="clearfix"></div>  
        </div><!--end container class-->
    </section>
    <!-- fOOD Menu Section Ends Here -->
</main>
    
    
    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-----------Cart SIDEBAR------------->
    <div class="sidebar" id = "sidebar">
        <div class="sidebar-close">
            <i class = "fa-solid fa-close"></i>
        </div>
        <div class="cart-menu">
            <h3>My Cart</h3>
            <div class="cart-items"></div>
        </div>
        <div class="sidebar--footer">
            <div class="total--amount">
                <h5>Total</h5>
                <div class="cart-total">$0.00</div>
            </div>
            
            <button class="checkout-btn">Checkout</button>
    
        </div>
    </div>




<script src="main.js"></script>
</body>
</html>