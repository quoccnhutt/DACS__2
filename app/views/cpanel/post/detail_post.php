<div class="main-panel">
    <div class="content-wrapper">
        <a href="<?php echo BASE_URL ?>postController/list_post">
            <button type="button" class="btn btn-inverse-dark btn-icon btn-sm mb-2">
                <i class="mdi mdi-backburger text-dark"></i>
            </button>
        </a>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title" style="text-align: center">Chi tiết bài viết</h2>
                        <div class="table-responsive">
                            <?php foreach ($postbyid as $key => $row) { ?>
                                <ul class="list-star ">
                                    <li class="fw-bold text-danger">Tên bài viết:
                                        <span class="text-dark">
                                            <?= $row['title_post'] ?>
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Hình ảnh:
                                        <span class="text-dark">
                                            <img src="<?= BASE_URL ?>public/uploads/imgpost/<?= $row['image_post'] ?>" height="400px" width="400px" alt="">
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Nội dung bài viết:
                                        <span class="text-dark">
                                            <?= $row['content_post'] ?>
                                        </span>
                                    </li>


                                    <li class="fw-bold text-danger">Thuộc danh mục:
                                        <span class="text-dark">
                                            <?php foreach ($category as $key => $cate) { ?>
                                                <?= $cate['title_category_post'] ?>
                                            <?php } ?>
                                        </span>
                                    </li>

                                </ul>
                            <?php } ?>
                        </div>
                    </div>