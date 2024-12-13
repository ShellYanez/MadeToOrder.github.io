<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

//import database connection
include_once ('config/dbcon.php');

if(isset($_POST['add_category_btn'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    


    //note the path to the new images folder from 
    //the code.php
    $path = "uploads";
    
    //getting full image extension
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
    
    //write queries for insertion
    //note use $filename instead of $image
    $item_query = "INSERT INTO MenuItem (ItemName, Price, Category, image, description) 
    VALUES ('$name', '$price', '$category', '$filename', '$description')";
    
    

    //insert into database
    $item_query_run=mysqli_query($con, $item_query);
    
    
    
    //if insertion was successful, add image to uploads folder
    //Either way, redirect user to add another menu item
    if($item_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        
        //success message
        echo "<script>alert('Menu item added successfully!'); window.location.href = 'addMenuItems.php';</script>";
   
    }
    else{ 
        echo "<script>alert('Something went wrong.'); window.location.href = 'addMenuItems.php';</script>";
    }
    
       
    
        
        
    
}


?>