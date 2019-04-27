
<?php 
	require_once __DIR__. "/autoload/autoload.php";
	$id = intval(getInput('id'));
	$EditCategory = $db->fetchID("category", $id);

	if (isset($_GET['p'])) 
	{
		$p = $_GET['p'];
	}
	else
	{
		$p = 1;
	}
	$sql = "SELECT * FROM product WHERE category_id = $id";
	$total = count($db->fetchsql($sql));
	$product = $db->fetchJones("category",$sql,$total,$p,3,true);
	$sotrang = $product['page'];
	unset($product['page']);
	$path = $_SERVER['SCRIPT_NAME'];

?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            
            <section class="box-main1" style="margin-top: 10px;">
                <h3 class="title-main" ><a style="text-decoration: none"><?php echo $EditCategory['name'] ?></a><p style="margin-bottom: -14px; margin-top: -3px" class="arrow"></h3>
                
                <div class="showitem clearfix">
                    <?php foreach($product as $item):  ?>
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
	                <?php endforeach ?>
                </div>
                <nav class="text-center">
                	<ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                		<?php for ($i=1; $i <= $sotrang ; $i++): ?>
                			<li class="<?php echo ($p== $i) ? 'active' : '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                		<?php endfor; ?>
                        <li>
                            <a href="" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
					</ul>
                </nav>
            </section>
        </div>

    <?php require_once __DIR__. "/layouts/footer.php"; ?>
                