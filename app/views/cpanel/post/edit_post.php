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

    <a href="<?php echo BASE_URL ?>postController/list_post">
      <button type="button" class="btn btn-inverse-dark btn-icon btn-sm mb-2">
        <i class="mdi mdi-backburger text-dark"></i>
      </button>
    </a>

    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Cập nhật bài viết</h4>
            <?php foreach ($postbyid as $key => $pos) { ?>
              <form class="forms-sample" action="<?php echo BASE_URL ?>postController/update_post/<?php echo $pos['id_post'] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputName1">Tên bài viết</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên bài viết" name="title_post" value="<?= $pos['title_post'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="uname">Hình ảnh:</label>
                  <div class="custom-file">
                    <img src="<?= BASE_URL ?>public/uploads/imgpost/<?= $pos['image_post'] ?>" height="100px" width="100px" alt="<?= BASE_URL ?>public/uploads/imgpost/<?= $pos['image_post'] ?>">
                    <input type="file" class="form-control custom-file-input" id="customFile" name="image_post">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Chi tiết bài viết</label>
                  <textarea id="editor" name="content_post" class="form-control" id="exampleTextarea1" rows="4" style="height: 50px;"><?= $pos['title_post'] ?></textarea>
                </div>

                <div class="form-group ">
                  <label>Danh mục</label>
                  <select class="js-example-basic-single w-100" name="category_product">
                    <?php foreach ($category_post as $key => $cate) { ?>
                      <option <?php if ($cate['id_category_post'] == $pos['id_category_post']) {
                                echo 'selected';
                              }    ?> value="<?php echo $cate['id_category_post'] ?>"><?php echo $cate['title_category_post'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <button type="submit" class="btn btn-primary me-2 btn-sm" name="sua_bai_viet">Cập nhật</button>
                <!-- <button class="btn btn-light">Cancel</button> -->
              </form>
            <?php } ?>

          </div>
        </div>
      </div>