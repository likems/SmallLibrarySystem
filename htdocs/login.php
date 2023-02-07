<?php
session_start();
$message="";
include 'connect_db.php';
if(count($_POST)>0) 
{
  $result = mysqli_query($conn,"SELECT * FROM user WHERE uname='" . $_POST["user_name"] . "' and password = '". $_POST["pwd"]."'");
  $row  = mysqli_fetch_array($result);

  if(is_array($row)) 
    {
      $_SESSION["uname"] = $row['uname'];
    } 
    else 
    {
      $message = "使用者名稱或密碼錯誤";
    }
}
if(isset($_SESSION["uname"])) 
{
  header("Location:home.php");
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
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
    <link href="signin.css" rel="stylesheet">
    <title>小型圖書館-登入</title>
    </head>
    <body class="text-center">
    <main class="form-signin w-100 m-auto">
      <form method="POST" action="">
        
        <h1 class="h3 mb-3 fw-normal">小型圖書館使用者登入</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="使用者名稱" name="user_name">
          <label for="floatingInput">使用者名稱</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="密碼" name="pwd">
          <label for="floatingPassword">密碼</label>
        </div>
        <?php if($message!="") { echo $message; }?><br><br>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">登入</button>
        <a href="admin_login.php">管理員登入頁面</a>
      </form>
    </main>
        
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    </body>
</html>