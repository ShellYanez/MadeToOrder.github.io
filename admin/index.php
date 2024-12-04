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

            <!-- Dashboard Content -->
            <div class="dashboard">
                <h3>Dashboard</h3>
                <div class="stats">
                    <div class="card">
                        <h4>Total Users</h4>
                        <p>1,250</p>
                    </div>
                    <div class="card">
                        <h4>Active Sessions</h4>
                        <p>30</p>
                    </div>
                    <div class="card">
                        <h4>Reports</h4>
                        <p>12</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="includes/script.js"></script>
</body>

</html>
