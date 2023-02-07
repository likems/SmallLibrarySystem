<?php
include 'connect_db.php';

$sql = "SELECT * FROM `book`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "ISBN: " . $row["ISBN"]. " - Name: " . $row["name"]. "  type:" . $row["type"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
