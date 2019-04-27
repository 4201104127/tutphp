<?php
    $open = "doanhthu";
    require_once __DIR__. "/../../autoload/autoload.php";
    if (isset($_GET['getmonth'])) {$key = $_GET['getmonth'];} else {$key = '';}
    $sql2 = "SELECT extract(day FROM created_at) AS day, extract(month FROM created_at) AS month, amount FROM transaction";
    $dt = $db->fetchsql($sql2);

?>
<?php require_once __DIR__. "/../../layouts/header.php";?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Quản lí đơn hàng
                <a href="add.php" class="btn btn-primary">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Sản phẩm
                </li>
            </ol>
            <div class="clearfix"></div>
            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
        </div>
    </div>

    <form action="search.php" class="form-inline" method="GET">
        <input required class="form-control" type="text" placeholder="Search..." name="search"> 
        <button class="fa fa-search form-control" type="submit" name="submit"></button>
    </form><br>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Doanh thu ngày
                                <form style="display: inline-block;" action="day.php" method="GET">
                                    <input required name="getday" type="number" class="form-control" style="width: 70px; margin-left: 20px; height: 30px; display: inline-block;" max="31" min="1">
                                    <input required name="getmonth" type="number" class="form-control" style="width: 60px; height: 30px; display: inline-block;" max="12" min="1">
                                    <button class="fa fa-search form-control" type="submit" name="submit" style="display: inline-block; width: 39px; height: 30px"></button>
                                </form>
                            </th>
                            <th>Doanh thu tháng
                                <form style="display: inline-block;" action="month.php" method="GET">
                                    <input required name="getmonth" type="number" class="form-control" style="width: 60px; margin-left: 20px; height: 30px;" max="12" min="1">
                                </form>
                            </th>
                            <th>Doanh thu năm
                                <form style="display: inline-block;" action="year.php" method="GET">
                                    <input required name="getyear" type="number" class="form-control" style="width: 90px; margin-left: 20px; height: 30px;" max="2050" min="2018">
                                </form>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; foreach ($dt as $items): ?>
                            <?php if ($items['month'] == $key):?>
                                <?php $total += $items['amount'];?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        
                        <tr>
                            <td></td>
                            <td><?php echo $total; ?></td>
                            <td></td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
