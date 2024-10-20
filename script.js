document.addEventListener('DOMContentLoaded', function () {
    const searchBtn = document.getElementById("meal-btn"); // Search by meal name button
    const areaBtn = document.getElementById("area-btn"); // Search by area button
    const mealList = document.getElementById("meal"); // Meal results container
    const mealDetailsContent = document.querySelector(".meal-details-content"); // Meal details container
    const recipeCloseBtn = document.getElementById("recipe-close-btn"); // Close recipe modal button

    // Event listeners
    searchBtn.addEventListener("click", getMealList); // Search meals by name
    areaBtn.addEventListener("click", getAreaMealList); // Search meals by area
    mealList.addEventListener("click", getMealRecipe); // Get recipe on meal item click
    recipeCloseBtn.addEventListener("click", () => {
        mealDetailsContent.parentElement.classList.remove("showRecipe"); // Close recipe modal
    });

    // Fetch meal by name
    function getMealList() {
        const searchInputTxt = document.getElementById('meal-input').value.trim();
        if (searchInputTxt) {
            fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${searchInputTxt}`)
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    if (data.meals) {
                        data.meals.forEach(meal => {
                            html += `
                                <div class="meal-item" data-id="${meal.idMeal}">
                                    <div class="meal-img">
                                        <img src="${meal.strMealThumb}" alt="meal">
                                    </div>
                                    <h3>${meal.strMeal}</h3>
                                    <a href="#" class="recipe-btn">Get Recipe</a>
                                </div>
                            `;
                        });
                        mealList.innerHTML = html;
                    } else {
                        mealList.innerHTML = "<p class='notFound'>No meals found.</p>";
                    }
                })
                .catch(error => {
                    mealList.innerHTML = "<p class='notFound'>Error fetching data.</p>";
                    console.error("Error fetching meal by name:", error);
                });
        } else {
            mealList.innerHTML = "<p class='notFound'>Please enter a meal name.</p>";
        }
    }

    // Fetch meal by area
    function getAreaMealList() {
        const selectedArea = document.getElementById('area-select').value;
        if (selectedArea) {
            fetch(`https://www.themealdb.com/api/json/v1/1/filter.php?a=${selectedArea}`)
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    if (data.meals) {
                        data.meals.forEach(meal => {
                            html += `
                                <div class="meal-item" data-id="${meal.idMeal}">
                                    <div class="meal-img">
                                        <img src="${meal.strMealThumb}" alt="meal">
                                    </div>
                                    <h3>${meal.strMeal}</h3>
                                    <a href="#" class="recipe-btn">Get Recipe</a>
                                </div>
                            `;
                        });
                        mealList.innerHTML = html;
                    } else {
                        mealList.innerHTML = "<p class='notFound'>No meals found for this area.</p>";
                    }
                })
                .catch(error => {
                    mealList.innerHTML = "<p class='notFound'>Error fetching data.</p>";
                    console.error("Error fetching meals by area:", error);
                });
        } else {
            mealList.innerHTML = "<p class='notFound'>Please select an area.</p>";
        }
    }

    // Get recipe of the meal
    function getMealRecipe(e) {
        e.preventDefault();
        if (e.target.classList.contains("recipe-btn")) {
            const mealItem = e.target.closest('.meal-item'); // Use closest to ensure proper element selection
            fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${mealItem.dataset.id}`)
                .then(response => response.json())
                .then(data => mealRecipeModal(data.meals))
                .catch(error => {
                    console.error("Error fetching meal recipe:", error);
                });
        }
    }

    // Create a modal
    function mealRecipeModal(meal) {
        meal = meal[0];
        let html = `
            <h2 class="recipe-title">${meal.strMeal}</h2>
            <p class="recipe-category">${meal.strCategory}</p>
            <div class="recipe-instruct">
                <h3>Instructions:</h3>
                <p>${meal.strInstructions}</p>
            </div>
            <div class="recipe-meal-img">
                <img src="${meal.strMealThumb}" alt="">
            </div>
            <div class="recipe-link">
                <a href="${meal.strYoutube}" target="_blank">Watch Video</a>
            </div>
        `;
        mealDetailsContent.innerHTML = html;
        mealDetailsContent.parentElement.classList.add("showRecipe");
    }
});
