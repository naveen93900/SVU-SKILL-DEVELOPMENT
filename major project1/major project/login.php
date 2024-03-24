<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVU Skill Development - Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-image: linear-gradient(rgb(247, 35, 120),rgb(152, 137, 137),rgb(116, 119, 116));
}

header {
    background-color: #3498db;
    color: #fff;
    text-align: center;
    padding: 20px;
}

.main-content {
    padding: 20px;
    text-align: center;
}

.login-form {
    max-width: 300px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 10px;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
</head>
<body>
    <?php
    if(isset($_POST["login"])){
    
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    if (empty($email) || empty($password)) {
        echo "All fields are required.";
    } else {
       
        $servername = "127.0.0.1:4306"; 
        $dbusername = "root"; 
        $dbpassword = ""; 
        $dbname = "minor"; 
        // Create a connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    }
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("select*from register where email=?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result=$stmt->get_result();
    
        if($stmt_result->num_rows > 0){
            $data=$stmt_result->fetch_assoc();
            if($data['password']===$password){
                header("Location: Tutorial.html");
                exit();
               
            }
            else{
                echo "<h2>Invalid email or Password</h2>";
            }
        } 
        else{
            echo "<h2>Invalid email or Password</h2>";
        }
    }
    }
        ?>
    



<header>
    <h1>SVU Skill Development</h1>
</header>

<section class="main-content">
    <h2>Login</h2>

    <div class="login-form">
        <form action="login.php" method="post"  id="loginForm">
            <label for="email">Email:</label>
            <input type="email" id="username" name="email" value="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input id="pass"  type="submit" value="LogIn" name="login">
        </form>
    </div>

    <p>Don't have an account? <a href="registration.html">Register here</a>.</p>
</section>

<footer>
    <p>&copy; 2024 SVU Skill Development. All rights reserved.</p>
</footer>

<script>
    function submitLogin() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Add logic for validating the login credentials
    if (username === "example" && password === "password") {
        alert("Login successful!");
        // Redirect to the home page or perform other actions
    } else {
        alert("Invalid username or password. Please try again.");
    }
}

</script>
</body>
</html>
