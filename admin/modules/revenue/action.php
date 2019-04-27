<?php

    /**
     * gọi file autoload
     */
    $open = "revenue";
    $active = "revenue";
    $titleGlobal = "  Doah thu  ";
    include __DIR__ ."/../../autoload/autoload.php";

   
    $sql = "SELECT donhang.*  FROM donhang 
    WHERE trangthai = 1  ";



    $time = postInput('time');
    if(isset($time) && $time != NULL)
    {
        $sql .= "AND DATE_FORMAT(donhang.updated_at,'%Y-%m-%d')  = '".$time."'  " ;

    }
    
    // $sql .= " ORDER BY amount DESC ";
  
   
    $donhang = $db->fetchsql($sql);
     // _debug($donhang);

?> 
<table class="table table-bordered tableID" id="example">
    <thead>
         <tr class="text-center">
                                                                     
            <th colspan="5" class="text-center"> Doanh thu  </th>
            
        </tr>
        <tr>
            <th> STT </th>
            <th> Số tiền  </th>
            <th> Ngày thanh toán </th>
            <th> Tên khách hàng </th>
        
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