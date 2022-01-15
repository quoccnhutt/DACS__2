<div class="main-panel">
    <div class="content-wrapper">
        <a href="<?php echo BASE_URL ?>user/user">
            <button type="button" class="btn btn-inverse-dark btn-icon btn-sm mb-2">
                <i class="mdi mdi-backburger text-dark"></i>
            </button>
        </a>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title" style="text-align: center">Chi tiết tài khoản</h2>
                        <div class="table-responsive">
                            <?php foreach ($data as $key => $row) { ?>
                                <ul class="list-star ">
                                    <li class="fw-bold text-danger">Tên khách hàng:
                                        <span class="text-dark">
                                            <?= $row['name_user'] ?>
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Số điện thoại:
                                        <span class="text-dark">
                                            <?= $row['phone_user'] ?>
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Email:
                                        <span class="text-dark">
                                            <?= $row['email_user'] ?>
                                        </span>
                                    </li>
                                    <li class="fw-bold text-danger">Địa chỉ:
                                        <span class="text-dark">
                                            <?= $row['address_user'] ?>
                                        </span>
                                    </li>

                                </ul>
                            <?php } ?>
                        </div>
                    </div>