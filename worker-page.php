<!DOCTYPE html>
<html>
  <link rel="stylesheet" href= "css/style2.css">
  <body>
<?php


$servername = "localhost";

// REPLACE with your Database name
$dbname = "login";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM workers ORDER BY id DESC";

echo '
  <div class = "container">
    <header id = "main-header"> Workers In Database </header>
      <table cellspacing="5" cellpadding="5" class = "box">
        <tr>
          <td>ID</td> 
          <td>Name</td> 
          <td>Contact</td>
        </tr>
      
  </div>
  
        ';
  
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_name = $row["name"];
        $row_contact = $row["contact"];
        echo '
        <form action = "worker-page.php" method = "post" class="input-container">
        <div>  
          <tr > 
            <td >' . $row_id . '</td> 
            <td>' . $row_name . '</td> 
            <td>' . $row_contact . '</td>  
            <td><input type="submit" class="btn" name="delete" value="delete"/><td>
          </tr>
        </div>
        </form>
          ';

          if(isset($_POST['delete'])){
            $delete_query = mysqli_query($conn, "DELETE FROM workers WHERE id = '$row_id'");
          }

          
    }

    $result->free();
}

$conn->close();
?> 
</table>
 <button class= "btn"><a href="signup-worker.php">Add Worker</a></button>
</body>
</html>