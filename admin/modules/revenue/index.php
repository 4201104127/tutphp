<?php

    /**
     * gọi file autoload
     */
    $open = "revenue";
    $active = "revenue";
    $titleGlobal = "  Doah thu  ";
    include __DIR__ ."/../../autoload/autoload.php";


    /**
     *  lấy danh sách danh mục 
     */
    $sql = "SELECT donhang.*  FROM donhang 
    WHERE trangthai = 1 ORDER BY tongtien DESC ";


    $donhang = $db->fetchsql($sql);

?>  

<?php 
    /**
     * goi file header
     */
    include __DIR__ ."/../../layouts/header.php";
   
 ?>
  
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo base_admin() ?>">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                   
                    <li>
                        <i> Danh sách doanh thu  </i>
                    </li>
                </ul>
                
                
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                        Thao tác <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                
                                <a href="add.php"> <i class="fa fa-plus"></i> Thêm</a>
                            </li>
                            <li>
                                
                                <a href="javascript:;void(0)"  class="confirmation deletealladmin_na"> <i class="fa fa-trash-o"></i> Xóa mục đã chọn </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>

            </div>
            <form action="" method="POST" accept-charset="utf-8" class="clearfix">
                    <div class="form-group">
                        <label class="control-label col-md-2" style="padding-top: 10px"> Lọc theo thời gian  <span class="required">
                        * </span>
                        </label>
                        <div class="col-md-3">
                             <input type="date" name="time" id="timequery" class="form-control">
                        </div>
                    
                    </div>
            </form>


            <!-- hiện thông báo -->
           <?php include __DIR__ ."/../../layouts/notification.php"; ?>

            <div class="notification">
                
            </div>

            <div class="portlet box green" style="margin-top: 20px">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Doanh Thu 
                    </div>
                </div>

                <div class="portlet-body" id="exportexcel">
                    <div class="table-responsive">
                        <!-- id="example" -->
                        <table class="table table-bordered tableID" id="example">
                            <thead>
                                <tr class="text-center">
                                                                     
                                    <th colspan="5" class="text-center"> Doanh thu  </th>
                                    
                                </tr>
                                <tr>
                                                                    
                                    <th> STT </th>
                                    <th> Số tiền  </th>
                                    <th> Ngày thanh toán </th>
                                    <th> Tên khách hàng</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($donhang as $item) :?>
                                <tr>
                                                             
                                   <td><?php echo $i ?> </td>
                                   <td><?php echo formatprice($item['tongtien']) ?> đ </td>
                                   <td><?php echo $item['updated_at'] ?></td>
                                   <td><?php echo $item['ten'] ?></td>
                                  
                                </tr>
                                <?php $i++; endforeach ; ?>
                            </tbody>
                            <div class="modal fade" id="viewdetailproduct" role="dialog">
                                
                            </div>
                        </table>
                    </div>
                </div>
               
            </div>
           
        </div>
    </div>

 <?php 
    /**
     * goi file footer
     */
    include __DIR__ ."/../../layouts/footer.php";

 ?>

    <!-- <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36251023-1']);
      _gaq.push(['_setDomainName', 'jqueryscript.net']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script> -->