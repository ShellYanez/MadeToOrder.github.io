<?php  
//defining all php variables before the start of the html
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
session_start();

//- open link to database 
include ('admin/config/dbcon.php');


//update query 
if(isset($_POST['update_product_quantity']))
{
    $update_val = $_POST['update_quantity']; 
   // echo $update_val; 
   $update_id= $_POST['update_quantity_id']; 

   $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET price = ((price / quantity) * $update_val), quantity = $update_val WHERE id = $update_id");

}



if (isset($_GET['remove']))
{
    $remove_id = $_GET['remove']; 
    
    mysqli_query($con, "DELETE FROM `cart` WHERE id=$remove_id"); 
}

if (isset($_GET['delete_all']))
{
    mysqli_query($con, "DELETE FROM `cart`");
    header('location:cart.php');
}

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

    <!--NavBar section ends -->
    <section class="food-menu">
        <div class= "container">
        <h2 class="text-center">My Cart</h2>
        <br>
        <div class="menu-container">
        <div class="food-menu-box-cart">
        <table >
            <?php
               $select_cart_products = mysqli_query($con, "SELECT * from `cart`"); 
               $total = 0;
               if(mysqli_num_rows($select_cart_products) > 0)
               {
                echo "<thead>
                <tr>
                <th>SR#</th>
                <th>Food Item</th>
                <th>Food Image</th>
                <th>Food Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>"; 
                while($fetch_cart_products=mysqli_fetch_assoc($select_cart_products))
                {
            ?>
                    <tr>
                    <td><?php echo $fetch_cart_products['id']?></td>
                    <td><?php echo $fetch_cart_products['name']?></td>
                    <td><div class="food-menu-img-cart"><img src="admin/uploads/<?php echo $fetch_cart_products['image']?>" alt="soup" class='img-responsive img-curve'></div></td>
                    <td>
                        <form action="" method ="post">
                            <input type="hidden" value="<?php echo $fetch_cart_products['id']?>" name="update_quantity_id">

                        <div class = "quantity-box">
                            <input type="number" min="1" value="<?php echo $fetch_cart_products['quantity']?>" name="update_quantity">
                            <input type="submit" class= "update-quantity" value="Update" name="update_product_quantity">
                        </div>
                        </form>
                        </td>
                    <td>$<?php echo $fetch_cart_products['price']?></td>
                    <td>
                        <a href="cart.php?remove=<?php echo $fetch_cart_products['id']?>" style = "color: black;" onclick = "return confirm('Are you sure you want to delete this item')">
                        <i class="fas fa-trash" style="color: DogerBlue;"></i>Remove</a>
                    </td>
                </tr>
                
            <?php

                    $total = $total + ($fetch_cart_products['price']);
                }
                    }     else
                {
                    echo "<h4 style='text-align: center';>Your cart is empty.</h4>";
                 }
            ?>
            

            </tbody>
            </table>
            <?php 
               if ($total > 0)
               {
                   echo
                   <div class=table_bottom id='total'>
                       <a href='menu.php' class = 'bottom_btn'>Continue Shopping</a>
                       <a href='' class='bottom_btn'>Cart Total: $<span>$total</span></p>
                       <a href='checkout.php' class = 'bottom_btn'>Proceed to Checkout</a>
                   </div>

                   ";
               
            ?>
            


<div class= "delete_all_btn">
<i class="fas fa-trash"></i><a href="cart.php?delete_all" style= "color: black;">Remove All</a>
</div>
<?php
               }else
               {
                echo ""; 
               }
?>

        </div>
        </div>
        </div>
            
         </section>




</body>
</html>