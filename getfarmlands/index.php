<?Php
header('Content-type: application/json; charset=utf-8');

 include("../lib/conn.php");


$id=$_GET['id'];


$conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $valid = false;
  }
  
  $sql = "SELECT farmlands.* , company.name as ownerDisplayName  FROM `farmlands` LEFT JOIN `company` ON farmlands.company_id=company.id";

  if(is_numeric($id)){
    $sql= $sql." where farmlands.id=".$id;
  }

  $result = $conn->query($sql);
  $rows = array();

  $conn -> close();
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
  } else {
  
  }

echo json_encode($rows);

?>