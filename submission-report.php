<!DOCTYPE html>
<html>

<head>
    <title>Food Haven - Recipe Submitted</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f1f1;
        }

        .contain {
            max-width: 800px;
            margin: 3rem auto 0;
            /* Add margin-top to move the content lower */
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #d65108;
        }

        .submitted-details {
            margin-bottom: 2rem;
        }

        .submitted-details h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .submitted-details p {
            margin-bottom: 0.8rem;
            line-height: 1.4;
        }

        .submitted-details label {
            font-weight: bold;
        }

        .submitted-details a {
            color: #d65108;
            text-decoration: none;

        }

        .submitted-details a:hover {
            text-decoration: none;

        }
    </style>
</head>

<body>
    <div class="header">
        <a href="index.php" class="logo no-hover">Food Haven - Submission Report</a>
        <div class="header-right">
            <a href="index.php">Home</a>
            <a href="upload.php">Upload</a>
            <a href="search.html">Search</a>
            <a href="about.html">About</a>
        </div>
    </div>

    <div class="container">
        <div class="contain">
            <h2 class="submitted-h2">Recipe Submitted Successfully!</h2>
            <div class="submitted-details">
                <h3 class="submitted-h3">Submitted Recipe Details:</h3>
                <p class="submitted-p"><label>Full Name:</label>
                    <?php echo $_GET["fullName"]; ?>
                </p>
                <p class="submitted-p"><label>Email Address:</label>
                    <?php echo $_GET["emailAddress"]; ?>
                </p>
                <p class="submitted-p"><label>Meal Name:</label>
                    <?php echo $_GET["mealName"]; ?>
                </p>
                <p class="submitted-p"><label>Category Name:</label>
                    <?php echo $_GET["categoryName"]; ?>
                </p>
                <p class="submitted-p"><label>Instructions:</label>
                    <?php echo $_GET["instructions"]; ?>
                </p>
                <p class="submitted-p"><label>Picture:</label> <a href="<?php echo $_GET["picture"]; ?>"><?php echo $_GET["picture"]; ?></a></p>
                <p class="submitted-p"><label>Video Link:</label> <a href="<?php echo $_GET["videoLink"]; ?>"><?php echo $_GET["videoLink"]; ?></a></p>
            </div>

            <p>Thank you for sharing your recipe with us! If you'd like to submit another recipe, <a
                    href="upload.php">click here</a>.</p>
        </div>
    </div>
</body>

</html>
