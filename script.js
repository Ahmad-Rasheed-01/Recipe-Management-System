// Get the search button, meal list, meal details content, and recipe close button elements
const searchBtn = document.getElementById("search-btn");
const mealList = document.getElementById("meal");
const mealDetailsContent = document.querySelector(".meal-details-content");
const recipeCloseBtn = document.getElementById("recipe-close-btn");

// Add event listeners
searchBtn.addEventListener("click", getMealList);
mealList.addEventListener("click", getMealRecipe);
recipeCloseBtn.addEventListener("click", () => {
  mealDetailsContent.parentElement.classList.remove("showRecipe");
}); // Listen for click on the recipe close button

// Function to get the meal list that matches with the ingredients
function getMealList() {
  let searchInputTxt = document.getElementById("search-input").value.trim(); // Get the search input value
  // Fetch the data from the API
  fetch(
    `https://www.themealdb.com/api/json/v1/1/filter.php?i=${searchInputTxt}`
  )
    .then((response) => response.json())
    .then((data) => {
      let html = "";
      // Check if meals are found
      if (data.meals) {
        // Iterate over each meal and create HTML markup
        data.meals.forEach((meal) => {
          html += `
                    <div class = "meal-item" data-id = "${meal.idMeal}">
                        <div class = "meal-img">
                            <img src = "${meal.strMealThumb}" alt = "food">
                        </div>
                        <div class = "meal-name">
                            <h3>${meal.strMeal}</h3>
                            <a href = "#" class = "recipe-btn">Get Recipe</a>
                        </div>
                    </div>
                `;
        });
        mealList.classList.remove("notFound"); // Remove the "notFound" class from the meal list
      } else {
        html = "Sorry, we didn't find any meal!";
        mealList.classList.add("notFound"); // Add the "notFound" class to the meal list
      }

      mealList.innerHTML = html; // Set the HTML content of the meal list
    });
}

// Function to get the recipe of the selected meal
function getMealRecipe(e) {
  e.preventDefault();
  // Check if the clicked element has the "recipe-btn" class
  if (e.target.classList.contains("recipe-btn")) {
    let mealItem = e.target.parentElement.parentElement;
    // Fetch the data for the selected meal
    fetch(
      `https://www.themealdb.com/api/json/v1/1/lookup.php?i=${mealItem.dataset.id}`
    )
      .then((response) => response.json())
      .then((data) => mealRecipeModal(data.meals));
  }
}

// Function to create a modal with the meal recipe
function mealRecipeModal(meal) {
  console.log(meal);
  meal = meal[0]; // Get the first meal from the array
  let html = `
        <h2 class = "recipe-title">${meal.strMeal}</h2>
        <p class = "recipe-category">${meal.strCategory}</p>
        <div class = "recipe-instruct">
            <h3>Instructions:</h3>
            <p>${meal.strInstructions}</p>
        </div>
        <div class = "recipe-meal-img">
            <img src = "${meal.strMealThumb}" alt = "">
        </div>
        <div class = "recipe-link">
            <a href = "${meal.strYoutube}" target = "_blank">Watch Video</a>
        </div>
    `;
  mealDetailsContent.innerHTML = html; // Set the HTML content of the meal details
  mealDetailsContent.parentElement.classList.add("showRecipe"); // Add the "showRecipe" class to the parent element to display the meal details
}
