<?php
session_start();
if($_SESSION["uname"]) 
{
}
else header("Location:login.php");
$usr = $_SESSION["uname"];
include 'connect_db.php';


$isbn = $_POST["submit"];
$today = date("Y-m-d");
$endday = date('Y-m-d', strtotime("+2 week", strtotime($today)));
$namesql = "SELECT name FROM `book` WHERE `ISBN` = '$isbn'";
$nameresult = mysqli_query($conn, $namesql);
$uname = $_SESSION["uname"];

$array=mysqli_fetch_row($nameresult);
$bookname=$array[0];
    
$sql= "INSERT INTO `borrow` (`b_ISBN`, `b_uname`, `b_bname`, `start`, `end`) VALUES ('$isbn', '$uname', '$bookname', '$today', '$endday')";
$sql2="UPDATE `book` SET `isBorrowed` = '1' WHERE `book`.`ISBN` = $isbn";

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
// echo $isbn;


echo"<script>
alert('借書成功!');
window.location.href='mybook.php';
</script>";


//header("Location:mybook.php");
?>