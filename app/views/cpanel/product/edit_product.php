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
        <a href="<?php echo BASE_URL ?>categoryController/list_product">
          <button type="button" class="btn btn-inverse-dark btn-icon btn-sm mb-2">
            <i class="mdi mdi-backburger text-dark"></i>
          </button>
        </a>
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Cập nhật sản phẩm</h4>
                <?php
                foreach ($productbyid as $key => $pro) {
                ?>
                  <form class="forms-sample" action="<?php echo BASE_URL ?>categoryController/update_product/<?php echo $pro['id_product'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Tên sản phẩm</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên sản phẩm" name="title_product" value="<?= $pro['title_product'] ?>" required>
                    </div>
                    <div class=" form-group">
                      <label for="uname">Hình ảnh 1:</label>
                      <div class="custom-file">
                        <img src="<?= BASE_URL ?>public/uploads/imgproduct/<?= $pro['image_product'] ?>" height="100px" width="100px" alt="<?= BASE_URL ?>public/uploads/imgproduct/<?= $pro['image_product'] ?>">
                        <input type="file" class="form-control custom-file-input" id="customFile" name="image_product">
                      </div>
                    </div>
                    <div class=" form-group">
                      <label for="uname">Hình ảnh 2:</label>
                      <div class="custom-file">
                        <img src="<?= BASE_URL ?>public/uploads/imgproduct/<?= $pro['image_product_2'] ?>" height="100px" width="100px" alt="<?= BASE_URL ?>public/uploads/imgproduct/<?= $pro['image_product_2'] ?>">
                        <input type="file" class="form-control custom-file-input" id="customFile1" name="image_product_2">
                      </div>
                    </div>
                    <div class=" form-group">
                      <label for="uname">Hình ảnh 3:</label>
                      <div class="custom-file">
                        <img src="<?= BASE_URL ?>public/uploads/imgproduct/<?= $pro['image_product_3'] ?>" height="100px" width="100px" alt="<?= BASE_URL ?>public/uploads/imgproduct/<?= $pro['image_product_3'] ?>">
                        <input type="file" class="form-control custom-file-input" id="customFile2" name="image_product_3">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Giá (VNĐ)</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Giá sản phẩm (Ví dụ: 100000)" name="price_product" value="<?= $pro['price_product'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Mô tả sản phẩm</label>
                      <textarea id="editor" name="desc_product" class="form-control" id="exampleTextarea1" rows="4" style="height: 50px;" required>
                  <?= $pro['desc_product'] ?>
                </textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Số lượng</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Số lượng sản phẩm" name="quantity_product" value="<?= $pro['quantity_product'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Ngày nhập sản phẩm</label>
                      <input type="text" class="form-control" id="exampleInputName11" placeholder="" name="date" value="<?= $pro['date'] ?>" require>
                    </div>
                    <div class="form-group ">
                      <label>Danh mục</label>
                      <select class="js-example-basic-single w-100" name="category_product">
                        <?php foreach ($category as $key => $cate) { ?>
                          <option <?php if ($cate['id_category_product'] == $pro['id_category_product']) {
                                    echo 'selected';
                                  }    ?> value="<?php echo $cate['id_category_product'] ?>"><?php echo $cate['title_category_product'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Nổi bật</label>
                      <select class="form-control" id="exampleSelectGender" name="noi_bat">
                        <?php if ($pro['noi_bat'] == 0) {  ?>
                          <option value="0" selected>Không</option>
                          <option value="1">Có</option>
                        <?php } else { ?>
                          <option value="0">Không</option>
                          <option value="1" selected>Có</option>
                        <?php } ?>
                      </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-2 btn-sm" name="sua_san_pham">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                  </form>
                <?php } ?>

              </div>
            </div>
          </div>