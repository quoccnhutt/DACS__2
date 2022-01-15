<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo ' 
					<div class="alert alert-success alert-dismissible in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					 	 <strong>Thông báo!!!</strong> ' . $value . '
					</div>
				';
    }
}

?>

<div class="main-panel">
    <div class="content-wrapper">
        <a href="<?php echo BASE_URL ?>order/order">
            <button type="button" class="btn btn-inverse-dark btn-icon btn-sm mb-2">
                <i class="mdi mdi-backburger text-dark"></i>
            </button>
        </a>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Khách hàng</h4>

                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($order_info as $key => $value) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td style="width: 20px"><?= $i ?></td>
                                            <td>
                                                <div class=""><?= $value['name'] ?></div>
                                            </td>

                                            <td>
                                                <div class=""><?= $value['phonenumber'] ?></div>
                                            </td>
                                            <td>
                                                <div class=""><?= $value['email'] ?></div>
                                            </td>
                                            <td>
                                                <div class=""><?= $value['address'] ?></div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chi tiết đơn hàng</h4>

                        <div class="table-responsive">
                            <table class="table table-hover  tbl-list-order">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $total = 0;
                                    foreach ($order_details as $key => $value) {
                                        $i++;
                                        $total += $value['price_product'] * $value['product_quantity'];
                                    ?>
                                        <tr>
                                            <td class="py-1"><?= $i ?></td>
                                            <td>
                                                <div class="">
                                                    <?= $value['title_product'] ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="">
                                                    <img src="<?= BASE_URL ?>public/uploads/imgproduct/<?= $value['image_product']  ?>" alt="<?= $value['image_product'] ?>" height="100px" width="100px">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <?= $value['product_quantity'] ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <?= number_format($value['price_product'], 0, ',', '.') ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class=""><?= number_format(($value['price_product'] * $value['product_quantity']), 0, ',', '.')  ?></div>
                                            </td>
                                            <td>
                                                <!-- <a href="<?php echo BASE_URL ?>order/order_details/<?= $value['order_code'] ?>" class="btn btn-success">Xem Đơn Hàng</a> -->
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <form method="POST" action="<?php echo BASE_URL ?>order/order_confirm/<?php echo $value['order_code'] ?>">
                                        <tr>
                                            <td>
                                                <input type="submit" name="update_order" value="Xử lý" class="btn btn-success btn-sm">
                                            </td>
                                            <td align="right" colspan="6">
                                                <div class="fw-bold">
                                                    <span class="">Tổng tiền: </span>
                                                    <span class="mark">
                                                        <?php echo number_format($total, 0, ',', '.') . 'VNĐ' ?>

                                                    </span>
                                                    <style>
                                                        .mark {
                                                            background-color: red;
                                                            color: #fff;
                                                        }
                                                    </style>
                                                </div>

                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>