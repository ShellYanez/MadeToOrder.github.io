<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="includes/style.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="addMenuItems.php">Add Menu Item</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navigation -->
            <div class="top-nav">
                <span>Welcome, Admin!</span>
            </div>

            <!-- Form Content -->
            <div class="form-container">
                <form action="code.php" method="POST" class="form-left" enctype="multipart/form-data">
                   <div class="form-left-title">      
                        <h2>Add a Menu Item</h2>
                        <hr>
                   </div>
                    
                   <input type="text" name="name" placeholder="Item Name" class="form-inputs" required>
                    
                   <input type="number" name="price" placeholder="Price" class="form-inputs" required>
                    
                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <option value="breakfast">Breakfast</option>
                        <option value="lunch">Lunch</option>
                        <option value="dinner">Dinner</option>
                        <option value="drinks">Drinks</option>
                    </select>
                    
                    
                    <input type="file" name="image" id="image" placeholder="Image URL" class="form-inputs" required>
                    
                    <textarea name="description" placeholder="Description" class="form-inputs" required></textarea>
                    
                    <button type="submit" name= "add_category_btn">Save</button> 
                </form>
            </div>
            
            
        </div>
    </div>

    <script src="includes/script.js"></script>
</body>

</html>