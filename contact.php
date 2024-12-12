<?php  
//defining all php variables before the start of the html
session_start();

//- open link to database 
include ('admin/config/dbcon.php');

//end php definitions
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
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
<body>
    
    <div class="contact-container">
        <form action="https://api.web3forms.com/submit" method="POST" class="contact-left">
           <div class="contact-left-title">      
                <h2>Get In Touch</h2>
                <hr>
           </div>
           <input type="hidden" name="access_key" value="308d3e69-e4f8-4bc8-84c1-91c431017fef">
           <input type="text" name="name" placeholder="Your Name" class="contact-inputs" required>
           <input type="email" name="email" placeholder="Your Email" class="contact-inputs" required>
           <textarea name="message" placeholder="Your Message" class="contact-inputs" required></textarea>
           <button type="submit">Submit <img src="images/arrow_icon.png" alt=""></button> 
        </form>
        <div class="contact-right">
            <img src="/images/black-background.png" alt="">
        </div>
    </div>
</body>
</html>
