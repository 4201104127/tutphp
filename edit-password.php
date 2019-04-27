
<?php 
	require_once __DIR__. "/autoload/autoload.php";
	$id = intval($_SESSION['name_id']);
	$editpass = $db->fetchID("user",$id);
	if (empty($editpass))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (postInput('password') == '')
        {
            $error['password'] = "Bạn chưa nhập mật khẩu";
        }

        if (postInput('re_password') == '')
        {
            $error['re_password'] = "Bạn chưa nhập lại mật khẩu";
        }

        if (postInput('oldpassword') == '')
        {
            $error['oldpassword'] = "Bạn chưa nhập mật khẩu cũ";
        }
        else
        {
            if (MD5(postInput('oldpassword')) != $editpass['password']) 
            {
                $error['oldpassword'] = "Mật khẩu cũ không đúng";
            }
            else
            {
                if (postInput('password') != NULL && postInput('re_password') != NULL) 
                {
                    if (postInput('password') == postInput('oldpassword'))
                    {
                        $error['password'] = "Mật khẩu mới trùng với mật khẩu cũ";
                    }
                    if (postInput('password') != postInput('re_password')) 
                    {
                        $error['password'] = "Mật khẩu thay đổi không trùng khớp";
                    }
                    else
                    {
                        $data['password'] = MD5(postInput("password"));
                    }
                }

                if (empty($error))
                {
                    
                    $id_update = $db->update("user",$data, array("id"=>$id));
                    if ($id_update > 0)
                    {
                        $_SESSION['success'] = "Đổi mật khẩu thành công";
                        header("location: info-user.php");
                    }
                    else
                    {
                        $_SESSION['error'] = "Đổi mật khẩu thất bại";
                        header("location: info-user.php");
                    }
                }            
            }
        }
    }
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            
            <section class="box-main1"><br>
                <h3 class="title-main" ><a style="text-decoration: none">Đổi mật khẩu</a><p style="margin-bottom: -14px; margin-top: -3px" class="arrow"></h3>
                
                <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Mật khẩu cũ</label>
                		<div class="col-md-8">
                			<input type="password" name="oldpassword" class="form-control" value="">
                			<?php if (isset($error['oldpassword'])): ?>
	                            <p class="text-danger"> <?php echo $error['oldpassword']; ?></p>
	                        <?php endif ?>
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Mật khẩu mới</label>
                		<div class="col-md-8">
                			<input type="password" name="password" class="form-control" value="">
                			<?php if (isset($error['password'])): ?>
	                            <p class="text-danger"> <?php echo $error['password']; ?></p>
	                        <?php endif ?>
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Nhập lại mật khẩu</label>
                		<div class="col-md-8">
                			<input type="password" name="re_password" class="form-control" value="">
                			<?php if (isset($error['re_password'])): ?>
	                            <p class="text-danger"> <?php echo $error['re_password']; ?></p>
	                        <?php endif ?>
                		</div>
                	</div>
                	<button type="submit" class="btn btn-primary col-md-2  col-md-offset-6">Cập nhật</button>
                </form>
            </section>
        </div>

    <?php require_once __DIR__. "/layouts/footer.php"; ?>
                