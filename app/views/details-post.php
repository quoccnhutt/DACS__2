<?php
foreach ($chitiet_post as $key => $value) {
   $name_post = $value['title_post'];
   $name_category_post = $value['title_category_post'];
   $id_danhmuc = $value['id_category_post'];
}
?>



<!-- bread Crump -->
<section class="bread_crumb">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" style="color: #adadad">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page" style="color: #000"><span> <?php echo $name_post ?></span></li>
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
                  <span>Danh mục bài viết</span>
               </h2>
            </div>
            <div class="aside-content">
               <nav class="nav-category  navbar-toggleable-md">
                  <ul class="nav navbar-pills">
                     <?php
                     foreach ($danhmucbaiviet as $key => $value) {
                     ?>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo BASE_URL ?>tintucController/danhmuc/<?php echo $value['id_category_post'] ?>" class="nav-link"><?php echo $value['title_category_post']  ?>
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
         <aside class="aside-item blog-left">
            <div class="aside-content">
               <div class="blogs">
                  <div class="blogs-content">
                     <div class="heading">
                        <h2 class="title-head">
                           Bài viết liên quan
                        </h2>
                     </div>
                     <div class="list-blogs-link">
                        <!-- blog-1 -->
                        <?php foreach ($post_lienquan as $key => $value) { ?>
                           <article class="blog-item">
                              <div class="blog-item-thumbnail">
                                 <a href="<?php echo BASE_URL ?>tintucController/chitiettintuc/<?php echo $value['id_post'] ?>">
                                    <img src="<?= BASE_URL ?>public/uploads/imgpost/<?= $value['image_post'] ?>" alt="<?php echo $value['title_post']  ?>" title="<?php echo $value['title_post']  ?>">
                                 </a>
                              </div>
                              <div class="postContent">
                                 <h3 class="blog-item-name">
                                    <a href="<?php echo BASE_URL ?>tintucController/chitiettintuc/<?php echo $value['id_post'] ?>">
                                       <?php echo $value['title_post']  ?>
                                    </a>
                                 </h3>
                                 <!-- <p class="blog-item-summary margin-bottom-5">Đàn Ukulete là nhạc cụ xuất phát từ...</p> -->
                              </div>
                           </article>
                        <?php }  ?>

                     </div>
                  </div>
               </div>
            </div>
         </aside>
      </aside>
      <aside class="right right-content col-lg-9 col-md-8 col-sm-8">
         <?php foreach ($chitiet_post as $key => $value) { ?>
            <div class="">
               <h2 class="title-head"><?php echo $value['title_post'] ?></h2>
            </div>
            <div class="postby">
               <span>
                  Đăng bởi <b>mrteo</b> vào lúc 01/01/1010
               </span>
            </div>
            <div class="article-details">
               <div class="article-content">
                  <div class="rte">
                     <?php echo $value['content_post'] ?>
                  </div>
               </div>
            </div>
         <?php }  ?>

      </aside>
      <aside class="tag_article col-lg-6">
         <span class="inline">
            Tags:
            <a href="#">#tags</a>
         </span>
      </aside>
      <aside class="col-xs-12">
         <form action="" id="" method="POST">
            <input type="hidden" name="">
            <div class="col-lg-12">
               <div class="form-coment margin-bottom-30">
                  <div class="row">
                     <div class="abcd">
                        <h5 class="title-form-coment">
                           VIẾT BÌNH LUẬN CỦA BẠN:
                        </h5>
                     </div>
                     <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <input placeholder="Họ tên" type="text" class="form-control form-control-lg" value="" id="full-name" name="Author" required>
                     </div>
                     <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <input placeholder="Email" type="email" class="form-control form-control-lg" value="" id="email" name="Email" required>
                     </div>
                     <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <textarea placeholder="Nội dung" class="form-control form-control-lg" id="comment" name="Body" rows="6" required></textarea>
                     </div>
                     <div>
                        <button type="submit" class="btn btn-dark">Gửi</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </aside>
   </div>
</div>
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