<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <title>Modern Login Page</title>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body{
    background-color: #c9d6ff;
    background: linear-gradient(to right, #e2e2e2, #c9d6ff);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 100vh;
}
.container{
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
}




.container span{
    font-size: 12px;
}

.container button{
    background-color: orange;
    color: #fff;
    font-size: 12px;
    padding: 10px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
}



.container button:hover{
    background-color: #00a1ff;
}

.container button.hidden{
    background-color: transparent;
    border-color: #fff;
}


.container form{
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    height: 100%;
}
.container input{
    background-color: #eee;
    border: none;
    margin: 8px 0;
    padding: 10px 15px;
    font-size: 13px;
    border-radius: 8px;
    width: 100%;
    outline: none;
}

.form-container{
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in{
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.active .sign-in{
    transform: translateX(100%);
}

.sign-up{
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.active .sign-up{
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: move 0.6s;
}







.toggle-container{
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: all 0.6s ease-in-out;
    border-radius: 150px 0 0 100px;
    z-index: 1000;
}

.container.active .toggle-container{
    transform: translateX(-100%);
    border-radius: 0 150px 100px 0;
}
.toggle{
    background-color: linear-gradient(to left, #00a1ff, #00ff8f);
    height: 100%;
    background: linear-gradient(to right, white  , gray);
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}


.container.active .toggle{
    transform: translateX(50%);
}

.toggle-panel{
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 30px;
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.toggle-left{
    transform: translateX(-200%);
}

.container.active .toggle-left{
    transform: translateX(0);
}

.toggle-right{
    right: 0;
    transform: translateX(0);
}

.container.active .toggle-right{
    transform: translateX(200%);
}


    </style>





</head>


<body>

<?php
if(isset($_POST["register"])) {

$username=$_POST['user_name'];
$email=$_POST['id'];
$password=$_POST['password'];
//databasde connection
if (empty($username) || empty($email) || empty($password)) {
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
    $stmt=$conn->prepare("insert into dept_register(Name,ID,Password)values(?,?,?)");
    $stmt->bind_param("sis",$username,$email,$password);
    $stmt->execute();
    echo"registration successfully";
    $stmt->close();
   
}

}


?>

<?php
if(isset($_POST["login"])){


$email=$_POST['id'];
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
    $stmt=$conn->prepare("select*from dept_register where ID=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result=$stmt->get_result();

    if($stmt_result->num_rows > 0){
        $data=$stmt_result->fetch_assoc();
        if($data['Password']===$password){
            $_SESSION["id"] = $email;

        // Redirect to another page (e.g., dashboard.php)
        header("Location: upload.php");
           
        }
        else{
            echo "<h2>Invalid email or Password</h2>";
        }
    } 
    else{
        echo "<h2>Invalid email or Password</h2>";
    }
    $conn->close();
}
}
    ?>





    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="dept_login.php" method="post" >
                <h1>Create Account</h1>
               
                <span>or use your ID for registeration</span>
                <input type="text" placeholder="Name" name="user_name">
                <input type="number" placeholder="ID" name="id">
                <input type="password" placeholder="Password" name="password">
                <button name="register">register</button>
            </form>
        </div>




        

        <div class="form-container sign-in">

            <form action="dept_login.php" method="post">
                <h1>log in</h1>
               
                <span>or use your ID password</span>
                <input type="number" placeholder="ID" name="id">
                <input type="password" placeholder="Password" name="password">
               
                <button name="login">log In </button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back !</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login" name="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome..!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="register">register</button>
                </div>
            </div>
        </div>
    </div>

    
  
    
    
    
    
 <script>


const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

        </script>

</body>




</html>
