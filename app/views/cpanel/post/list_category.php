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

    <a href="<?php echo BASE_URL ?>categoryController/add_category" class="text-white">
      <button type="button" class="btn btn-dark btn-icon-text btn-sm mb-2 ">
        <i class="ti-file btn-icon-append"></i>
        Thêm mới
      </button>
    </a>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh mục bài viết</h4>

            <div class="table-responsive">
              <table class="table table-hover" id="example2">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  foreach ($categoryPost as $key => $cate) {
                    $i++;
                  ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $cate['title_category_post'] ?></td>
                      <td><?= $cate['description'] ?></td>
                      <td>
                        <a href="<?php echo BASE_URL ?>postController/xem_category/<?= $cate['id_category_post'] ?>" class="btn btn-warning btn-sm">Xem</a>
                        <a href="<?php echo BASE_URL ?>postController/edit_category/<?= $cate['id_category_post'] ?>" class="btn btn-primary btn-sm">Sửa</a>
                        <a href="<?php echo BASE_URL ?>postController/delete_category/<?= $cate['id_category_post'] ?>" class="btn btn-danger btn-sm">Xoá</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function() {
          $('#example2').DataTable();
        })
      </script>