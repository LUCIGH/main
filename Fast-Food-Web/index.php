<!DOCTYPE html>
<html lang="en">
<?php
    include("connection/connection.php");  
    error_reporting(0);  
    session_start(); 
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FastFood</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>  
    <!-- Menu -->
    <div class="menu">
        <nav>
            <label class="logo">
                <img src="images/Logo.jpg" alt="Menu Image" class="menu-image">
            </label>

            <ul>
                <li><a href="./index.php" class="active">Trang Chủ</a></li>
                <li><a href="./index.php?page_layout=menu&category=1" class="active">Menu</a></li>
                <li><a href="./index.php?page_layout=checkout" class="active">Đặt Hàng</a></li>
                <?php
                    if(empty($_SESSION["user_id"])) // if user is not login
                    {
                        echo    '<li><a href="./login.php" class="active">Đăng Nhập</a> </li>
                                <li><a href="./registration.php" class="active">Đăng Ký</a> </li>';
                    }
                    else
                    {
                        echo    '<li><a href="./index.php?page_layout=cart" class="active">Giỏ Hàng</a> </li>';
                        echo    '<li><a href="./index.php" class="active">Đăng xuất</a> </li>';
                    }
                ?>
            </ul>
        </nav>
    </div>

    <?php 
        $page_layout = isset($_GET['page_layout']) ? $_GET['page_layout'] : ''; 
        switch($page_layout) {
            case 'menu':
                include_once("menu/menu.php");
                break;
            default:
                include_once("home.php");
                break;
        }
        include_once("include/footer.php");
    ?>

</body>

</html>