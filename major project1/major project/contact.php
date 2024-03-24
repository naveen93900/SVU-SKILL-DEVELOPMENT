<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVU Skill Development -</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #3498db;
    color: #fff;
    text-align: center;
    padding: 20px;
}

nav {
    background-color: #333;
    color: #fff;
    padding: 10px;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    text-align: center;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

.main-content {
    padding: 20px;
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

form{
    background-color: #eff3f5;
    border-radius: 5px;
    padding: 20px;
    
    
}
label{
    margin-top:2px;
    margin-left: 50px;
}
input{
    background-color: rgb(255, 255, 255);
    margin-top: 30px;
    border-radius: 4px;
    width: 300px;
    
}
#message{
    background-color: rgb(255, 255, 255)

}
button{
    background-color: rgb(67, 83, 81);
    margin-left: 180px;
    margin-bottom: 10px;
    color: white;
    width: 100px;
}
img{
    margin-left: 500px;

}
#log-in {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 500px;
            
            
}



    </style>
</head>
<body>

    <?php
if(isset($_POST["submit"])) {

$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
//databasde connection
if (empty($name) || empty($email) || empty($message)) {
    echo "All fields are required.";
} else {
    // Assuming you have a database connection
    $servername = "127.0.0.1:4306"; // Change to your database server
    $dbusername = "root"; // Change to your database username
    $dbpassword = ""; // Change to your database password
    $dbname = "minor"; // Change to your database name

    // Create a connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
}
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into contact(name,email,message)values(?,?,?)");
    $stmt->bind_param("sss",$name,$email,$message);
    $stmt->execute();
    echo" WE WILL REACH OUT WITH IN 24 HOURS";
    echo"Thank you...!">
    $stmt->close();
    $conn->close();
}

}

?>



<header>
    <h1> SVU Skill Development</h1>
    <p>Unlock Your Potential</p>
</header>

<nav>
    <ul>
        <li><a href="home.html">Home</a></li>
       
        <li><a href="aboutus.html">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="careers.html">Careers</a></li>
       
       

       

    </ul>
</nav>

<section class="main-content">
    <h2>Inquiry</h2>

    <div class="contact-form">
        <form action="contact.php"  method="post" id="contactForm">
            <label for="name"> Name:</label>
            <input type="text" id="name" name="name" required>
            

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <br><br><br>

            <label for="message">Message:</label> 
            <textarea id="message" name="message" rows="5" required></textarea>
<br><br><br>      
<input id="pass"  type="submit" value="SUBMIT" name="submit">
        </form>
    </div>

    <div class="contact-info">
        <h3>Contact Information</h3>
        <p>Email: svuskilldevelopment@gmail.com</p>
        <p>Phone: +1 (123) 456-7890</p>
        <p>Mobile: +91 9390038437</p>
        <p>Address: 123 Skill Street, Tirupathi, Andhra Pradesh, 523102</p>
    </div>
</section>
<img src="svul.png" >

<footer>
    <p>&copy; 2024 SVU Skill Development. All rights reserved.</p>
</footer>

<script>

    // You can add JavaScript functionality here if needed.

function submitForm() {
    // Add logic to handle form submission (e.g., sending an email, storing data)
    alert("Form submitted successfully!");
    document.getElementById("contactForm").reset();
}

</script>
</body>
</html>
