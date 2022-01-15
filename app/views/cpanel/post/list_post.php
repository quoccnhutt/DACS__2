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

    <a href="<?php echo BASE_URL ?>postController/add_post" class="text-white">
      <button type="button" class="btn btn-dark btn-icon-text btn-sm mb-2 ">
        <i class="ti-file btn-icon-append"></i>
        Thêm mới
      </button>
    </a>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách bài viết</h4>

            <div class="table-responsive">
              <table class="table table-hover tbl-list">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên bài viết</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung</th>
                    <th>Danh mục BV</th>
                    <th>Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  foreach ($posts as $key => $row) {
                    $i++;
                  ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td>
                        <div class="vanban">
                          <?= $row['title_post'] ?>
                        </div>
                      </td>
                      <td>
                        <img src="<?= BASE_URL ?>public/uploads/imgpost/<?= $row['image_post'] ?>" height="100px" width="100px" alt="<?= BASE_URL ?>public/uploads/imgpost/<?= $row['image_post'] ?>">
                      </td>
                      <td>
                        <div class="vanban">
                          <?= $row['content_post'] ?>
                        </div>
                      </td>

                      <td>
                        <?= $row['title_category_post'] ?>
                      </td>
                      <td>
                        <a href="<?php echo BASE_URL ?>postController/xemchitietbaiviet/<?= $row['id_post'] ?>" class="btn btn-warning btn-sm">Xem</a>
                        <a href="<?php echo BASE_URL ?>postController/edit_post/<?= $row['id_post'] ?>" class="btn btn-primary btn-sm">Sửa</a>
                        <a href="<?php echo BASE_URL ?>postController/delete_post/<?= $row['id_post'] ?>" class="btn btn-danger btn-sm">Xoá</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>