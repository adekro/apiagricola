<?Php
 include("../lib/conn.php");
$conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $valid = false;
  }

  $sql = "SELECT * FROM `farmlands`";
  $result = $conn->query($sql);
  $rows = array();
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
  } else {
  
  }

print_r(json_encode($rows));

?>