<?php
    $open = "transaction";
    require_once __DIR__. "/../../autoload/autoload.php";


    $id = intval(getInput('id'));
    $sql = "SELECT transaction.*, user.name as nameuser, user.phone as phoneuser, user.email as emailuser FROM transaction LEFT JOIN user ON user.id = transaction.users_id WHERE transaction.id = $id";
    $transaction = $db->fetchsqlID($sql);
    $sql2 = "SELECT orders.*, product.name as nameproduct FROM orders LEFT JOIN product ON product.id = orders.product_id WHERE orders.transaction_id = $id";
    $orders = $db->fetchsql($sql2);
    ?>
<?php require_once __DIR__. "/../../layouts/header.php";?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Hóa đơn
            </h1>
            <div class="clearfix"></div>
            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
        </div>
    </div>
    <div  id="printinvoice">
        <div class="pull-left">
            Tên shop

        </div>
        <div class="pull-right">
            Tên shop
            
        </div><br>
        <div style="float:left; width:700px; box-shadow:0 0 3px #aaa; height:auto;color:#666;">
            <div style="width:100%; padding:10px; float:left; background:#1ca8dd; color:#fff; font-size:30px; text-align:center;">
                Đơn hàng
            </div>
            <div style="width:100%; padding:0px 0px;border-bottom:1px solid rgba(0,0,0,0.2);float:left;">
                <div style="margin-left: 10px; width:50%; float:left; padding:10px;">
                    <span style="font-size:14px; float:left; width:100%; padding-bottom: 5px;">
                    <b>Tên khách hàng:</b> <?php echo $transaction['nameuser'] ?>
                    </span>
                    <span style="font-size:14px; float:left; width:100%; padding-bottom: 5px;">
                    <b>Phone:</b> <?php echo $transaction['phoneuser'] ?>
                    </span>
                    <span style="font-size:14px; float:left; width:100%; padding-bottom: 5px;">
                    <b>Email:</b> <?php echo $transaction['emailuser'] ?>
                    </span>
                </div>
                <div style="margin-left: 10px; width:40%; float:right; padding:10px;">
                    <span style="font-size:14px; float:left; width:100%; padding-bottom: 5px;">
                    <b>Ngày tạo:</b> <?php echo $transaction['created_at'] ?>
                    </span>
                    <span style="font-size:14px; float:left; width:100%; padding-bottom: 5px;">
                    <b>Mã đơn hàng:</b> #<?php echo $transaction['id'] ?>
                    </span>
                    <span style="font-size:14px; float:left; width:100%; padding-bottom: 5px;">
                    <b>Thuế VAT :</b> 10%
                    </span>
                </div>
            </div>
            <div style="width:100%;float:left;background:#efefef;">
                <span style="margin-left: 10px; float:left; text-align:left;padding:10px;width:30%;color:#888;font-weight:600;">
                <b>Sản phẩm mua</b>
                </span>
                <span style="margin-left: 10px; float:left; text-align:left;padding:10px;width:30%;color:#888;font-weight:600;">
                <b>Số lượng</b>
                </span>
                <span style="margin-left: 10px; font-weight:600;float:left;padding:10px ;width:30%;color:#888;text-align:right;">
                <b>Giá tiền</b>
                </span>
            </div>
            <div style="width:100%;float:left;">
            <?php $total = 0; foreach ($orders as $item):  ?>
                <span style="margin-left: 10px; float:left; text-align:left;padding:10px;width:30%;color:#888;">
                <?php echo $item['nameproduct']; ?>
                </span>
                <span style="margin-left: 10px; float:left; text-align:left;padding:10px;width:30%;color:#888;">
                <?php echo $item['qty']; ?>
                </span>
                <span style="margin-left: 10px; font-weight:normal;float:left;padding:10px ;width:30%;color:#888;text-align:right;">
                <?php echo $item['price']; ?>
                </span>
            <?php $total += $item['price']; endforeach; ?>
                <span class="pull-right" style="margin-right: 40px; font-size: 15px; font-weight: 600; float:left; padding:10px ;width:30%;color:#888;text-align:right;">
                Tổng cộng : <?php echo $total; ?>
                </span>
            </div>
        </div>
    </div>
    <div class="clearfix"></div><br>
        <button class="btn btn-primary" style="margin-left: 600px" id="print" onclick="printContent('printinvoice');" >In hóa đơn</button>
    <div style="height: 10px;"></div>
    <script>
        function printContent(el)
        {
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
    </script>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
