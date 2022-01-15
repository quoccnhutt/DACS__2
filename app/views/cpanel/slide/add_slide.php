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
        <a href="<?php echo BASE_URL ?>quanlyslide">
            <button type="button" class="btn btn-inverse-dark btn-icon btn-sm mb-2">
                <i class="mdi mdi-backburger text-dark"></i>
            </button>
        </a>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm hình ảnh slide</h4>
                        <form class="forms-sample" action="<?php echo BASE_URL ?>quanlyslide/insert_slide" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1">Tiêu đề slide</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="" name="title_slide">
                            </div>
                            <div class="form-group">
                                <label for="uname">Hình ảnh:</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control custom-file-input" id="customFile" name="image_slide">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2 btn-sm" name="them_slide">Thêm</button>
                            <!-- <button class="btn btn-light">Cancel</button> -->
                        </form>
                    </div>
                </div>
            </div>