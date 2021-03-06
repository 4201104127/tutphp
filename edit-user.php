
<?php 
	require_once __DIR__. "/autoload/autoload.php";
    if (isset($_SESSION['name_id'])) 
    {
        $id = intval($_SESSION['name_id']);
        $EditUser = $db->fetchID("user",$id);
        if (empty($EditUser)) 
        {
            header("location: info-user.php");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $data =
            [
                'name'      => postInput('name'),
                'address'   => postInput('address'),
                'phone'     => postInput('phone')
            ];
            $error = [];
            {
                if (postInput('name') == '') 
                {
                    $error['name'] = "Nhập tên";
                }
                if (postInput('phone') == '') 
                {
                    $error['phone'] = "Nhập sđt";
                }
                if (postInput('address') == '') 
                {
                    $error['address'] = "Nhập địa chỉ";
                }
                if (empty($error))
                {
                    $idupdate = $db->update("user", $data, array('id'=>$id));
                    if ($idupdate > 0)
                    {  
                        $_SESSION['name_user'] = $data['name'];
                        $_SESSION['success'] = "Đổi thông tin thành công";
                        header("location: info-user.php");
                    }
                    else 
                    {
                        $_SESSION['name_user'] = $data['name'];
                        $_SESSION['error'] = "Đổi thông tin thất bại";
                        header("location: info-user.php");
                    }
                }
            }
        }
    }
    else
    {
        header("location: info-user.php");
    }    
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">            
            <section class="box-main1"><br>
                <h3 class="title-main" ><a style="text-decoration: none">Sửa thông tin</a><p style="margin-bottom: -14px; margin-top: -3px" class="arrow"></h3>
                <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Tên thành viên</label>
                		<div class="col-md-8">
                			<input type="text" name="name" class="form-control" value="<?php echo $EditUser['name'] ?>">
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Số điện thoại</label>
                		<div class="col-md-8">
                			<input type="text" name="phone" class="form-control" value="<?php echo $EditUser['phone'] ?>">
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Địa chỉ</label>
                		<div class="col-md-8">
                			<input type="text" name="address" class="form-control" value="<?php echo $EditUser['address'] ?>">
                		</div>
                	</div>
                	<button type="submit" class="btn btn-primary col-md-2  col-md-offset-6">Cập nhật</button>
                </form>
                <!--content-->
            </section>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>
                