<div class="main-panel">
    <div class="content-wrapper">
        <a href="<?php echo BASE_URL ?>categoryController/list_product">
            <button type="button" class="btn btn-inverse-dark btn-icon btn-sm mb-2">
                <i class="mdi mdi-backburger text-dark"></i>
            </button>
        </a>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title" style="text-align: center">Chi tiết sản phẩm</h2>
                        <div class="table-responsive">
                            <?php foreach ($productbyid as $key => $pro) { ?>
                                <ul class="list-star ">
                                    <li class="fw-bold text-danger">Tên sản phẩm:
                                        <span class="text-dark">
                                            <?= $pro['title_product'] ?>
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Giá:
                                        <span class="text-dark">
                                            <?= number_format($pro['price_product'], 0, ',', '.') . ' VNĐ' ?>
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Số lượng:
                                        <span class="text-dark">
                                            <?= $pro['quantity_product'] ?>
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Hình ảnh:
                                        <span class="text-dark">
                                            <img src="<?= BASE_URL ?>public/uploads/imgproduct/<?= $pro['image_product'] ?>" height="400px" width="400px" alt="">
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