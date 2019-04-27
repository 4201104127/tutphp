<?php
    $open = "doanhthu";
    require_once __DIR__. "/../../autoload/autoload.php";
    if (isset($_GET['getyear'])) {$key = $_GET['getyear'];} else {$key = '';}
    $sql2 = "SELECT extract(day FROM created_at) AS day, extract(month FROM created_at) AS month, extract(year FROM created_at) AS year, amount FROM transaction";
    $dt = $db->fetchsql($sql2);
    $sql = "SELECT extract(day FROM created_at) AS day, extract(month FROM created_at) AS month, extract(year FROM created_at) AS year, qty FROM orders";
    $dt2 = $db->fetchsql($sql);
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
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
                </table>
                <?php 
                    $total1 = 0; $total2 = 0; $total3 = 0; $total4 = 0; $total5 = 0; $total6 = 0; $total7 = 0; $total8 = 0; $total9 = 0; $total10 = 0; $total11 = 0; $total12 = 0; 
                    $sd1 = 0; $sd2 = 0; $sd3 = 0; $sd4 = 0; $sd5 = 0; $sd6 = 0; $sd7 = 0; $sd8 = 0; $sd9 = 0; $sd10 = 0; $sd11 = 0; $sd12 = 0;
                    foreach ($dt as $items): ?>
                    <?php if ($items['year'] == $key):?>
                        <?php if ($items['month'] == 1):?>
                            <?php $total1 += $items['amount']; $sd1++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 2):?>
                            <?php $total2 += $items['amount']; $sd2++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 3):?>
                            <?php $total3 += $items['amount']; $sd3++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 4):?>
                            <?php $total4 += $items['amount']; $sd4++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 5):?>
                            <?php $total5 += $items['amount']; $sd5++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 6):?>
                            <?php $total6 += $items['amount']; $sd6++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 7):?>
                            <?php $total7 += $items['amount']; $sd7++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 8):?>
                            <?php $total8 += $items['amount']; $sd8++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 9):?>
                            <?php $total9 += $items['amount']; $sd9++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 10):?>
                            <?php $total10 += $items['amount']; $sd10++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 11):?>
                            <?php $total11 += $items['amount']; $sd11++;?>
                        <?php endif; ?>
                        <?php if ($items['month'] == 12):?>
                            <?php $total12 += $items['amount']; $sd12++;?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php 
                    $sl1 = 0; $sl2 = 0; $sl3 = 0; $sl4 = 0; $sl5 = 0; $sl6 = 0; $sl7 = 0; $sl8 = 0; $sl9 = 0; $sl10 = 0; $sl11 = 0; $sl12 = 0;
                    foreach ($dt2 as $items2): ?>
                    <?php if ($items['year'] == $key):?>
                        <?php if ($items2['month'] == 1):?>
                            <?php $sl1 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 2):?>
                            <?php $sl2 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 3):?>
                            <?php $sl3 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 4):?>
                            <?php $sl4 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 5):?>
                            <?php $sl5 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 6):?>
                            <?php $sl6 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 7):?>
                            <?php $sl7 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 8):?>
                            <?php $sl8 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 9):?>
                            <?php $sl9 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 10):?>
                            <?php $sl10 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 11):?>
                            <?php $sl11 += $items2['qty'];?>
                        <?php endif; ?>
                        <?php if ($items2['month'] == 12):?>
                            <?php $sl12 += $items2['qty'];?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                <p>Năm <?php echo $key; ?></p>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Tháng</th>
                            <th>Số đơn</th>
                            <th>Tổng tiền</th>
                            <th>Số sản phẩm đã bán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><?php echo $sd1; ?></td>
                            <td><?php echo $total1; ?></td>
                            <td><?php echo $sl1; ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><?php echo $sd2; ?></td>
                            <td><?php echo $total2; ?></td>
                            <td><?php echo $sl2; ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><?php echo $sd3; ?></td>
                            <td><?php echo $total3; ?></td>
                            <td><?php echo $sl3; ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><?php echo $sd4; ?></td>
                            <td><?php echo $total4; ?></td>
                            <td><?php echo $sl4; ?></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><?php echo $sd5; ?></td>
                            <td><?php echo $total5; ?></td>
                            <td><?php echo $sl5; ?></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><?php echo $sd6; ?></td>
                            <td><?php echo $total6; ?></td>
                            <td><?php echo $sl6; ?></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><?php echo $sd7; ?></td>
                            <td><?php echo $total7; ?></td>
                            <td><?php echo $sl7; ?></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><?php echo $sd8; ?></td>
                            <td><?php echo $total8; ?></td>
                            <td><?php echo $sl8; ?></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><?php echo $sd9; ?></td>
                            <td><?php echo $total9; ?></td>
                            <td><?php echo $sl9; ?></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td><?php echo $sd10; ?></td>
                            <td><?php echo $total10; ?></td>
                            <td><?php echo $sl10; ?></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td><?php echo $sd11; ?></td>
                            <td><?php echo $total11; ?></td>
                            <td><?php echo $sl11; ?></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td><?php echo $sd12; ?></td>
                            <td><?php echo $total12; ?></td>
                            <td><?php echo $sl12; ?></td>
                        </tr>       
                    </tbody>
                </table>
                <?php $totalall = 0; foreach ($dt as $items): ?>
                    <?php if ($items['year'] == $key):?>
                        <?php $totalall += $items['amount'];?>
                    <?php endif; ?>
                <?php endforeach; ?>
                Tổng cộng : <?php echo $totalall; ?>

            </div>
        </div>
    </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
