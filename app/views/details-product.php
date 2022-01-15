<?php
foreach ($chitiet as $key => $value) {
   $name_product = $value['title_product'];
   $name_category = $value['title_category_product'];
   $id_danhmuc = $value['id_category_product'];

?>

   <section class="bread_crumb">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" style="color: #adadad">Trang chủ</a></li>
                     <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>sanphamController/danhmuc/<?php echo $id_danhmuc ?>" style="color: #adadad"><?php echo $name_category ?></a></li>
                     <li class="breadcrumb-item active" aria-current="page" style="color: #000"><span><?php echo $name_product ?></span></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </section>

   <section class="product">
      <div class="container">
         <div class="row">
            <form action="<?php echo BASE_URL ?>giohangController/themgiohang" method="POST">
               <input type="hidden" name="product_id" value="<?php echo $value['id_product'] ?>">
               <input type="hidden" name="product_title" value="<?php echo $value['title_product'] ?>">
               <input type="hidden" name="product_image" value="<?php echo $value['image_product'] ?>">
               <input type="hidden" name="product_price" value="<?php echo $value['price_product'] ?>">
               <input type="hidden" name="product_quantity" value="1">
               <div class="col-lg-12 details-product">
                  <div class="row">
                     <!-- left -->
                     <div class="col-xs-12 col-sm-6 col-lg-4">
                        <img id="img_01" src="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['image_product'] ?>" data-zoom-image="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['image_product'] ?>" />

                        <div id="gal1">
                           <?php
                           if (isset($value['image_product_2']) || isset($value['image_product_2'])) {
                           ?>


                              <a href="#" data-image="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['image_product_2'] ?>" data-zoom-image="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['image_product_2'] ?>">
                                 <img id="img_01" src="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['image_product_2'] ?>" />
                              </a>

                              <a href="#" data-image="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['image_product_3'] ?>" data-zoom-image="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['image_product_3'] ?>">
                                 <img id="img_01" src="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['image_product_3'] ?>" />
                              </a>
                           <?php }  ?>


                        </div>

                     </div>

                     <!-- right -->
                     <div class="col-xs-12 col-sm-6 col-lg-5 details-pro">
                        <h1 class="title-head" itemprop="name"><?php echo $name_product ?></h1>
                        <div class="reviews_details_product" style="margin-bottom: 15px;">
                           <div class="sapo-product-reviews-badge sapo-product-reviews-badge-detail" data-id="6143637"></div>
                        </div>

                        <div class="inventory_quantity">
                           <span>Còn hàng</span>
                        </div>
                        <div class="price-box">

                           <span class="special-price"><span class="price product-price" itemprop="price"><?php echo number_format($value['price_product'], 0, ',', '.') . '₫' ?></span>
                              <meta itemprop="priceCurrency" content="VND">
                           </span> <!-- Giá Khuyến mại -->
                           <span class="old-price"><del class="price product-price-old sale" itemprop="priceSpecification"><?php echo number_format($value['old_price_product'], 0, ',', '.') . '₫' ?></del>
                              <meta itemprop="priceCurrency" content="VND">
                           </span> <!-- Giá gốc -->

                        </div>

                        <div class="product-summary product_description margin-bottom-15">
                           <div class="rte description">

                              <ul>
                                 <li><span style="font-size:16px;">Mặt đàn: Vân Sam chọn lọc (Select Spruce)</span></li>
                                 <li><span style="font-size:16px;">Lưng và hông đàn: gỗ Dái Ngựa (Mahogany).</span></li>
                                 <li><span style="font-size:16px;">Cần đàn: gỗ Dái Ngựa (Mahogany).</span></li>
                                 <li><span style="font-size:16px;">Ngựa đàn: Gỗ hồng sắc (Rosewood)</span></li>
                              </ul>

                           </div>
                        </div>

                        <div class="form-product">
                           <form action="<?php echo BASE_URL ?>giohangController/themgiohang" method="POST">
                              <input type="hidden" name="product_id" value="<?php echo $value['id_product'] ?>">
                              <input type="hidden" name="product_title" value="<?php echo $value['title_product'] ?>">
                              <input type="hidden" name="product_image" value="<?php echo $value['image_product'] ?>">
                              <input type="hidden" name="product_price" value="<?php echo $value['price_product'] ?>">
                              <input type="hidden" name="product_quantity" value="1">

                              <div class="box-variant clearfix ">

                                 <input type="hidden" name="variantId" value="9768262">

                              </div>
                              <div class="form-group form_button_details ">
                                 <div class="custom custom-btn-number form-control">
                                    <label>Số lượng</label>
                                    <input type="number" class="input-text qty" title="Số lượng" value="1" min="1" maxlength="3" id="qty" name="quantity" onkeypress="validate(event)">

                                 </div>

                                 <button type="submit" class="btn btn-md btn-gray btn-cart add_to_cart btn_buy add_to_cart" title="Cho vào giỏ hàng">
                                    <span>Thêm vào giỏ hàng</span>
                                 </button>

                              </div>

                           </form>

                        </div>

                     </div>
                     <div class="col-xs-12 hidden-sm hidden-md col-lg-3 best-product">
                        <h2 class="title-head">Sản phẩm bán chạy</h2>


                        <div class="best-item">
                           <div class="product-box">
                              <!--onclick="window.location.href='/dan-piano-yamaha-clp-665gp'"-->
                              <div class="product-thumbnail">

                                 <a href="/dan-piano-yamaha-clp-665gp" title="Đàn Piano Yamaha CLP 665GP">
                                    <img class="img-responsive lazyload loaded bethua" src="//bizweb.dktcdn.net/thumb/small/100/187/190/products/dan-piano-yamaha-clp-665gp.jpg?v=1501604871413" data-src="//bizweb.dktcdn.net/thumb/small/100/187/190/products/dan-piano-yamaha-clp-665gp.jpg?v=1501604871413" alt="Đàn Piano Yamaha CLP 665GP" data-was-processed="true" style="padding-top: 0px;">
                                 </a>
                              </div>
                              <div class="product-info">
                                 <h3 class="product-name"><a href="/dan-piano-yamaha-clp-665gp" title="Đàn Piano Yamaha CLP 665GP">Đàn Piano Yamaha CLP 665GP</a></h3>

                                 <div class="price-box clearfix">

                                    <div class="special-price">
                                       <span class="price product-price">20.000.000₫</span>
                                    </div>
                                 </div>


                              </div>
                              <div class="product-action clearfix">
                                 <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-7768081" enctype="multipart/form-data">
                                    <div>


                                       <input type="hidden" name="variantId" value="12357404">
                                       <button class="btn-buy btn-cart btn btn-gray left-to add_to_cart btn-button" data-toggle="tooltip" title="Cho vào giỏ hàng"><span>
                                             <!--<i class="fa fa-cart-plus" aria-hidden="true"></i>-->
                                             <i class="fa fa-plus"></i><span class="hidden-xs hidden-sm hidden-md hidden-lg">Mua Hàng</span>
                                          </span>
                                       </button>



                                       <a href="/dan-piano-yamaha-clp-665gp" data-handle="dan-piano-yamaha-clp-665gp" class="btn-white btn_view btn right-to quick-view btn-button" data-toggle="tooltip" title="Xem Nhanh"><i class="fa fa-search"></i></a>

                                    </div>
                                 </form>
                              </div>

                           </div>
                        </div>

                     </div>
                     <div class="row">
                        <div class="col-xs-12 col-lg-12 margin-top-50 margin-bottom-30">
                           <!-- Nav tabs -->
                           <div class="product-tab e-tabs">

                              <ul class="tabs tabs-title clearfix">

                                 <li class="tab-link current active" data-tab="tab-1">
                                    <span class="border-top">
                                       <span></span>
                                    </span>
                                    <a class="tab-title">Mô tả</a>
                                 </li>


                                 <li class="tab-link" data-tab="tab-2">
                                    <span class="border-top border-top-2">
                                       <span></span>
                                    </span>
                                    <a class="tab-title">Bình luận</a>
                                 </li>


                                 <li class="tab-link" data-tab="tab-3">
                                    <span class="border-top border-top-3">
                                       <span></span>
                                    </span>
                                    <a class="tab-title">Đánh giá & Review</a>
                                 </li>
                              </ul>


                              <div id="tab-1" class="tab-content tab-contents current active">
                                 <div class="rte">
                                    <?php echo $value['desc_product'] ?>
                                 </div>
                              </div>


                              <div id="tab-2" class="tab-content tab-contents">
                                 <!-- //////////////// comment /////////// -->
                                 <h2 align="center">Bình luận sản phẩm tại đây</h2>
                                 <br />
                                 <div class="container">
                                    <form id="comment_form">
                                       <div class="form-group">
                                          <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Nhập tên *" require />
                                       </div>
                                       <div class="form-group">
                                          <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Nhập bình luận *" rows="5" require></textarea>
                                       </div>
                                       <div class="form-group">
                                          <input type="hidden" name="id_comment" id="id_comment" value="0" />
                                          <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                                       </div>
                                    </form>
                                    <span id="comment_message"></span>
                                    <br />
                                    <div id="display_comment"></div>
                                 </div>
                              </div>


                              <div id="tab-3" class="tab-content tab-contents">
                                 <section>
                                    <div class="container-fluid">
                                       <h4 class="mt-1 mb-2">Đánh giá & Review
                                       </h4>
                                       <div class="card">
                                          <div class="card-header"></div>
                                          <div class="card-body">
                                             <div class="row" id="dulieudanhgia">
                                                <div class="col-sm-4 text-center">
                                                   <h1 class="text-warning mt-4 mb-4">
                                                      <b><span id="average_rating">0.0</span> /5</b>
                                                   </h1>
                                                   <div class="mb-3">
                                                      <i class="fa fa-star star-light mr-1 main-star"></i>
                                                      <i class="fa fa-star star-light mr-1 main-star"></i>
                                                      <i class="fa fa-star star-light mr-1 main-star"></i>
                                                      <i class="fa fa-star star-light mr-1 main-star"></i>
                                                      <i class="fa fa-star star-light mr-1 main-star"></i>
                                                   </div>
                                                   <h3><span id="total_review">0</span> Review</h3>
                                                </div>
                                                <div class="col-sm-4">
                                                   <p>
                                                   <div class="progress-label-left float-left">
                                                      <b>5</b>
                                                      <i class="fa fa-star text-warning"></i>
                                                   </div>
                                                   <div class="progress-label-right float-right">
                                                      ( <span id="total_five_star_review">0</span> )
                                                   </div>
                                                   <div class="progress">
                                                      <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                                   </div>
                                                   </p>
                                                   <p>
                                                   <div class="progress-label-left float-left">
                                                      <b>4</b>
                                                      <i class="fa fa-star text-warning"></i>
                                                   </div>
                                                   <div class="progress-label-right float-right">
                                                      ( <span id="total_four_star_review">0</span> )
                                                   </div>
                                                   <div class="progress">
                                                      <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                                   </div>
                                                   </p>
                                                   <p>
                                                   <div class="progress-label-left float-left">
                                                      <b>3</b>
                                                      <i class="fa fa-star text-warning"></i>
                                                   </div>
                                                   <div class="progress-label-right float-right">
                                                      ( <span id="total_three_star_review">0</span> )
                                                   </div>
                                                   <div class="progress">
                                                      <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                                   </div>
                                                   </p>
                                                   <p>
                                                   <div class="progress-label-left float-left">
                                                      <b>2</b>
                                                      <i class="fa fa-star text-warning"></i>
                                                   </div>
                                                   <div class="progress-label-right float-right">
                                                      ( <span id="total_two_star_review">0</span> )
                                                   </div>
                                                   <div class="progress">
                                                      <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                                   </div>
                                                   </p>
                                                   <p>
                                                   <div class="progress-label-left float-left">
                                                      <b>1</b>
                                                      <i class="fa fa-star text-warning"></i>
                                                   </div>
                                                   <div class="progress-label-right float-right">
                                                      ( <span id="total_one_star_review">0</span> )
                                                   </div>
                                                   <div class="progress">
                                                      <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                                   </div>


                                                   </p>
                                                </div>
                                                <div class="col-sm-4 text-center">
                                                   <h3 class="mt-4 mb-3">Write Review Here</h3>
                                                   <!-- <button type="button" id="add_review" class="btn btn-primary">Review</button> -->
                                                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#review_modal" data-whatever="@mdo">Review</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="mt-5" id="review_content"></div>
                                    </div>
                                 </section>

                                 <div id="review_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Submit Review</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <form>
                                                <div class="form-group">
                                                   <h4 class="mt-2 mb-4">
                                                      <i class="fa fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                      <i class="fa fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                      <i class="fa fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                      <i class="fa fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                      <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                   </h4>
                                                </div>
                                                <div class="form-group">
                                                   <input type="hidden" name="id_product" id="id_product" value="<?php echo $value['id_product'] ?>">
                                                   <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name">
                                                </div>
                                                <div class="form-group">
                                                   <textarea class="form-control" id="user_review" name="user_review" placeholder="Type Review Here"></textarea>
                                                </div>
                                                <div class="form-group text-center">
                                                   <button type="button" class="btn btn-secondary" id="save_review">Submit</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="clearbox"></div>
                  </div>
                  <div class="row">
                     <div class="related-product">
                        <div class="heading">
                           <h2 class="title-head"><a href="san-pham-khuyen-mai">Sản phẩm cùng loại</a></h2>
                        </div>


                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </section>

   <!-- San Pham Lien quan -->
   <section class="sqlq">
      <ul id="c">
         <?php foreach ($lienquan as $key => $pro_cate) {  ?>

            <li class="nqn">
               <form action="<?php echo BASE_URL ?>giohangController/themgiohang" method="POST">
                  <input type="hidden" name="product_id" value="<?php echo $pro_cate['id_product'] ?>">
                  <input type="hidden" name="product_title" value="<?php echo $pro_cate['title_product'] ?>">
                  <input type="hidden" name="product_image" value="<?php echo $pro_cate['image_product'] ?>">
                  <input type="hidden" name="product_price" value="<?php echo $pro_cate['price_product'] ?>">
                  <input type="hidden" name="product_quantity" value="1">
                  <div class="">
                     <!-- <h4 class="text-center"><strong>STYLE 3</strong></h4> -->

                     <div class="profile-card-4 text-center">
                        <a href="<?php echo BASE_URL ?>sanphamController/chitietsanpham/<?php echo $pro_cate['id_product'] ?>">
                           <img src="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $pro_cate['image_product'] ?>" class="img img-responsive" title="<?php echo $pro_cate['title_product'] ?>" height="600px" width="480px">
                        </a>
                        <div class="profile-content">
                           <div class="profile-name">
                              </p>
                           </div>
                           <a href="<?php echo BASE_URL ?>sanphamController/chitietsanpham/<?php echo $pro_cate['id_product'] ?>">
                              <div class=" profile-description vanban"><?php echo $pro_cate['title_product'] ?></div>
                           </a>
                           <div class="row">
                              <div class="col-xs-6">
                                 <div class="nutmuahang">

                                    <button type="submit" class="btn btn-info btn-md">Mua hàng</button>
                                 </div>
                              </div>

                              <div class="col-xs-6">
                                 <div class="profile-overview">
                                    <h2><?php echo number_format($pro_cate['price_product'], 0, ',', '.') . '₫' ?></h2>
                                    <h7>Giá cũ: 1100đ</h7>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </li>
         <?php }  ?>
      </ul>
   </section>



<?php }  ?>
<style>
   .star-light {
      color: #e9ecef;
   }

   #review_content .bg-avt-user {
      width: 35px;
      height: 35px;
      display: flex;
      justify-content: center;
      align-items: center;
   }

   #review_content .bg-avt-user .avt_user {
      line-height: 0;
      text-transform: lowercase;
   }

   #review_content .card .card-header {
      padding: 5px 40px;
   }

   #review_content .card .card-body {
      padding: 10px;
   }

   #review_content .card .card-footer {
      padding: 5px 40px;
   }
</style>
<script>
   $(document).ready(function() {
      // danh gia sao cho san pham
      var rating_data = 0;
      $('#add_review').click(function() {
         $('#review_modal').modal('show');
      });

      $(document).on('mouseenter', '.submit_star', function() {
         var rating = $(this).data('rating');
         reset_background();
         for (var count = 1; count <= rating; count++) {
            $('#submit_star_' + count).addClass('text-warning');

         }
      });

      function reset_background() {
         for (var count = 1; count <= 5; count++) {
            $('#submit_star_' + count).addClass('star-light');
            $('#submit_star_' + count).removeClass('text-warning');
         }
      }

      $(document).on('mouseleave', '.submit_star', function() {
         reset_background();
         for (var count = 1; count <= rating_data; count++) {

            $('#submit_star_' + count).removeClass('star-light');

            $('#submit_star_' + count).addClass('text-warning');
         }
      });

      $(document).on('click', '.submit_star', function() {
         rating_data = $(this).data('rating');
      });

      $('#save_review').click(function() {
         var id_product = $('#id_product').val();
         var user_name = $('#user_name').val();
         var user_review = $('#user_review').val();
         // alert(id_product);

         if (user_name == '' || user_review == '') {
            alert("Please Fill Both Field");
            return false;
         } else {
            $.post("<?php echo BASE_URL ?>ajax/submit_rating", {
               rating_data: rating_data,
               user_name: user_name,
               user_review: user_review,
               id_product: id_product
            }, function(data) {
               $("#review_modal").modal('hide');
               load_rating_data();
               if (data != 1) {
                  alert("Đánh giá sao cho sản phẩm thành công");
               } else {
                  alert("Đánh giá sao cho sản phẩm thất bại");

               }
            });
         }
      });
      load_rating_data();

      function load_rating_data() {
         var id_product = $('#id_product').val();

         $.ajax({
            url: "<?php echo BASE_URL ?>ajax/load_data_rating",
            // url: 'json.php',
            type: 'get',
            data: {
               action: 'load_data',
               id_product: id_product
            },
            dataType: 'json',
            success: function(data) {
               // alert(data.kq.average_rating);

               $('#average_rating').text(data.kq.average_rating);
               $('#total_review').text(data.kq.total_review);

               var count_star = 0;

               $('.main_star').each(function() {
                  count_star++;
                  if (Math.ceil(data.kq.average_rating) >= count_star) {
                     $(this).addClass('text-warning');
                     $(this).addClass('star-light');
                  }
               });

               $('#total_five_star_review').text(data.kq.five_star_review);

               $('#total_four_star_review').text(data.kq.four_star_review);

               $('#total_three_star_review').text(data.kq.three_star_review);

               $('#total_two_star_review').text(data.kq.two_star_review);

               $('#total_one_star_review').text(data.kq.one_star_review);

               $('#five_star_progress').css('width', (data.kq.five_star_review / data.kq.total_review) * 100 + '%');

               $('#four_star_progress').css('width', (data.kq.four_star_review / data.kq.total_review) * 100 + '%');

               $('#three_star_progress').css('width', (data.kq.three_star_review / data.kq.total_review) * 100 + '%');

               $('#two_star_progress').css('width', (data.kq.two_star_review / data.kq.total_review) * 100 + '%');

               $('#one_star_progress').css('width', (data.kq.one_star_review / data.kq.total_review) * 100 + '%');

               if (data.kq.review_data.length > 0) {
                  var html = '';

                  for (var count = 0; count < data.kq.review_data.length; count++) {
                     html += '<div class="row mb-1">';

                     html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white bg-avt-user "><h5 class="text-center avt_user">' + data.kq.review_data[count].user_name.charAt(0) + '</h5></div></div>';

                     html += '<div class="col-sm-11">';

                     html += '<div class="card">';

                     html += '<div class="card-header"><b>' + data.kq.review_data[count].user_name + '</b></div>';

                     html += '<div class="card-body">';

                     for (var star = 1; star <= 5; star++) {
                        var class_name = '';

                        if (data.kq.review_data[count].rating >= star) {
                           class_name = 'text-warning';
                        } else {
                           class_name = 'star-light';
                        }

                        html += '<i class="fa fa-star ' + class_name + ' mr-1"></i>';
                     }

                     html += '<br />';

                     html += data.kq.review_data[count].user_review;

                     html += '</div>';

                     html += '<div class="card-footer text-right">On ' + data.kq.review_data[count].datetime + '</div>';

                     html += '</div>';

                     html += '</div>';

                     html += '</div>';
                  }

                  $('#review_content').html(html);

               }
            }

         });

      }

      // comment
      $('#submit').click(function() {

         var comment_content = $('#comment_content').val();
         var comment_name = $('#comment_name').val();
         var id_product = $('#id_product').val();
         var id_comment = $('#id_comment').val();

         $.ajax({
            url: "<?php echo BASE_URL ?>ajax/add_comment",
            method: 'get',
            data: {
               id_product: id_product,
               id_comment: id_comment,
               comment_content: comment_content,
               comment_name: comment_name
            },
            dataType: 'json',
            success: function(data) {
               // alert(data.err.error);
               if (data.err.error != '') {
                  $('#comment_form')[0].reset();
                  $('#comment_message').html(data.err.error);
                  load_comment();
               }
            }
         });

      });

      load_comment();
      // load comment
      function load_comment() {
         var id_product = $('#id_product').val();

         $.ajax({
            url: "<?php echo BASE_URL ?>ajax/load_comment",
            method: 'get',
            data: {
               id_product: id_product
            },
            success: function(data) {
               // alert(data.err.error);
               $('#display_comment').html(data);
            }
         });
      }
      // reaply comment
      $(document).on('click', '.reply', function() {
         var id_comment = $(this).attr("id");
         $('#id_comment').val(id_comment);
         $('#comment_name').focus();
      });

   });
</script>