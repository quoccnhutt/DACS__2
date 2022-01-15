<div class="main-panel">
    <div class="content-wrapper">
        <a href="<?php echo BASE_URL ?>postController/list_category">
            <button type="button" class="btn btn-inverse-dark btn-icon btn-sm mb-2">
                <i class="mdi mdi-backburger text-dark"></i>
            </button>
        </a>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title" style="text-align: center">Chi tiết danh mục bài viết</h2>
                        <div class="table-responsive">
                            <?php foreach ($categorybyid as $key => $cate) { ?>
                                <ul class="list-star ">
                                    <!-- <li class="fw-bold text-danger">Mã danh mục:
                                        <span class="text-dark">
                                            <?= $cate['maDM'] ?>
                                        </span>
                                    </li> -->
                                    <li class="fw-bold text-danger">Danh mục:
                                        <span class="text-dark">
                                            <?= $cate['title_category_post'] ?>
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Mô tả:
                                        <span class="text-dark">
                                            <?= $cate['description'] ?>
                                        </span>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>