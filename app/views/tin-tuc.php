<!-- bread Crump -->
<section class="bread_crumb">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" style="color: #adadad">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page" style="color: #000"><span>Tin tức</span></li>
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
      </aside>
      <aside class="right right-content col-lg-9 col-md-8 col-sm-8">
         <div class="box-heading">
            <h1 class="title-head">Tin tức</h1>
         </div>
         <section class="list-blogs blog-main">
            <?php foreach ($tintuc as $key => $value) {  ?>
               <article class="blog-item">
                  <div class="blog-item-thumbnail">
                     <a href="<?php echo BASE_URL ?>tintucController/chitiettintuc/<?php echo $value['id_post'] ?>">
                        <img src="<?php echo BASE_URL ?>public/uploads/imgpost/<?php echo $value['image_post'] ?>" alt="<?php echo $value['title_post'] ?>" style="width: 100%;">
                     </a>
                  </div>
                  <div class="blog-item-content">
                     <h3 class="blog-item-name">
                        <a href="<?php echo BASE_URL ?>tintucController/chitiettintuc/<?php echo $value['id_post'] ?>" title="tiêu đề"><?php echo $value['title_post'] ?></a>
                     </h3>
                     <div class="post-time">08/16/2017 00:39:17</div>
                     <!-- <p class="blog-item-summary margin-bottom-15 vanban">
                        <?php echo $value['content_post'] ?>
                     </p> -->
                     <a href="<?php echo BASE_URL ?>tintucController/chitiettintuc/<?php echo $value['id_post'] ?>" class="btn btn-white blog-btn">Xem chi tiết</a>
                     <p class="blog-comment"></p>
                  </div>
               </article>
            <?php }  ?>
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