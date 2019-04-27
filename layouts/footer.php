            </div>
                <div class="container">
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo base_url() ?>public/frontend/images/free-shipping.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo base_url() ?>public/frontend/images/guaranteed.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo base_url() ?>public/frontend/images/deal.png"></a>
                    </div>
                </div>
                <div class="container-pluid">
                    <section id="footer">
                        <div class="container">
                            <div class="col-md-3" id="shareicon">
                                <ul>
                                    <li>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8" id="title-block">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="footer-button">
                        <div class="container-pluid">
                            <div class="container">
                                <div class="col-md-3" id="ft-about">
                                    <p>content<p>
                                </div>
                                <div class="col-md-3 box-footer" >
                                    <h3 class="tittle-footer">Shop</h3>
                                    <ul>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Giới thiệu</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Liên hệ </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i>  Contact </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3" id="footer-support">
                                    <h3 class="tittle-footer"> Liên hệ</h3>
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-home" style="font-size: 16px; margin-left: -3px;"></i> Shop address</p>
                                            <p><i class="fa fa-mobile" style="font-size: 20px;"></i> &nbspphone</p>
                                            <p><i class="fa fa-envelope" style="font-size: 13px;"></i> support@gmail.com</p>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="ft-bottom">
                        <p class="text-center">Copyright © 2017 . Design by  ... !!! 
                            <span class="pull-right">
                                Chat
                            </span> 
                        </p>

                    </section>
                </div>
            </div>
        </div>
        </div>      
        </div>
        <script  src="<?php echo base_url() ?>public/frontend/js/slick.min.js"></script>
    </body>
</html>
<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(300);
        })
    })

    $(function()
    {
        $updatecart = $(".updatecart");
        $updatecart.click(function(e)
        {
            e.preventDefault();
            $qty = $(this).parents("tr").find("#qty").val();
            $key = $(this).attr("data-key");
            $.ajax({
                url: 'cap-nhat-cart.php',
                type: 'GET',
                data: {'qty':$qty,'key':$key},
                success:function(data)
                {
                    if (data == 1) 
                    {
                        alert("Cập nhật thành công");
                        location.href='gio-hang.php';
                    }
                }
            });
        })
    })

</script>

