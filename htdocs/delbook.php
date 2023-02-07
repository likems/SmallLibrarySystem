<?php
include 'connect_db.php';


$isbn = $_POST["submit"];
    

$sql = "DELETE FROM `book` WHERE `ISBN` = '$isbn'";

$result = mysqli_query($conn, $sql);


echo"
<script>
alert('刪除成功!');
window.location.href='admin_search.html';
</script>";

//header("Location:mybook.php");
?>