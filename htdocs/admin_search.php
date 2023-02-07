<?php
include 'connect_db.php';

$query_text = $_POST["query_text"];
$option = $_POST["submit"];
    

if($option == "1")
{
  $sql = "SELECT * FROM `book` WHERE `name` LIKE '%$query_text%'";
}

if($option == "2")
{
  $sql = "SELECT * FROM `book` WHERE `ISBN` = '$query_text'";
}

if($option == "3")
{
  $sql = "SELECT * FROM `book` WHERE `author` LIKE '%$query_text%'";
}

if($option == "4")
{
  $sql = "SELECT * FROM `book` WHERE `type` LIKE '%$query_text%'";
}

$result = mysqli_query($conn, $sql);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>小型圖書館-查詢/刪除</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    

    

<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">小型圖書館系統</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">登出</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="admin_home.php">
              <span data-feather="home" class="align-text-bottom"></span>
              首頁
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin_search.html">
              <span data-feather="search" class="align-text-bottom"></span>
              查詢/刪除
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="newbook.html">
              <span data-feather="book" class="align-text-bottom"></span>
              新增書籍
            </a>
          </li>
          
       
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">查詢/借閱</h1>
        
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
                    <td>
                    <?php 
                    if ($array[4]==0)
                    {
                    ?>
                      <form action="delbook.php" method="POST"><button type="submit" class="btn btn-sm btn-danger" name="submit" value="<?php echo $array[0];?>">刪除</button></form>
                    <?php
                    }
                    else
                    {
                    ?>
                      <form action="" method="POST"><button type="submit" class="btn btn-sm btn-secondary" name="submit" value="<?php echo $array[0];?>">被借走</button></form>
                    <?php
                    }
                    ?>
                    </td>
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
      
    

      
    </main>
  </div>
</div>


    <script src="js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
