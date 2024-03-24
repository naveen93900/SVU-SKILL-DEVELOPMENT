<?php
 $servername = "127.0.0.1:4306"; 
 $dbusername = "root"; 
 $dbpassword = ""; 
 $dbname = "minor"; 


// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch records from the database
$sql = "SELECT * FROM file_upload";

$result = $conn->query($sql);


// Display records in HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
h2{
  background-color: gray;
  padding-left: 30px;
  border-radius: 10px;
  color: white;
}


</style>


  </head>
<body>

<h1 align="center">Hello  <span style="color: blue;">MALLAPURAM</span> <br>Welcome to Admin page...!</h1><br><br>

<div class="container">
<h2 >  Files Records</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
  <thead>
  <thead>
<table class="table" >
    

    <tr>
      <th scope="col">Sr.No.</th>
      <th scope="col">Subject Name</th>
      <th scope="col">About</th>
      <th scope="col">File</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    
 

    <tbody>
    <?php




    $count=1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
           
            echo "<td>" . $count."</td>";
            echo "<td>" . $row["subject_name"] . "</td>";
            echo "<td>" . $row["about"] . "</td>";
            echo '<td><a href="uploads/'.$row['subject_name'].'"class=btn btn-info" download>Download<class="btn btn-dark"></a></td>';
            echo "<td>" . $row["time_stamp"] . "</td>";

            echo "</tr>";
            $count++;
        }
    } else {
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }
    ?>
</table>
</div>
</div>

<br><br><br><br><br><br><br><br><br>





<div class="container">
<h2> Student Records</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
  <thead>
  <thead>
<table class="table" >
    

    <tr>
      <th scope="col">Sr.No.</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
     
    </tr>
  </thead>
  <tbody class="table-group-divider">
    
 

    <tbody>
    <?php

$sql = "SELECT * FROM register";

$result = $conn->query($sql);

    $count=1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
           
            echo "<td>" . $count."</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";

            echo "</tr>";
            $count++;
        }
    } else {
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }
    ?>
</table>
</table>
</div>
</div>

<br><br><br><br><br><br><br><br>




<div class="container">
<h2> Enrollment Records</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
  <thead>
  <thead>
<table class="table" >
    

    <tr>
      <th scope="col">Sr.No.</th>
      <th scope="col">FIRST NAME</th>
      <th scope="col">LAST NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">MOBILE</th>
      <th scope="col">COURSE</th>
      <th scope="col">DATE OF BIRTH</th>
      <th scope="col">ADDRESS</th>
     
    </tr>
  </thead>
  <tbody class="table-group-divider">
    
 

    <tbody>
    <?php

$sql = "SELECT * FROM enroll";

$result = $conn->query($sql);

    $count=1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
           
            echo "<td>" . $count."</td>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["mobile"] . "</td>";
            echo "<td>" . $row["course"] . "</td>";
            echo "<td>" . $row["DOB"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";

            echo "</tr>";
            $count++;
        }
    } else {
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }
    ?>
</table>
</table>
</div>
</div>

<br><br><br><br><br><br><br><br>


<div class="container">
<h2> Department Records</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
  <thead>
  <thead>
<table class="table" >
    

    <tr>
      <th scope="col">Sr.No.</th>
      <th scope="col">Name</th>
      <th scope="col">ID</th>
      <th scope="col">Password</th>
      
    </tr>
  </thead>
  <tbody class="table-group-divider">
    
 

    <tbody>
    <?php


$sql = "SELECT * FROM dept_register";
$result = $conn->query($sql);


    $count=1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
           
            echo "<td>" . $count."</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["ID"] . "</td>";
            echo "<td>" . $row["Password"] . "</td>";
           
           

            echo "</tr>";
            $count++;
        }
    } else {
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }
    ?>
</table>
</div>
</div>
<br><br><br><br><br><br><br><br>

<div class="container">
<h2>  Inquiry Records</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
  <thead>
  <thead>
<table class="table" >
    

    <tr>
      <th scope="col">Sr.No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>
      
    </tr>
  </thead>
  <tbody class="table-group-divider">
    
 

    <tbody>
    <?php


$sql = "SELECT * FROM contact";
$result = $conn->query($sql);
$conn->close();

    $count=1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
           
            echo "<td>" . $count."</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
           
           

            echo "</tr>";
            $count++;
        }
    } else {
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }
    ?>
</table>
</div>
</div>


</body>
</html>

