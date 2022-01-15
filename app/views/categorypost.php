<section>
	<div class="bg_in">
            <div class="wrapper_all_main">
               <div class="wrapper_all_main_right">
                  <?php 
                              $name = 'Tin tức';
                              foreach ($dmtintuc_id as $key => $value1) {
                                 $name = $value1['title_category_post'];
                              }
                            ?>
	                  <!--breadcrumbs-->
                  <div class="breadcrumbs">
                     <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope
                           itemtype="http://schema.org/ListItem">
                           <a itemprop="item" href="<?php echo BASE_URL ?>">
                           <span itemprop="name">Trang chủ</span></a>
                           <meta itemprop="position" content="1" />
                        </li>
                        <li itemprop="itemListElement" itemscope
                           itemtype="http://schema.org/ListItem">
                           <span itemprop="item">
                           <strong itemprop="name">
                           <?php echo $name ?>
                           </strong>  
                           </span>
                           <meta itemprop="position" content="2" />
                        </li>
                     </ol>
                  </div>
                  <!--breadcrumbs-->
                  <div class="content_page">
                     <div class="box-title">
                        <div class="title-bar">
                           
                           <h1><?php echo $name ?></h1>
                        </div>
                     </div>
                     <div class="content_text">
                        <ul class="list_ul">
                           <?php foreach($dmtintuc_id as $key => $value){ ?>
                           <li class="lists">
                              <div class="img-list">
                                 <a href="<?php echo BASE_URL ?>tintucController/chitiettintuc/<?php echo $value['id_post'] ?>">
                                 <img src="<?php echo BASE_URL ?>public/uploads/imgpost/<?php echo $value['image_post'] ?>" alt="<?php echo $value['title_post'] ?>" class="img-list-in">
                                 </a>
                              </div>
                              <div class="content-list">
                                 <div class="content-list_inm">
                                    <div class="title-list">
                                       <h3>
                                          <a href="<?php echo BASE_URL ?>tintucController/chitiettintuc/<?php echo $value['id_post'] ?>"><?php echo $value['title_post'] ?></a>
                                       </h3>
                                       <p class="list-news-status-p">
                                          <a title="Thiết bị văn phòng">Thiết bị văn phòng</a> | <a title="26-12-2017" >26-12-2017</a>
                                       </p>
                                    </div>
                                    <div class="content-list-in">
                                       <p><?php echo $value['content_post'] ?></p>
                                    </div>
                                    <div class="xt"><a href="<?php echo BASE_URL ?>tintucController/chitiettintuc/<?php echo $value['id_post'] ?>">Xem thêm</a></div>
                                 </div>
                              </div>
                              <div class="clear"></div>
                           </li>
                        <?php } ?>
                        </ul>
                        <div class="clear"></div>
                        <div class="wp_page">
                           <div class="page">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            
               <div class="clear"></div>
            </div>
         </div>
</section>