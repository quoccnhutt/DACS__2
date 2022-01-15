<div class="main-panel">
    <div class="content-wrapper">
        <a href="<?php echo BASE_URL ?>categoryController/list_category">
            <button type="button" class="btn btn-inverse-dark btn-icon btn-sm mb-2">
                <i class="mdi mdi-backburger text-dark"></i>
            </button>
        </a>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <h2 class="card-title" style="text-align: center">Chi tiết danh mục sản phẩm</h2>

                        <div class="table-responsive">
                            <?php foreach ($categorybyid as $key => $cate) { ?>
                                <ul class="list-star ">
                                    <li class="fw-bold text-danger">Mã danh mục:
                                        <span class="text-dark">
                                            <?= $cate['maDM'] ?>
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Tên danh mục:
                                        <span class="text-dark">
                                            <?= $cate['title_category_product'] ?>
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Mô tả danh mục:
                                        <span class="text-dark">
                                            <?= $cate['decription'] ?>
                                        </span>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>