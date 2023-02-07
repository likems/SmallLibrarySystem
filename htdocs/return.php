<?php
include 'connect_db.php';


$isbn = $_POST["submit"];
    

$sql = "DELETE FROM `borrow` WHERE `b_ISBN` = '$isbn'";
$sql2="UPDATE `book` SET `isBorrowed` = '0' WHERE `book`.`ISBN` = '$isbn'";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);

echo"
<script>
alert('還書成功!');
window.location.href='mybook.php';
</script>";

//header("Location:mybook.php");
?>