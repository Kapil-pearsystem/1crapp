<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f8ff; /* Light blue background */
    color: #333; /* Dark text color */
    text-align: center;
    margin: 0;
    padding: 0;
}

.container {
    padding: 50px;
}

.error-code {
    font-size: 100px;
    color: #00aaff; /* Light blue text */
}

.error-message {
    font-size: 24px;
    margin: 20px 0;
}

p {
    font-size: 18px;
    margin-bottom: 30px;
}

.back-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #00aaff; /* Light blue button */
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.back-button:hover {
    background-color: #0088cc; /* Darker blue on hover */
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="error-code">404</h1>
        <h2 class="error-message">Oops! Page Not Found</h2>
        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <a href="javascript:history.back()" class="back-button">Go Back</a>
    </div>
</body>
</html>
