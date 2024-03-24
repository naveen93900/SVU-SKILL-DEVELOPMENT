<?php
if(isset($_POST["submit"])) {

$username=$_POST['username'];
$email=$_POST['email'];
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
    $stmt=$conn->prepare("insert into register(username,email,password)values(?,?,?)");
    $stmt->bind_param("sss",$username,$email,$password);
    $stmt->execute();
    echo"registration successfully";
    $stmt->close();
    $conn->close();
}

}

?>