<div class="main-panel">
    <div class="content-wrapper">

        <?php
        if (!empty($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo ' 
					<div class="alert alert-success alert-dismissible in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="mdi mdi-close"></i></a>
					 	 <strong>Thông báo!!!</strong> ' . $value . '
					</div>
				';
            }
        }
        ?>
        <a href="<?php echo BASE_URL ?>quanlyslide/add_slide" class="text-white">
            <button type="button" class="btn btn-dark btn-icon-text btn-sm mb-2 ">
                <i class="ti-file btn-icon-append"></i>
                Thêm mới
            </button>
        </a>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Quản lý slide</h4>

                        <div class="table-responsive">
                            <table class="table table-hover tableslide">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Hình ảnh</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($slides as $key => $row) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td>
                                                <div class="">
                                                    <?= $row['title_slide'] ?>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="<?= BASE_URL ?>public/uploads/imgslide/<?= $row['image_slide'] ?>" height="100px" width="200px" alt="<?= BASE_URL ?>public/uploads/imgslide/<?= $row['image_slide'] ?>">
                                            </td>

                                            <td>
                                                <a href="<?php echo BASE_URL ?>quanlyslide/edit_slide/<?= $row['id_slide'] ?>" class="btn btn-primary btn-sm">Sửa</a>
                                                <a href="<?php echo BASE_URL ?>quanlyslide/delete_slide/<?= $row['id_slide'] ?>" class="btn btn-danger btn-sm">Xoá</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>