<?php
session_start();
require_once('utils/utility.php');
require_once('database/dbhelper.php');

$sql = "select * from Category";
$menuItems = excuteResult($sql);

$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id order by Product.updated_at desc limit 0,8";

$lastestItems = excuteResult($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/ban_thue_truyen/css/style.css">
    <title>Trang chủ</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ban_thue_truyen/js/slider_product.js">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0.11/dist/flickity.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <!--Important link from source https://bootsnipp.com/snippets/rlXdE-->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <style>
        .cart_icon {
            position: fixed;
            z-index: 1;
            right: 0px;
            top: 30%;
        }

        .cart_icon img {
            width: 60px;
        }

        .cart_icon .cart_count {
            background-color: red;
            color: white;
            font-size: 16px;
            padding-top: 2px;
            padding-bottom: 2px;
            padding-left: 10px;
            padding-right: 10px;
            font-weight: bold;
            border-radius: 12px;
            position: fixed;
            right: 40px;
        }
    </style>
</head>

<body>

<!--Nav bar-->
<div>
    <ul class="nav navbar-light bg-light " style="margin-top: 0px !important; ">
        <li class="nav-item" style="margin-top: 0px !important;padding: 0 !important; ;">
            <img src="https://i.pinimg.com/originals/7a/a4/de/7aa4debaef01c10536832ee61e9d50a7.png" alt="logo" width="70px">
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Trang chủ</a>
        </li>

        <?php
        foreach ($menuItems as $item) {
            echo '<li class="nav-item">
        <a class="nav-link" href="category.php?id='.$item['id'].'">'.$item['name'].'</a>
    </li>';
        }
        ?>

        <li class="nav-item">
            <a class="nav-link" href="contact.php">Liên hệ</a>
        </li>

    </ul>

<!--End Nav bar-->

    <!--Slider-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img height="500px" class="d-block w-100" src="https://images.squarespace-cdn.com/content/v1/5330a186e4b05c0d7e0a37ee/1504197307735-PQQVG6I97794TTRBN1AA/Slider+1+-+Book+Design+-+Book+Designer+-+Parke+Book+Creations.jpg?format=1500w"alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>...</h5>
                    <p>...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img height="500px" class="d-block w-100" src="https://s19499.pcdn.co/wp-content/uploads/2020/02/slider-istock-kindle-ebook-electronic-book-ebooks-ereader-e-reader-e-book-ereaders-kindles.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Test Carousel</h5>
                    <p>Test Carousel</p>
                </div>
            </div>
            <div class="carousel-item">
                <img height="500px" class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHdrkk3pg4F2EaJ37QrJJgEQTFva-_117sdZlTzXfL9wr8zP5P3-vZCs5YOmW_8a1fR50&usqp=CAU" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>...</h5>
                    <p>...</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--End Slider-->
</div>


<!--Lastest Product-->


<div class="container">
    <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">SẢN PHẨM MỚI NHẤT</h1>
    <div class="row" style="margin-bottom: 100px">
        <?php
        foreach($lastestItems as $item) {
            if ($item['deleted'] == 0) {
                echo '<div class="col-md-3 col-6 product-item">
					<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">'.$item['category_name'].'</p>
					<a href="detail.php?id='.$item['id'].'"><p style="font-weight: bold;">'.$item['title'].'</p></a>
					<p style="color: red; font-weight: bold;">'.number_format($item['discount']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
            }
            }

        ?>
    </div>
</div>


<!--End Lastest Product-->

<!--    Danh mục sản phảm   -->
<?php
$count = 0;
foreach ($menuItems as $item) {
    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = ".$item['id']." order by Product.updated_at desc limit 0,4";

    $items = excuteResult($sql);
//    if($items == null || count($items) < 4)continue;
?>
    <div style="background-color: <?=($count++%2 == 0)?'#f7f9fa':''?>;">
    <div class="container">
    <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;"><?=$item['name']?></h1>
    <div class="row" style="margin-bottom: 100px">
        <?php
        foreach($items as $pItem) {
            if ($pItem['deleted'] == 0) {
                echo '<div class="col-md-3 col-6 product-item">
					<a href="detail.php?id='.$pItem['id'].'"><img src="'.$pItem['thumbnail'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">'.$pItem['category_name'].'</p>
					<a href="detail.php?id='.$pItem['id'].'"><p style="font-weight: bold;">'.$pItem['title'].'</p></a>
					<p style="color: red; font-weight: bold;">'.number_format($pItem['discount']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$pItem['id'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
            }
        }

        ?>
    </div>
    </div>
        </div>
<?php
}
?>

<!--    End Danh mục sản phẩm  -->

<?php
    require_once ('layout/footer.php');
?>

<style>
    .nav {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        width: 100%; z-index: 99999;
    }
    .navbar-custom {
        background-color: lightgreen;
    }
    .navbar-custom .navbar-brand,
    .navbar-custom .navbar-text {
        color: green;
    }
    .navbar-custom {
        background: none;
    }
</style>
