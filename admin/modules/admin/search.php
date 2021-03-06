<?php
    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php";
    if (isset($_GET['search'])) {$key = $_GET['search'];} else {$key = '';}
    $sql = "SELECT * FROM admin WHERE name LIKE '%$key%'";
    $admin = $db->fetchsql($sql);   
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Quản lí Admin
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
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Chức vụ</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($admin as $items): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $items['name'] ?></td>
                            <td><?php echo $items['phone'] ?></td>
                            <td><?php echo $items['email'] ?></td>
                            <td><?php echo $items['address'] ?></td>
                            <td><?php if ($items['level'] == 1) echo "CTV"; elseif ($items['level'] == 2) echo "Admin"; else echo ""; ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="edit.php?id=<?php echo $items['id'] ?>"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $items['id'] ?>"><i class="fa fa-times"></i>&nbsp;Xóa</a>
                                <a class="btn btn-xs btn-warning" href="passwordedit.php?id=<?php echo $items['id'] ?>"><i class="fa fa-lock"></i>&nbsp;Password</a>
                            </td>
                        </tr>
                    <?php $stt++; endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
