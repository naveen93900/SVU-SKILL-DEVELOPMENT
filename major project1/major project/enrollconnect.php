<?php
if(isset($_POST["enroll"])) {

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$course=$_POST['course'];
$DOB=$_POST['DOB'];
$address=$_POST['address'];




//databasde connection
if (empty($firstname) || empty($lastname) || empty($email) || empty($mobile) || empty($course) || empty($DOB)|| empty($address)) {
    echo "All fields are required.";
} else {
    
    $servername = "127.0.0.1:4306"; 
    $dbusername = "root"; 
    $dbpassword = "";
    $dbname = "minor"; 

    // Create a connection
    $conn= new mysqli($servername, $dbusername, $dbpassword, $dbname);
}
if($conn ->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into enroll(firstname,lastname,email,mobile,course,DOB,address)values(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssisss",$firstname,$lastname,$email,$mobile,$course,$DOB,$address);
    $stmt->execute();
    echo"Enroll successfully....!";
    $stmt->close();
    $conn->close();
}

}

?>