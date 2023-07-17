<!DOCTYPE html>
<html>

<head>
    <title>Food Haven</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="index.php" class="logo no-hover">Food Haven</a>
            <div class="header-right">
                <a href="index.php">Home</a>
                <a href="upload.php">Upload</a>
                <a href="search.html">Search</a>
                <a href="about.html">About</a>
            </div>
        </div>

        <div class="meal-wrapper">

            <div class="meal-result">
                <h2 class="title">Welcome to the Food Haven</h2>
                <h3 style="font-weight: normal">Track ingredients and find the new cooking inspiration!</h3>
                <div id="meal">
                    <?php
                    $servername = "localhost";
                    $username = "userr";
                    $password = "root";
                    $dbname = "userr";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch all data from the userRecipe table
                    $sql = "SELECT * FROM userRecipe";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output the data for each row
                        while ($row = $result->fetch_assoc()) {
                            $mealName = $row["mealName"];
                            $categoryName = $row["categoryName"];
                            $instructions = $row["instructions"];
                            $picture = $row["picture"];
                            $videoLink = $row["videoLink"];

                            echo "<div class='meal-item'>";
                            echo "<div class='meal-img'>";
                            echo "<img src='$picture' alt='food' />";
                            echo "</div>";
                            echo "<div class='meal-name'>";
                            echo "<h3>$mealName</h3>";
                            echo "<a href='#' class='recipe-btn' onclick=\"showRecipe('$mealName', '$categoryName', '$instructions', '$picture', '$videoLink'); return false;\">Get Recipe</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "No data found.";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
            </div>
            <div class="meal-details">
                <!-- recipe close btn -->
                <button type="button" class="btn recipe-close-btn" id="recipe-close-btn">
                    <i class="fas fa-times"></i>
                </button>

                <!-- meal content -->
                <div class="meal-details-content">
                    <h2 class="recipe-title"></h2>
                    <p class="recipe-category"></p>
                    <div class="recipe-instruct">
                        <h3>Instructions:</h3>
                        <p></p>
                    </div>
                    <div class="recipe-meal-img">
                        <img src="" alt="" />
                    </div>
                    <div class="recipe-link">
                        <a href="" target="_blank">Watch Video</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer hidden">
        <div class="container">
            <p>&copy; 2023 Food Haven. All rights reserved.</p>
        </div>
    </footer>
    <script>
        // Function to display the recipe details when "Get Recipe" button is clicked
        function showRecipe(mealName, categoryName, instructions, picture, videoLink) {
            document.querySelector(".recipe-title").innerHTML = mealName;
            document.querySelector(".recipe-category").innerHTML = "Category: " + categoryName;
            document.querySelector(".recipe-instruct p").innerHTML = instructions;
            document.querySelector(".recipe-meal-img img").src = picture;
            document.querySelector(".recipe-link a").href = videoLink;
            document.querySelector(".meal-details").style.display = "block"; // Show the meal details section

        }

        // Close the meal details section when the close button is clicked
        document.querySelector("#recipe-close-btn").addEventListener("click", function () {
            document.querySelector(".meal-details").style.display = "none";
        });

        // Hide the meal details section on page load
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelector(".meal-details").style.display = "none";
        });
    </script>

    <script>
        // Get the footer element
        const footer = document.querySelector('.footer');

        // Add an event listener to the scroll event
        window.addEventListener('scroll', () => {
            // Calculate the scroll position
            const scrollPosition = window.scrollY || window.pageYOffset;

            // Calculate the height of the entire page
            const pageHeight = document.documentElement.scrollHeight - window.innerHeight;

            // Check if the scroll position is near the bottom of the page
            if (scrollPosition > 0.9999 * pageHeight) {
                // Remove the "hidden" class from the footer
                footer.classList.remove('hidden');
            } else {
                // Add the "hidden" class to the footer
                footer.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
