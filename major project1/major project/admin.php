<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input {
            margin-bottom: 10px;
        }
        button{
            margin-bottom: 10px;
            margin-left: 250px;
            
        }
    </style>
</head>
<body>


    <div id="container">
        <h2>Admin Page</h2>

        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process form data
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Add your authentication logic here
            // For example, you can check if the username and password are correct
            if ($username == "naveen" && $password == "naveen@123") {
               
                header("Location: records.php");
                exit();


            } else {
                echo "<p style='color: red;'>Invalid username or password.</p>";
            }
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control"required>
            <br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control"required>
            <br><br>
            <button    type="submit"  class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
