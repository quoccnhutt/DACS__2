<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
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

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tài khoản người dùng</h4>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Mật khâu</th>
                                        <th>Địa chỉ</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($account_user as $key => $value) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $value['name_user'] ?></td>
                                            <td><?= $value['email_user'] ?></td>
                                            <td><?= $value['phone_user'] ?></td>
                                            <td><?= $value['password_user'] ?></td>
                                            <td><?= $value['address_user'] ?></td>
                                            <td>
                                                <a href="<?php echo BASE_URL ?>user/details_user/<?= $value['id_user'] ?>" class="btn btn-warning btn-sm">Xem</a>
                                                <!-- <a href="<?php echo BASE_URL ?>categoryController/delete_category/<?= $value['id_category_product'] ?>" class="btn btn-danger btn-sm">Xoá</a> -->
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>