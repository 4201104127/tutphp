<?php
    $open = "transaction";
    require_once __DIR__. "/../../autoload/autoload.php";
    if (isset($_GET['search'])) {$key = $_GET['search'];} else {$key = '';}
    $sql = "SELECT transaction.*, user.name as nameuser, user.phone as phoneuser FROM transaction LEFT JOIN user ON user.id = transaction.users_id WHERE transaction.id LIKE '%$key%' OR user.name LIKE '%$key%'";
    $transaction = $db->fetchsql($sql);
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
        <button class="fa fa-search form-control" type="submit" name="submit">
        </button>
    </form><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Phone</th>
                            <th>Giá</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($transaction as $items): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $items['nameuser'] ?></td>
                            <td><?php echo $items['phoneuser'] ?></td>
                            <td><?php echo $items['amount']; ?></td>
                            <td>
                                <a href="status.php?id=<?php echo $items['id']  ?>" class="btn-sm <?php echo $items['status'] == 0 ? 'btn-danger' : 'btn-primary' ?>"><?php echo $items['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="edit.php?id=<?php echo $items['id'] ?>"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
                                <a class="btn btn-xs btn-primary" href="chitietdonhang.php?id=<?php echo $items['id'] ?>"><i class="fa fa-edit"></i>&nbsp;Chi tiết hóa đơn</a>
                            </td>
                        </tr>
                    <?php $stt++; endforeach ?>
                    </tbody>
                </table>
        
            </div>
        </div>
    </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
