<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

session_start();

// Connect to database
include ('admin/config/dbcon.php');

// Fetch cart data
$cart_query = mysqli_query($con, "SELECT * FROM `cart`");
$total = 0;

// Calculate total price
if (mysqli_num_rows($cart_query) > 0) {
    while ($cart_item = mysqli_fetch_assoc($cart_query)) {
        $total += $cart_item['price'] * $cart_item['quantity'];
    }
}

// Handle order submission
if (isset($_POST['place_order'])) {
    $customer_name = $_POST['customer_name'];
    $customer_email =$_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $customer_cc = $_POST['customer_cc'];
    $order_total = $total;

    $order_query = mysqli_query($con, "INSERT INTO `orders` (customerName, customerEmail, customerPhone, CreditCard, TotalAmount) VALUES ('$customer_name', '$customer_email', '$customer_phone','$customer_cc', '$order_total')");


    if ($order_query) {
        $order_query = mysqli_query($con, "SELECT MAX(OrderID) AS last_order_id FROM `orders`");
        $order = mysqli_fetch_assoc($order_query);
        $order_id = $order['last_order_id'];
        
        $cart_query = mysqli_query($con, "SELECT * FROM `cart`");
        while ($cart_item = mysqli_fetch_assoc($cart_query)) {
            $menu_item_id = $cart_item['id']; // Assuming `id` is the MenuItemID
            $quantity = $cart_item['quantity'];
            $subtotal = $cart_item['price']; // Total price for this item

            // Insert into `orderdetails` table
            $details_query = mysqli_query($con, "INSERT INTO `orderdetail` (OrderID, MenuItemID, Quantity, Subtotal) 
                                                 VALUES ('$order_id', '$menu_item_id', '$quantity', '$subtotal')");
            if (!$details_query) {
                die("Order Details Error: " . mysqli_error($con));
            }
        }


        mysqli_query($con, "DELETE FROM `cart`"); // Clear cart after order is placed
        echo "<script>alert('Order placed successfully!'); window.location.href = 'menu.php';</script>";
    } else {
        echo "<script>alert('Order placement failed. Please try again.');</script>";
    }
    
    
}

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
    <!-- Navbar Section Ends Here -->


    <section class="checkout">
        <div class="container">
            <h2 class="text-center">Checkout</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Food Item</th>
                        <th> QTY</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $cart_query = mysqli_query($con, "SELECT * FROM `cart`");
                    if (mysqli_num_rows($cart_query) > 0) {
                        while ($cart_item = mysqli_fetch_assoc($cart_query)) {
                            echo "
                                <tr>
                                    <td>{$cart_item['name']}</td>
                                    <td>{$cart_item['quantity']}
                                    <td>$ {$cart_item['price']}</td>
                                </tr>";
                        }
                        echo "
                            <tr style='background-color: #D1FFBD;'>
                                <td><strong>Total:</strong></td>
                                <td></td>
                                <td><strong>$ {$total}</strong></td>
                            </tr>";
                    } else {
                        echo "<tr><td colspan='2'>Your cart is empty.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            
            <form action="" method="POST" >
               <br>
               <br>
                <h3 class="text-center" style="color: grey;"> Enter Payment Information</h3>
                <div class="form-group">
                    <label for="customer_name" style>Name:</label>
                    <input type="text" placeholder="Enter your Name" name="customer_name"  required>
                </div>
                <div class="form-group">
                    <label for="customer_email">Email:</label>
                    <input type="email" name="customer_email" placeholder="Enter your E-mail" required>
                </div>
                <div class="form-group">
                    <label for="customer_phone">Phone:</label>
                    <input type="text" name="customer_phone" placeholder="Enter your Phone#" required>
                </div>
                <div class="form-group">
                    <label for="customer_cc">Credit Card #:</label>
                    <input type="text" name="customer_cc" placeholder="Enter your CC#" maxlength="19" required>
                </div>
                <br>
                <input type="submit" name="place_order" class="btn form-group" placeholder="Place Order">
            </form>
            <br>
            <a href="cart.php" class="btn form-group">Back to Cart</a>
        </div>
    </section>
</body>
</html>
