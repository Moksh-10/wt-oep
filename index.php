<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Finder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="food.jpg" />
</head>
<body>
    <div class="container">
        <div class="meal-wrapper">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <a href="logout.php" class="search-btn">Logout</a>

            <!-- Meal Search Section -->
            <h3>Search for a Meal</h3>

            <blockquote>
                Real food doesn't have ingredients, real food is ingredients.<br />
                <cite>- Jamie Oliver</cite>
            </blockquote>

            <!-- Meal name search -->
            <div class="meal-search-box">
                <input type="text" id="meal-input" class="search-control" placeholder="Enter meal name">
                <button class="search-btn" id="meal-btn">Search by Name</button>
            </div>

            <!-- Area search -->
            <div class="meal-search-box">
                <select id="area-select" class="search-control">
                    <option value="">Select Area</option>
                    <option value="American">American</option>
                    <option value="British">British</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Indian">Indian</option>
                    <option value="Italian">Italian</option>
                    <option value="Mexican">Mexican</option>
                </select>
                <button class="search-btn" id="area-btn">Search by Area</button>
            </div>

            <h2 class="title">Your Search Results:</h2>
            <div class="meal-result" id="meal">
                <!-- Meal items will be populated here -->
            </div>

            <div class="meal-details">
                <!-- Recipe close button -->
                <button type="button" class="btn recipe-close-btn" id="recipe-close-btn">
                    <i class="fas fa-times"></i>
                </button>

                <!-- Meal content -->
                <div class="meal-details-content">
                    <!-- Meal details will be populated here -->
                </div>
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>
</html>
