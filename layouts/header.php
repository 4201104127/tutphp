<!DOCTYPE html>
<html>
    <head>
        <title>Shop</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="/tutphp/layouts/favicon.png">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css?v=?<?php echo time(); ?>">
        <script src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="204097884474-cndods9sgpqnvhfm1dg7soih5j5hh50u.apps.googleusercontent.com">

    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Welcome</a>to my shop
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if (isset($_SESSION['name_user'])): ?>
                                            <li>Xin chào: <?php echo ($_SESSION['name_user']); ?></li>
                                            <li>
                                                <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="info-user.php">Thông tin</a></li>
                                                    <li><a href="gio-hang.php">Giỏ hàng</a></li>
                                                    <li><a href="thoat.php">Đăng xuất</a></li>
                                                </ul>
                                            </li>
                                        <?php else: ?>    
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-unlock"></i> Đăng ký</a>
                                            </li>
                                            
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-share-square-o"></i> Đăng nhập</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: -15px; margin-bottom: -15px; " class="container">
                    <div class="row" id="header-main">
                        
                        <div style="margin: auto; width: 20%;">
                            <a href=""><img height="65px" width="270px" src="<?php echo base_url() ?>public/frontend/images/logo.png"></a>
                        </div>
                        <!--<div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0986420994</p>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
            <div id="menunav">
                <div class="container" style="padding-top:1px;padding-bottom: 1px;">
                    <nav>
                        <div class="home pull-left">
                            <a href="../tutphp">Trang chủ</a>
                        </div>
                        <ul id="menu-main">
                            <li class="">
                                <a href="">Shop</a>
                            </li>
                            <li>
                                <a href="">Giới thiệu</a>
                            </li>
                            <li class="">
                                <a href="dia-chi.php">Địa chỉ</a>
                            </li>
                            
                            <li>
                                <style type="text/css">
                                    .fc:focus
                                    {
                                        box-shadow: 0 0 10px dimgray;
                                    }
                                </style>
                                <form  action="search.php" class="form-inline" method="GET">
                                    <input required style="margin-top: 4px; height: 32px; background-color: #353535; color: white; border-color: #353535; border-radius: 3px;" class="form-control fc" type="text" placeholder="Search..." name="search"> 
                                    <button style="margin-top: 4px; height: 32px; background-color: #444; color: white; border-color: #444" class="fa fa-search form-control" type="submit" name="submit">
                                    </button>
                                </form>
                                
                            </li>
                        </ul>
                        <ul class="pull-right" id="main-shopping">

                            <li>
                                <a style="background-color: #ea3a3c;" href="gio-hang.php"><i style="background-color: #ea3a3c" class="fa fa-shopping-bag"></i> &nbspGiỏ hàng<i class="sosp" style="margin-left: 6px; padding: 6px 10px; font-style: normal; border-radius: 3px;"><?php if (isset($_SESSION['sosp'])) {echo $_SESSION['sosp'];} else {echo "0";} ?></i></a>
                            </li>
                        </ul>
                        <ul class="pull-right arrow-left">
                            <li>
                                <a style="background-color: #ea3a3c" href=""></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>&nbsp&nbsp Danh mục</h3>
                            <!--<ul>
                                <li>
                                    <a href="">Máy tính  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>                                
                            </ul>-->
                            <ul>
                                <?php foreach($category as $item): ?>
                                    <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="title-main"><a style="text-decoration: none">Sản phẩm mới</a><p style="margin-bottom: -14px; margin-top: -3px" class="arrow"></h3>
                            <ul>
                                <?php foreach($productNew as $item): ?>
                                <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thumbn'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name'] ?></p>
                                            <b class="sale">Giá gốc: <?php echo formatPrice($item['price']); ?></b><br>
                                            <b class="price">Giá: <?php echo formatpricesale($item['price'],$item['sale']); ?></b><br>
                                            <span class="view"><i class="fa fa-eye"></i> code : <i class="fa fa-heart-o"></i> code</span>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>   
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="title-main"><a style="text-decoration: none">Sản phẩm bán chạy</a><p style="margin-bottom: -14px; margin-top: -3px" class="arrow"></h3>
                            <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach($productPay as $item): ?>
                                <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thumbn'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name'] ?></p>
                                            <b class="sale">Giá gốc: <?php echo formatPrice($item['price']); ?></b><br>
                                            <b class="price">Giá: <?php echo formatpricesale($item['price'],$item['sale']); ?></b><br>
                                            <span class="view"><i class="fa fa-eye"></i> code : <i class="fa fa-heart-o"></i> code</span>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>   
                            </ul>
                        </div>
                    </div>