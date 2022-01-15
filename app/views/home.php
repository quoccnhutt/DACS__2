<div class="bg-home">



    <!-- NOI DUNG -->

    <div class="noidung">
        <div class="container">
            <div class="row">
                <h2 class="col-md-12 ">
                    <span>TẤT CẢ SẢN PHẨM</span>
                </h2>
            </div>
            <div class="row">

                <div class="col-md-12 title ">
                    <ul class="tabs tabs-title  clearfix">

                        <?php


                        foreach ($danhmucsanpham as $key => $value) {

                        ?>
                            <li class="tab-link <?php if ($value['id_category_product'] == 33) {
                                                    echo "active";
                                                } ?>" data-tab="tab-item" data-id="<?php echo $value['id_category_product'] ?>">
                                <input type="hidden" name="idDM" id="idDM" value="<?php echo $value['id_category_product'] ?>">
                                <span>
                                    <?php echo $value['title_category_product'] ?>
                                </span>
                            </li>
                        <?php
                        }  ?>
                    </ul>
                </div>
            </div>
            <div class="sanpham">
                <div class="">

                    <div class="tab-content active " id="tab-item" style="opacity: 1;">

                        <div class="row" style="justify-content: center;" id="danhsach">



                        </div>

                        <div class="xemtiep" id="xemthem" data-id="">
                            <span>Xem thêm</span>
                        </div>
                    </div>

                    <input type="hidden" name="idcate" id="idcate" value="33">
                    <input type="hidden" name="page" id="paged" value="1">
                </div>
            </div>
        </div>
    </div>


    <!-- KET THUC NOI DUNG -->


    <!-- section 3 -->
    <div class="section-3">
        <div class="best-choice">
            <div class="container">
                <div class="title-home-best">
                    <h2>Sản phẩm bán chạy</h2>
                    <p class="sub-text-best">Nhu cầu số đông lựa chọn theo những sản phẩm dưới , sản phẩm được ưu tiên lựa chọn nhiều nhất trong Moza nhạc cụ</p>
                </div>

                <div class="owl-carousel owl-loaded owl-drag " data-md-items="4" data-sm-items="3" data-xs-items="1" data-margin="17">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                            <?php foreach ($producthot as $key => $value) {
                                if ($value['noi_bat'] == 1) {
                            ?>
                                    <div class="owl-item active">
                                        <div class="item">
                                            <div class="it display-pt10">
                                                <div class="product-box">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail-img">
                                                            <div class="sale-flash">SALE</div>
                                                            <a href="<?php echo BASE_URL ?>sanphamController/chitietsanpham/<?php echo $value['id_product'] ?>" title="<?php echo $value['title_product'] ?>">
                                                                <img class="img-responsive lazyload loaded" src="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['image_product'] ?>" data-src="" alt="<?php echo $value['title_product'] ?>" data-was-processed="true">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>

                        </div>
                    </div>

                    <div class="owl-nav disabled">
                        <div class="owl-prev disabled">prev</div>
                        <div class="owl-next disabled">next</div>
                    </div>

                    <div class="owl-dots disabled"></div>
                </div>

            </div>
        </div>
    </div>
    <!-- end section 3 -->


    <!-- start SECTION 4 -->
    <div class="section-4">
        <div class="section-news">
            <div class="container">
                <div class="row wrap">
                    <!-- blog -->
                    <div class="col-12 col-md-4 col-sm-4 blogs">
                        <div class="blogs-content">
                            <div class="heading">
                                <h2 class="title-head">Bài viết mới nhất
                                </h2>
                            </div>
                            <div class="list-blogs-link">
                                <div class="">
                                    <?php

                                    foreach ($post as $key => $value) {
                                    ?>

                                        <article class="blog-item">
                                            <div class="blog-item-thumbnail">
                                                <a href="/tim-hieu-dan-ukulele">
                                                    <picture>
                                                        <source srcset="<?= BASE_URL ?>public/uploads/imgpost/<?= $value['image_post'] ?>" media="(max-width: 480px)">
                                                        <img src="<?= BASE_URL ?>public/uploads/imgpost/<?= $value['image_post'] ?>" alt="<?php echo $value['title_post']  ?>">
                                                    </picture>
                                                </a>
                                            </div>

                                            <div class="postContent">
                                                <h3 class="blog-item-name"><a href="/tim-hieu-dan-ukulele" title="<?php echo $value['title_post'] ?>"><?php echo $value['title_post']  ?></a></h3>
                                                <p class="blog-item-summary margin-bottom-5">
                                                    <!-- <div class="vanban">
                                                <?php echo $value['content_post']  ?>
                                            </div> -->
                                                </p>
                                            </div>
                                        </article>
                                    <?php }  ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- eng blogs -->

                    <!-- Testimonial -->
                    <div class="col-12 col-md-4 col-sm-4 Testimonial">
                        <div class="content-testi">
                            <h2>Ý kiến khách hàng</h2>
                            <div id="myCarousel-1" class="carousel slide" data-ride="">
                                <ul class="control-carousel">
                                    <li><a class="left-1 carousel-control" href="#myCarousel-1" role="button" data-slide="prev"></a></li>
                                    <li><a class="right-1 carousel-control" href="#myCarousel-1" role="button" data-slide="next"></a></li>
                                </ul>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="w-text">
                                            <p class="text-content">Tận tâm, nhiệt tình tư vấn và hỗ trợ khi có vấn đề với sản phẩm tôi mua tại đây, đó là điều tôi cảm nhận được.<span class="icontext">icontext</span></p>
                                            <p class="tg"><span>Chi Hoa, <span>Giảng Viên âm nhạc</span></span></p>
                                        </div>
                                        <div class="w-text last">
                                            <p class="text-content">Tôi đã quay lại mua và giới thiệu cho bạn qua Moza để mua sản phẩm khi tôi đã từng mua một lần ở đây.
                                                <span class="icontext">icontext</span>
                                            </p>
                                            <p class="tg"><span>Hồng, <span>Sinh viên âm nhạc</span></span></p>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="carousel-item">
                                        <div class="w-text">
                                            <p class="text-content">Ngoài sản phẩm tôi được tư vấn mua loại đàn nào phù hợp cho bé nhà tôi khi tới cửa hàng, tôi rất yên tâm khi lựa chọn mua sản phẩm đắt tiền tại đây.
                                                <span class="icontext">icontext</span>
                                            </p>
                                            <p class="tg"><span>Chị Nhung, <span>Mẹ bé Bun</span></span></p>
                                        </div>
                                        <div class="w-text last">
                                            <p class="text-content">Từ khi mua sản phẩm tôi chưa phải sửa chữa lần nào.Ấn tượng là cách chăm sóc khách hàng ở Moza.
                                                <span class="icontext">icontext</span>
                                            </p>
                                            <p class="tg"><span>Anh Hùng, <span>chơi trống</span></span></p>
                                        </div>
                                    </div>
                                    <!--end item-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  ènd Testimonial -->

                    <!-- partner -->
                    <div class="col-12 col-md-4 col-sm-4 partners">
                        <div class="content-partner">
                            <div class="partner">
                                <h2>Thương hiệu</h2>
                                <div id="myCarousel-2" class="carousel slide">
                                    <ul class="control-carousel">
                                        <li><a class="left carousel-control" href="#myCarousel-2" role="button" data-slide="prev"></a></li>
                                        <li><a class="right carousel-control" href="#myCarousel-2" role="button" data-slide="next"></a></li>
                                    </ul>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <a href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-1.png" alt="Moza"> </a>
                                            <a href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-2.png" alt="Moza"></a>
                                            <a class="last" href="#"> <img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-3.png" alt="Moza"> </a>
                                            <a href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-4.png" alt="Moza"> </a>
                                            <a href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-5.png" alt="Moza"> </a>
                                            <a class="last" href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-6.png" alt="Moza"> </a>
                                            <a href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-7.png" alt="Moza"></a>
                                            <a href="#"> <img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-8.png" alt="Moza"> </a>
                                            <a class="last" href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-9.png" alt="Moza"></a>
                                            <a class="" href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-10.png" alt="Moza"></a>
                                        </div>
                                        <div class="carousel-item">
                                            <a href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-1.png" alt="Moza"> </a>
                                            <a href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-2.png" alt="Moza"></a>
                                            <a class="last" href="#"> <img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-3.png" alt="Moza"> </a>
                                            <a href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-4.png" alt="Moza"> </a>
                                            <a href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-5.png" alt="Moza"> </a>
                                            <a class="last" href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-6.png" alt="Moza"> </a>
                                            <a href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-7.png" alt="Moza"></a>
                                            <a href="#"> <img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-8.png" alt="Moza"> </a>
                                            <a class="last" href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-9.png" alt="Moza"></a>
                                            <a class="" href="#"><img src="<?php echo BASE_URL ?>public/images/partners/thuonghieu-10.png" alt="Moza"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- partner END -->
                </div>
            </div>
        </div>
    </div>
    <!-- end SECTION 4 -->

    <!-- section-5 -->
    <div class="section-5" style="margin-bottom: 0;">
        <div class="service">
            <div class="container">
                <div class="row">
                    <div class="" style="">
                        <div class="col-md-4 col-sm-4 col-12 column1">
                            <ul>
                                <li>
                                    <a href="#">
                                        <h4>Giao hàng miễn phí</h4>
                                    </a>
                                </li>
                                <li class="service-title">Miễn phí giao hàng trên toàn quốc với các đơn hàng trên 5 triệu đồng</li>
                            </ul>
                        </div> <!-- end column1  -->

                        <div class="col-lg-4 col-md-4 col-sm-4 col-12 column2">
                            <ul>
                                <li>
                                    <a href="#">
                                        <h4>Thanh toán</h4>
                                    </a>
                                </li>
                                <li class="service-title">Thanh toán trực tiếp khi nhận hàng, hoàn trả khi lỗi do nhà sản xuất</li>
                            </ul>
                        </div> <!-- end column2  -->

                        <div class="col-lg-4 col-md-4 col-sm-4 col-12 column3">
                            <ul>
                                <li>
                                    <a href="#">
                                        <h4>Khuyến mãi khủng</h4>
                                    </a>
                                </li>
                                <li class="service-title">Khuyến mại 5% cho khách hàng mua sản phẩm lần thứ 2 trở đi tại shop</li>
                            </ul>
                        </div> <!-- end column3  -->

                    </div>
                </div> <!-- end row  -->
            </div> <!-- end container  -->
        </div><!-- end service  -->
    </div> <!-- end section5 -->

    <script>
        $(document).ready(function() {
            // var idDM = $(this).attr('data-id');
            load_data(33, 1);

            function load_data(idDM, page) {

                $.get("<?php echo BASE_URL ?>index/loadproduct", {
                    idDM: idDM,
                    page: page
                }, function(data) {
                    // $("#danhsach").append(data);
                    $("#danhsach").html(data);
                });
            }

            $("#xemthem").click(function() {
                // var idDM = $('.tabs-title .tab-link').attr('data-id');

                var page = $('#paged').val();
                var idDM = $('#idcate').val();
                if (page == 1) {
                    $('#paged').val(2);
                    var page = $('#paged').val();
                }

                $.get("<?php echo BASE_URL ?>index/loadproduct", {
                    idDM: idDM,
                    page: page
                }, function(data) {
                    // $("#danhsach").append(data);
                    $("#danhsach").append(data);
                    $('#paged').val(Number(page) + 1);
                });
            });

            $(".tabs-title .tab-link").click(function() {
                var idDM = $(this).attr('data-id');
                var page = 1;
                $('#idcate').val(idDM);
                $('#paged').val(1);
                // var iddi = $(this).attr('data-id');
                $.get("<?php echo BASE_URL ?>index/loadproduct", {
                    idDM: idDM,
                    page: page
                }, function(data) {
                    // $("#danhsach").append(data);
                    $("#danhsach").html(data);
                });

            });

        })
    </script>


</div>