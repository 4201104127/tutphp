<?php
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";
    if (isset($_GET['search'])) {$key = $_GET['search'];} else {$key = '';}
    $sql = "SELECT * FROM category WHERE name LIKE '%$key%'";
    $category = $db->fetchsql($sql);
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách danh mục
                <a href="add.php" class="btn btn-primary">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Trang chính    </a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Danh mục
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
                            <th>Slug</th>
                            <th>Home</th>
                            <th>Created</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($category as $items): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $items['name'] ?></td>
                            <td><?php echo $items['slug'] ?></td>
                            <td>
                                <a href="home.php?id=<?php echo $items['id'] ?>" class="btn btn-xs <?php echo $items['home'] == 1 ? 'btn-info' : 'btn-default' ?>">
                                    <?php echo $items['home'] == 1 ? '1' : '0' ?></a>
                            </td>
                            <td><?php echo $items['created_at'] ?></td>                            
                            <td>
                                <a class="btn btn-xs btn-primary" href="edit.php?id=<?php echo $items['id'] ?>"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $items['id'] ?>"><i class="fa fa-times"></i>&nbsp;Xóa</a>
                            </td>
                        </tr>
                    <?php $stt++; endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
