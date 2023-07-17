<!DOCTYPE html>
<html>

<head>
    <title>Food Haven - Submit Recipe</title>
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
            <h2 class="title">Share Your Secret Recipe With Us!</h2>
            <div class="cont">

                <div class="submit-form">

                    <form action="upload-process.php" method="POST">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="upload-input" id="fullName" name="fullName"
                                placeholder="enter you full name" required>
                            <label for="emailAddress">Email Address</label>
                            <input type="email" id="emailAddress" name="emailAddress"
                                placeholder="enter a valid email address" required>
                            <hr>
                            <label for="mealName">Meal</label>
                            <input type="text" class="upload-input" id="mealName" name="mealName"
                                placeholder="meal name" required>
                        </div>
                        <div class="form-group">
                            <label for="categoryName">Category</label>
                            <input type="text" class="upload-input" id="categoryName" name="categoryName"
                                placeholder="category name e.g. chicken, beef, egg" required>
                        </div>
                        <div class="form-group">
                            <label for="instructions">Instructions</label>
                            <textarea id="instructions" name="instructions" placeholder="  write your guide to cook.."
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="picture">Image</label>
                            <input type="text" class="upload-input" id="picture" name="picture"
                                placeholder="paste image link" required>
                        </div>
                        <div class="form-group">
                            <label for="videoLink">Video</label>
                            <input type="text" class="upload-input" id="videoLink" name="videoLink"
                                placeholder="paste video link" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn form-btn">Submit</button>
                        </div>
                    </form>
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
