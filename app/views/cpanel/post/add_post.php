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
							<h4 class="card-title">Thêm bài viết</h4>
							<form class="forms-sample" action="<?php echo BASE_URL ?>postController/insert_post" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label for="exampleInputName1">Tên bài viết</label>
									<input type="text" class="form-control" id="exampleInputName1" placeholder="Tên bài viết" name="title_post">
								</div>
								<div class="form-group">
									<label for="uname">Hình ảnh:</label>
									<div class="custom-file">
										<input type="file" class="form-control custom-file-input" id="customFile" name="image_post">
									</div>
								</div>
								<div class="form-group">
									<label for="exampleTextarea1">Chi tiết bài viết</label>
									<textarea id="editor" name="content_post" class="form-control" id="exampleTextarea1" rows="4" style="height: 50px;"></textarea>
								</div>
								<div class="form-group ">
									<label>Danh mục</label>
									<select class="js-example-basic-single w-100" name="category_post">
										<option selected>Chọn danh mục</option>
										<?php foreach ($category_post as $key => $cate) { ?>
											<option value="<?php echo $cate['id_category_post'] ?>"><?php echo $cate['title_category_post'] ?></option>
										<?php } ?>
									</select>
								</div>
								<button type="submit" class="btn btn-primary me-2 btn-sm" name="them_bai_viet">Thêm</button>
								<!-- <button class="btn btn-light">Cancel</button> -->
							</form>
						</div>
					</div>
				</div>