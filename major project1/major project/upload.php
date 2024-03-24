<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Upload</title>
    <link rel="stylesheet" href="styles2.css">
            <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <script src="script.js"></script>
    
    <style>

        form{
           
            width: 500px;
            height: 500px;
            margin-left: 400px;
            padding: 20px;
        }
        header {
    background-color: #3498db;
    color: #fff;
    text-align: center;
    padding: 20px;
    background-image: linear-gradient(rgb(60, 150, 215), rgb(55, 122, 161),rgba(5, 5, 6, 0.904));
}
body {
                    margin: 0;
                    font-family: Arial, sans-serif;
                 
                }
                .navbar {
                    height: 100%;
                    width: 20;
                    position: fixed;
                    z-index: 1;
                    top: 0;
                    left: 0;
                    background-color: #333;
                    overflow-x: hidden;
                    transition: 0.5s;
                    padding-top: 30px;
                }
        
                .navbar a {
                    padding: 5px 5px 3px 64px;
                    text-decoration: none;
                    font-size: 25px;
                    color: white;
                    display: block;
                    transition: 0.3s;
                }
        
                .navbar a:hover {
                    color: #818181;
                }
        
                .navbar .closebtn {
                    position: absolute;
                    top: 0;
                    right: 25px;
                    font-size: 36px;
                    margin-left: 50px;
                }
        
                
                #main {
                    transition: margin-left .5s;
                    padding: 10px;
                }

                 .dropdown-content {
    display: none;
    background-color: #333;
    padding-left: 20px;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }
    </style>
</head>
<body>
    <?php

    // Database connection
    $servername = "127.0.0.1:4306"; 
    $dbusername = "root"; 
    $dbpassword = ""; 
    $dbname = "minor"; 
    
    
    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Form data
   
    
    // File upload
    if(isset($_POST["submit"])){
        $subjectName = $_POST['subjectName'];
        $about = $_POST['about'];
    
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["pdfFile"]["name"]);
    $fileType=strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    
    
    //check if file is a pdf and less than 20mb
    if($fileType !="pdf"||$_FILES["pdfFile"]["size"]>2000000000){
        echo "Error: Only PDF files less than 20MB are ALLOWED to upload.";
    
    }
    else{
        //move uploaded file to uploads folder
    
    
    if(move_uploaded_file($_FILES["pdfFile"]["tmp_name"],$targetFile)){
        //insert file information into database
        $filename=$_FILES["pdfFile"]["name"];
        $folder_path=$targetDirectory;
        $time_stamp=date('Y-m-d H:i:s');
    
    // Insert data into the database
    $sql = "INSERT INTO file_upload (subject_name, about, file,folder_path,time_stamp) 
    VALUES ('$subjectName','$about' ,'$filename','$folder_path','$time_stamp')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Subject information uploaded successfully";
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }else{
        echo"Error uploading File.";
    }
    }
    }
    $conn->close();
    
    ?>
    
    <header align="center">
        <h1>SVU Skill Development</h1>
        <p>Unlock Your Potential</p>
    </header>
    <div id="navbar" class="navbar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
           
            <a href="home.html">Home</a>
            <a href="careers.html">Careers</a>
            <a href="aboutus.html">About Us</a>

            
      <a href="courses.php">PDF</a>
     
   >

            
           

           
        </div>
        
        <div id="main">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">☰ Menu</span>
           
        </div>


    <h2 align="center">Upload Data</h2>

    <div class="card" width=600px>
    <form align="center"  action="upload.php" method="post" enctype="multipart/form-data">
       
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1" for="subjectName">@</span>
            <input type="text" class="form-control" placeholder="Course Name"
             aria-label="Username" aria-describedby="basic-addon1" name="subjectName" required>
          </div>

        <br><br>
        <div class="input-group">
            <input for="pdfFile" type="file" class="form-control" id="inputGroupFile04"aria-describedby="inputGroupFileAddon04" aria-label="Upload"  name="pdfFile" required>
           
          </div>

       
<br><br>

<div class="mb-3">
    <label for="about" class="form-label">About</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="about"></textarea>
</div>
       
        <br><br>
        <input   class="btn btn-success" type="submit" value="Upload" name="submit"  class="input-group-text">
        <input class="btn btn-primary" type="reset" value="Reset">
    </form>
    </div>

    <script>
      function openNav() {
    document.getElementById("navbar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("navbar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
    </script>


</body>
</html>
