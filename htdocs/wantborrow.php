<?php
include 'connect_db.php';

$isbn = $_POST["submit"];

$sql = "SELECT `email` FROM `user` WHERE `uname` IN (SELECT `b_uname` FROM `borrow` WHERE `b_ISBN` = '$isbn')";
$mailresult = mysqli_query($conn, $sql);
$sql2 = "SELECT `name` FROM `book` WHERE `ISBN`= '$isbn'";
$nameresult = mysqli_query($conn, $sql2);


$array=mysqli_fetch_row($mailresult);
$email=$array[0];
$array2=mysqli_fetch_row($nameresult);
$bname=$array2[0];

$msg = "有人想要書籍".$bname."請盡快歸還";



?>





<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
        </script>
    </head>
    <body>
  <script type="text/javascript">
          (function(){
              emailjs.init("rj6cdM-SOct5JN4gL");
          })();
</script>
<script>
  var templateParams = {
  from_name: '小型圖書館還書',
  to_name: '你好',
  message: '<?php echo $msg;?>',
  toMail: '<?php echo $email;?>'
};

emailjs.send('service_abttzoe', 'template_vq9rrew', templateParams)
  .then(function(response) {
      console.log('SUCCESS!', response.status, response.text);
  }, function(error) {
      console.log('FAILED...', error);
  });
</script>

        
        
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    </body>
</html> 


<?php
echo"
<script>
alert('通知還書成功!');
window.location.href='search.html';
</script>";
?> 

