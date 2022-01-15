<!-- bread Crump -->
<section class="bread_crumb">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" style="color: #adadad">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page" style="color: #000"><span>Tất cả sản phẩm</span></li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</section>

<div class="container">
   <div class="row row-flex-reverse">
      <aside class="left left-content col-lg-3 col-md-4 col-sm-4">
         <aside class="aside-item collection-category blog-category">
            <div class="heading">
               <h2 class="title-head">
                  <span>Danh mục sản phẩm</span>
               </h2>
            </div>
            <div class="aside-content">
               <nav class="nav-category  navbar-toggleable-md">
                  <ul class="nav navbar-pills">
                     <?php
                     foreach ($danhmucsanpham as $key => $value) {
                     ?>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo BASE_URL ?>sanphamController/danhmuc/<?php echo $value['id_category_product'] ?>" class="nav-link"><?php echo $value['title_category_product']  ?>
                           </a>
                           <i class="fa fa-angle-down"></i>
                           <ul class="dropdown-menu">
                              <!-- <li class="nav-item"><a href="" class="nav-link">Amply - Effcet</a></li> -->
                           </ul>
                        </li>
                     <?php }  ?>
                  </ul>
               </nav>
            </div>
         </aside>
      </aside>
      <aside class="right right-content col-lg-9 col-md-8 col-sm-8">
         <div class="box-heading">
            <h1 class="title-head">Tất cả sản phẩm</h1>
         </div>
         <section class="list-blogs blog-main">
            <div class="row" style="justify-content: center;">
               <?php foreach ($sanpham as $key => $pro_cate) {
               ?>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 item-pro">
                     <form action="<?php echo BASE_URL ?>giohangController/themgiohang" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $pro_cate['id_product'] ?>">
                        <input type="hidden" name="product_title" value="<?php echo $pro_cate['title_product'] ?>">
                        <input type="hidden" name="product_image" value="<?php echo $pro_cate['image_product'] ?>">
                        <input type="hidden" name="product_price" value="<?php echo $pro_cate['price_product'] ?>">
                        <input type="hidden" name="product_quantity" value="1">
                        <div class="profile-card-4 text-center ">
                           <a href="<?php echo BASE_URL ?>sanphamController/chitietsanpham/<?php echo $pro_cate['id_product'] ?>">
                              <img src="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $pro_cate['image_product'] ?>" class="img img-responsive" title="<?php echo $pro_cate['title_product'] ?>">
                           </a>
                           <div class="profile-content">
                              <div class="profile-name">
                                 </p>
                              </div>
                              <a href="<?php echo BASE_URL ?>sanphamController/chitietsanpham/<?php echo $pro_cate['id_product'] ?>">
                                 <div class=" profile-description vanban"><?php echo $pro_cate['title_product'] ?></div>
                              </a>
                              <div class="row" style="justify-content: center;">
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
                     </form>
                  </div>
               <?php }  ?>
            </div>
         </section>
      </aside>
   </div>
</div>
<style>
   .blog-item-content .p.vanban {
      width: 100%;
      white-space: pre-wrap;
      overflow: hidden;
      text-overflow: ellipsis;
      -webkit-line-clamp: 4;
      -webkit-box-orient: vertical;
      display: -webkit-box;
   }
</style>
<script type="text/javascript">
   $('.nav-category .fa-angle-down').click(function(e) {
      $(this).parent().toggleClass('active');
   });
</script>
<script type="text/javascript">
   $(".aside-item.collection-category .nav-item .fa").click(function() {
      $(this).next("ul").slideToggle();
   });
</script>