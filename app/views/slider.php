<!-- slide -->
<div class="slide">
    <div id="myCarousel" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($slides as $key => $value) {  ?>
                <div class="carousel-item <?php if ($value['id_slide'] == 1) {
                                                echo "active";
                                            } ?>">
                    <img class="d-block w-100" src="<?php echo BASE_URL ?>public/uploads/imgslide/<?php echo $value['image_slide'] ?>" alt="<?php echo BASE_URL ?>public/uploads/imgslide/<?php echo $value['image_slide'] ?>">
                </div>
            <?php }  ?>

        </div>
    </div>
</div>
<!-- SLIDE end -->

<!-- banner -->
<div class="banner ">
    <div class="container ">
        <div class="row ">
            <?php
            foreach ($banners as $key => $row) {
            ?>

                <div class="col-xs-12 col-sm-4 col-md-4 img-1 ">
                    <a href="#" class="img-banner-a">
                        <img class="" src="<?= BASE_URL ?>public/uploads/imgbanner/<?= $row['img_banner'] ?>" alt="<?= $row['title_banner'] ?>" data-was-processed="true">
                    </a>
                </div>
            <?php }  ?>


        </div>
    </div>
</div>
<!-- banner end -->