<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $user = $db->fetchID("user",intval($_SESSION['name_id']));
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section class="box-main1"><br>
                <h3 class="title-main" style="text-decoration: none;"><a href="javascript:void(0)" style="font-family: sans-serif;"> Thông tin người dùng </a><p style="margin-bottom: -14px; margin-top: -3px" class="arrow"></h3><br>
                    <?php require_once __DIR__. "/partials/notification.php"; ?>
                <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                	<div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                                <img class="img-circle" src="<?php echo uploads() ?>product/nhan.jpg" width="150px" height="150px" alt="User Pic">
                            </div>
                            <div class=" col-md-9 col-lg-9">
                                <h3><?php echo $user['name'] ?></h3><br>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Tài khoản:</td>
                                        <td><?php echo $user['name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?php echo $user['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại:</td>
                                        <td><?php echo $user['phone'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ:</td>
                                        <td><?php echo $user['address'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày tạo:</td>
                                        <td><?php echo $user['created_at'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><br>
                        <script>
                            $(document).ready(function(){
                              $('[data-toggle="tooltip"]').tooltip();   
                            });
                        </script>
                        <div class="panel-footer">
                            <button class="btn btn-sm btn-primary" type="button"><i style="color: white;" class="glyphicon glyphicon-envelope"></i></button>
                            <button class="btn btn-sm btn-primary" type="button"><i style="color: white;" class="fa fa-facebook-square"></i></button>
                            <button class="btn btn-sm btn-primary" type="button"><i style="color: white;" class="fa fa-twitter"></i></button>
                            <button class="btn btn-sm btn-primary" type="button"><i style="color: white;" class="fa fa-comment"></i></button>
                            <span class="pull-right">
                            <a href="edit-password.php" title="Đổi password" data-toggle="tooltip" data-placement="bottom"><button class="btn btn-sm btn-basic" type="button"><i class="fa fa-unlock"></i></button></a>
                            <a href="edit-user.php" title="Sửa thông tin" data-toggle="tooltip" data-placement="bottom"><button class="btn btn-sm btn-basic" type="button"><i class="glyphicon glyphicon-edit"></i></button></a>
                            </span>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>