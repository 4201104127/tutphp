
<?php
    require_once __DIR__. "/autoload/autoload.php";
     
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            
            <section class="box-main1" style="margin-top: 10px;">                
                <div class="showitem clearfix">
                    <?php if (isset($_REQUEST['submit']))
                        {
                            $key = $_POST['search'];
                            $sql = "SELECT * FROM product WHERE name LIKE '%$key%'";
                            $query = mysql_query($sql) or die();
                            $num = mysql_num_rows($query);
                            if ($num == 0)
                            {
                                echo "Không tìm thấy";
                            }
                            else
                            {
                                while ($row = mysql_fetch_array($query))
                                {
                    ?>
                                <div class="col-md-3 item-product bor">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>">
                                    <img src="<?php echo uploads() ?>/product/<?php echo $item['thumbn'] ?>" class="" width="100%" height="180">
                                    </a>
                                    <div class="info-item">
                                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>"><?php echo $item['name'] ?></a>
                                        <p>
                                            <strike class="sale"><?php echo formatPrice($item['price']); ?></strike> 
                                            <br> 
                                            <b class="price"><?php echo formatpricesale($item['price'],$item['sale']); ?></b>
                                        </p>
                                    </div>
                                    <div class="hidenitem">
                                        <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>"><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div>
                    <?php    
                                }
                            }
                        }
                    ?>
                </div>
            </section>
        </div>

    <?php require_once __DIR__. "/layouts/footer.php"; ?>
