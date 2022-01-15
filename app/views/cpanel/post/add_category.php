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

        <a href="<?php echo BASE_URL ?>postController/list_category">
            <button type="button" class="btn btn-inverse-dark btn-icon btn-sm mb-2">
                <i class="mdi mdi-backburger text-dark"></i>
            </button>
        </a>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm danh mục bài viết</h4>
                        <form class="forms-sample" action="<?php echo BASE_URL ?>postController/insert_category" method="POST">
                            <div class="form-group">
                                <label for="exampleInputName1">Tên danh muc</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên danh mục" name="title_category_post" required>
                            </div>
                            <!-- <div class="form-group">
	                                <label for="exampleInputName1">Mã danh mục</label>
	                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Mã danh mục" name="maDM">
	                            </div> -->
                            <div class="form-group">
                                <label for="exampleTextarea1">Mô tả</label>
                                <textarea name="description" class="form-control" id="editor" rows="8" style="height: 100px;" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-2 btn-sm" name="them_danh_muc_bai_viet">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>