<?php
include 'connect_db.php';

$query_text = $_POST["query_text"];
$option = $_POST["submit"];
    

if($option == "1")
{
  $sql = "SELECT * FROM `book` WHERE `name` LIKE '$query_text'";
}

if($option == "2")
{
  $sql = "SELECT * FROM `book` WHERE `ISBN` = '$query_text'";
}

if($option == "3")
{
  $sql = "SELECT * FROM `book` WHERE `author` LIKE '$query_text'";
}

if($option == "4")
{
  $sql = "SELECT * FROM `book` WHERE `type` LIKE '$query_text'";
}

$result = mysqli_query($conn, $sql);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
  <div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ISBN</th>
                  <th scope="col">書名</th>
                  <th scope="col">作者</th>
                  <th scope="col">類別</th>
                  <th scope="col">借閱狀態</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[4];?></td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">搜尋沒有結果:(</td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
              </tbody>
            </table>
        </div>
    </div>        
  </div>
        
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    </body>
</html>
