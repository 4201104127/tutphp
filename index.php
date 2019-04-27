
<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY updated_at";
    $CategoryHome = $db->fetchsql($sqlHomecate);
    $data = [];
    foreach ($CategoryHome as $item)
    {
        $cateId = intval($item['id']);
        $sql = "SELECT * FROM product WHERE category_id = $cateId LIMIT 4";
        $ProductHome = $db->fetchsql($sql);
        $data[$item['name']] = $ProductHome;
        
    }
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section id="slide" class="text-center" >
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <style type="text/css">
                        .carousel-indicators li {border-radius: 10px; border: 1px solid gray; height: 4px; width: 30px; margin-left: 3px; margin-right: 3px; text-indent: -999px; background-color: transparent;}
                        .carousel-indicators .active {border-radius: 10px; height: 6px; width: 30px; margin-left: 3px; margin-right: 3px; text-indent: -999px; background-color: honeydew;}

                        @keyframes zoom {
                           from {
                                transform: scale(1,1);
                           }
                           to {
                                transform: scale(1.2,1.2);
                           }
                        }
                        #imgslide {
                            width: 870px;
                            height: 430px;
                            animation: zoom 3s infinite alternate;
                        }
                    </style>
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img id="imgslide" src="<?php echo base_url() ?>public/frontend/images/slide/slide1.jpg" alt="">
                            <div class="carousel-caption">
                                <h3>Text</h3>
                                <p>Text</p>
                            </div>
                        </div>
                        <div class="item">
                            <img id="imgslide" src="<?php echo base_url() ?>public/frontend/images/slide/slide2.jpg" alt="">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="item">
                            <img id="imgslide" src="<?php echo base_url() ?>public/frontend/images/slide/slide3.jpg" alt="">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
            <br>
            <section class="box-main1">
                <?php foreach ($data as $key => $value): ?>
                    <h3 class="title-main"><a href="" style="text-decoration: none"><?php echo $key; ?> </a><p style="margin-bottom: -14px; margin-top: -3px" class="arrow"></h3>
                    <div class="showitem clearfix">
                        <?php foreach ($value as $item): ?>
                            <div class="col-md-3  item-product bor">
                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>">
                                <img src="<?php echo uploads() ?>/product/<?php echo $item['thumbn'] ?>" class="" width="100%" height="180">
                                </a>
                                <div class="info-item">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>"><?php echo $item['name'] ?>
                                        <?php if ($item['number'] <= 0): ?>
                                            <span style="font-style: italic;">(Đã hết hàng)</span>
                                        <?php endif; ?>
                                    </a>
                                    <p>
                                        <strike class="sale"><?php echo formatPrice($item['price']); ?></strike> 
                                        <br> 
                                        <b class="price"><?php echo formatpricesale($item['price'],$item['sale']); ?></b>
                                    </p>
                                </div>
                                <div class="hidenitem">
                                    <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>"><i class="fa fa-search"></i></a></p>
                                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                                    <?php if ($item['number'] > 0): ?>
                                        <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                    <?php endif;?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>

    <?php require_once __DIR__. "/layouts/footer.php"; ?>