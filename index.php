<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Find Meal For Your Ingredients</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/x-icon" href="Images/favicon.ico" />
  </head>
  <body>
    <div class="container">
      <div class="meal-wrapper">
        <div class="meal-search">
          <h2 class="title">Find Meals For Your Ingredients</h2>
          <blockquote>
            Real food doesn't have ingredients, real food is ingredients.<br />
            <cite>- Jamie Oliver</cite>
          </blockquote>

          <!-- PHP Section: User Greeting -->
          <?php
          // Start the session
          session_start();

          // Check if the form has been submitted
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // Get the name from the form input
              $name = htmlspecialchars(trim($_POST['name']));

              // Store the name in a session variable
              $_SESSION['name'] = $name;
          }

          // Check if a name is set in the session
          if (isset($_SESSION['name'])) {
              echo "<h3>Welcome, " . $_SESSION['name'] . "!</h3>";
          }
          ?>

          <!-- Name Submission Form -->
          <form method="POST" action="">
            <input type="text" name="name" placeholder="Enter your name" required />
            <button type="submit" class="btn">Submit</button>
          </form>

          <div class="meal-search-box">
            <input
              type="text"
              class="search-control"
              placeholder="Search recipe"
              id="search-input"
            />
            <button type="submit" class="search-btn btn" id="search-btn">
              <h1 style="font-size: small">By Ingredients</h1>
            </button>
            <button
              type="submit"
              class="search-btn btn"
              id="search-btn-ingredient"
            >
              <h1 style="font-size: small">By Area</h1>
            </button>
          </div>
        </div>

        <div class="meal-result">
          <h2 class="title">Your Search Results:</h2>
          <div id="meal">
            <!-- meal item -->
            <!-- <div class = "meal-item">
            <div class = "meal-img">
              <img src = "food.jpg" alt = "food">
            </div>
            <div class = "meal-name">
              <h3>Potato Chips</h3>
              <a href = "#" class = "recipe-btn">Get Recipe</a>
            </div>
          </div> -->
            <!-- end of meal item -->
          </div>
        </div>

        <div class="meal-details">
          <!-- recipe close btn -->
          <button
            type="button"
            class="btn recipe-close-btn"
            id="recipe-close-btn"
          >
            <i class="fas fa-times"></i>
          </button>

          <!-- meal content -->
          <div class="meal-details-content">
            <!-- <h2 class = "recipe-title">Meals Name Here</h2>
          <p class = "recipe-category">Category Name</p>
          <div class = "recipe-instruct">
            <h3>Instructions:</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo blanditiis quis accusantium natus! Porro, reiciendis maiores molestiae distinctio veniam ratione ex provident ipsa, soluta suscipit quam eos velit autem iste!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet aliquam voluptatibus ad obcaecati magnam, esse numquam nisi ut adipisci in?</p>
          </div>
          <div class = "recipe-meal-img">
            <img src = "food.jpg" alt = "">
          </div>
          <div class = "recipe-link">
            <a href = "#" target = "_blank">Watch Video</a>
          </div> -->
          </div>
        </div>
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
