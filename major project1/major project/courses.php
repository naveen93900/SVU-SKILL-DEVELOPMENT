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

$conn->close();
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
</head>
<body>
<div class="container">
<h2>Records</h2>
<div class="table-responsive">
<table  class="table table-gray table-striped-columns">

  <thead>

    

    <tr>
      <th scope="col">Sr.No.</th>
      <th scope="col">Subject Name</th>
      <th scope="col">About</th>
      <th scope="col">File</th>
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
            echo '<td><a href="uploads/'.$row['subject_name'].'"class=btn btn-info" download><ul>Download<ul><class="btn btn-dark"></a></td>';
        
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

