<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MadeToOrder Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="style.css">
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
                        <a href ="#" class = "cart-icon" id="shoppingCart"><span>0</span>My Cart</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Pick Your Algorithm</h2>

            <a href="menu.php#Breakfast">
            <div class="box-3 float-container">
                <img src="images/genericBreakfast.png" alt="Breakfast" class="img-responsive img-curve">

                <h3 class="float-text text-white">Breakfast</h3>
            </div>
            </a>

            <a href="menu.php">
            <div class="box-3 float-container">
                <img src="images/genericLunch.jpeg" alt="Lunch" class="img-responsive img-curve">

                <h3 class="float-text text-white">Lunch</h3>
            </div>
            </a>

            <a href="menu.php">
            <div class="box-3 float-container">
                <img src="images/genericDinner.jpeg" alt="Dinner" class="img-responsive img-curve">

                <h3 class="float-text text-white">Dinner</h3>
            </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Her-->


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
    
</body>
</html>
