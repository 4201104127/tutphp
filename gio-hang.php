
<?php 
	require_once __DIR__. "/autoload/autoload.php";
    $sum = 0;
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
    {
        echo "<script type='text/javascript'>alert('Không có sản phẩm trong giỏ hàng!');location.href='index.php'</script>";
    }
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <br>
            <section class="box-main1">
                <h3 class="title-main" style="text-decoration: none;"><a href="javascript:void(0)"> Giỏ hàng </a><p style="margin-bottom: -14px; margin-top: -3px" class="arrow"></h3><br>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <strong>Success! </strong><?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                    </div>
                <?php endif; ?>
                <table class="table table-hover">
                	<thead>
                		<tr>
                			<th>STT</th>
                			<th>Tên sản phẩm</th>
                			<th>Hình ảnh</th>
                			<th>Số lượng</th>
                			<th>Giá</th>
                			<th>Tổng tiền</th>
                			<th>Thao tác</th>
                		</tr>
                	</thead>
                	<tbody>
                		<?php $stt = 1; $_SESSION['sosp'] = 0; foreach($_SESSION['cart'] as $key => $value): ?>
            				<tr>
                				<td><?php echo $stt; ?></td>
                				<td><?php echo $value['name']; ?></td>
                				<td>
                					<img src="<?php echo uploads() ?>product/<?php echo $value['thumbn'] ?>" width="40px" height="40px">
                				</td>
                				<td>
                					<input id="qty" type="number" name="qty" value="<?php echo $value['qty']; ?>" class="form-control" style="height: 30px; width: 65px;" min="0">
                				</td>
                				<td><?php echo formatPrice($value['price']); ?></td>
                				<td><?php echo formatPrice($value['price'] * $value['qty']); ?></td>
                				<td>
                					<a href="remove.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"><i class="fa fa-times" style="color: white;"></i> Xóa</a>
                					<a href="" class="btn btn-xs btn-primary updatecart" data-key=<?php echo $key ?>><i class="fa fa-refresh" style="color: white;"></i> Cập nhật</a>
                				</td>
                			</tr>
                			<?php 
                                $sum += $value['price'] * $value['qty']; 
                                $_SESSION['tongtien'] = $sum;
                                $_SESSION['sosp'] = $stt;
                            ?>
                                                        
                		<?php $stt++; endforeach; ?>
                        <script type="text/javascript">
                                var x = document.getElementsByClassName("sosp");
                                x[0].innerHTML = "<?php echo $_SESSION['sosp']; ?>";
                        </script>

                	</tbody>
                </table>
                <div class="col-md-5 pull-right">
                	<ul class="list-group">
                		<li class="list-group-item">
                			<h3 style="font-family: sans-serif;">Thông tin đơn hàng</h3>
                		</li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $_SESSION['sosp'] ?></span> Số sản phẩm
                        </li>
                		<li class="list-group-item">
                			<span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span> Số tiền
                		</li>
                		<li class="list-group-item">
                			<span class="badge">10%</span> Thuế VAT
                		</li>
                		<li class="list-group-item">
                			<span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien'] * 110/100; echo formatPrice($_SESSION['total']); ?></span> Tổng tiền thanh toán
                		</li>
                		<li class="list-group-item">
                			<a href="index.php" class="btn btn-primary">Tiếp tục  mua hàng</a>
                			<a href="thanh-toan.php" class="btn btn-primary pull-right">Thanh toán</a>
                		</li>
                	</ul>
                </div>
            </section>
        </div>

    <?php require_once __DIR__. "/layouts/footer.php"; ?>
                