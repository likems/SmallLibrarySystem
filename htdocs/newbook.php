<?php
include 'connect_db.php';

$bname = $_POST["bname"];
$ISBN = $_POST["ISBN"];
$author = $_POST["author"];
$type = $_POST["type"];

$msg = "有新書".$bname."上架，歡迎借閱";




$sql = "INSERT INTO `book`(`ISBN`, `author`, `type`, `name`, `isBorrowed`) VALUES ('$ISBN', '$author', '$type', '$bname', 0)";
$result = mysqli_query($conn, $sql);



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
  from_name: '小型圖書館新書',
  to_name: '你好',
  message: '<?php echo $msg;?>',
  toMail: 'wyj.dblab@gmail.com'
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
alert('新增書籍成功!');
window.location.href='newbook.html';
</script>";
?> 


