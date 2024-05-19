
<?php
    session_start();


    if ($_SESSION["permission"] != 'true'){
        header("Location: index.php");
       die();
   
   }
    

     
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "mpowerr_lms_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    
    $sql = "SELECT * from student_details";
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <h1 style="text-align:center;">Students Management</h1>
    <hr>


    <form style="margin-left: 150px; margin-right: 150px;" ACTION="register.php" METHOD = "post">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Age</label>
            <input name="age" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Age">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Marks</label>
            <input name="marks" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Marks">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <h1 style="text-align:center;">Class System Data</h1>
    <hr>

    <table style="width: 800px; margin-left:100px;" class="table table-dark" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Student Name</th>
            <th scope="col">Age</th>
            <th scope="col">Mars</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        echo "<tr>";
                        echo "<th scope='row'>". $row['name'] ."</th>";
                        echo "<th scope='row'>". $row['age'] ."</th>";
                        echo "<th scope='row'>". $row['marks'] ."</th>";
                        echo "<td><a href='deletedata.php/?auto_id=".$row['auto_id']."' class='btn btn-danger'>Delete</a> | <a href='editdata.php/?auto_id=".$row['auto_id']."'class='btn btn-success'>Edit</button></a>";
                        echo "</tr>";
                    
                        
                    } 
                } 
            
            ?>

            </tbody>
       
    </table>


    <a href="logout.php" style='margin: 10px;' class="btn btn-primary btn-lg btn-block">Logout</a>


</body>
</html>