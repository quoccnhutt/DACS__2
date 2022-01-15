<!-- 

width:100%;// chiều rộng bằng khối bao nó
    white-space: pre-wrap; 
    overflow: hidden; // ẩn các nội dung khi kích thước lớn hơn chiều rộng khối bên ngoài
    text-overflow: ellipsis; //thêm 3 dấu chấm ở cuối
    -webkit-line-clamp: 3;// số dòng muốn hiển thị
    -webkit-box-orient: vertical;
     display: -webkit-box;

 -->

<?php
$url = $_GET['url'];
$url = rtrim($url, '/');
$url = explode('/', $url);
if (empty($url[2])) {
  $url[2] = 1;
}
?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="">
      <div class="row">
        <div class="col-md-2">
          <button type="button" class="btn btn-dark btn-icon-text addproduct btn-sm mb-2" data-toggle="modal" data-target="#add_product">Add</button>
        </div>
        <div class="col-md-5">
          <div class="">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="gender3">Danh mục</label>
              </div>
              <select class="custom-select" id="category">
                <option selected value="">Tất cả sản phẩm</option>
                <?php foreach ($category as $key => $cate) { ?>
                  <option value="<?php echo $cate['id_category_product'] ?>">
                    <?php echo $cate['title_category_product'] ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" name="search_product" id="search_product" class="form-control" placeholder="Search">
          </div>
        </div>
      </div>
      <style>
        .has-search .form-control {
          padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
          position: absolute;
          z-index: 2;
          display: block;
          width: 2.375rem;
          height: 2.375rem;
          line-height: 2.375rem;
          text-align: center;
          pointer-events: none;
          color: #aaa;
        }

        label:not(.input-group-text) {
          margin-top: 1rem;
        }
      </style>

      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Danh sách sản phẩm</h4>

              <div class="table-responsive" id="data_list_product">
                <table class="table table-hover tbl-list11 table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên sản phẩm</th>
                      <th>Giá mới</th>
                      <th>Giá cũ</th>
                      <th>Mô tả</th>
                      <th>Số lượng</th>
                      <th>Hình ảnh 1</th>
                      <th>Hình ảnh 2</th>
                      <th>Hình ảnh 3</th>
                      <th>Danh mục</th>
                      <th>Nổi bật</th>
                      <th>Ngày</th>
                      <th>Quản lý</th>
                    </tr>
                  </thead>
                  <tbody id="">

                  </tbody>
                </table>
              </div>
              <!-- Thêm danh mục -->
              <div class="modal fade" id="add_product" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal_title">Thêm sản phẩm</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="form_addpro" action="<?php echo BASE_URL ?>categoryController/crud_product" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Tên sản phẩm</label>
                          <input type="text" class="form-control" id="title_product" name="title_product" placeholder="Tên sản phẩm" value="">
                          <span id="error_title" class="text-danger fsize-12"></span>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Giá mới</label>
                          <input type="text" class="form-control" id="price_product" name="price_product" placeholder="Giá sản phẩm (Ví dụ: 100000)" value="">
                          <span id="error_price" class="text-danger fsize-12"></span>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Giá cũ</label>
                          <input type="text" class="form-control" id="old_price_product" name="old_price_product" placeholder="Giá cũ sản phẩm" value="">
                          <span id="error_price_old" class="text-danger fsize-12"></span>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Số lượng</label>
                          <input type="text" class="form-control" id="quantity_product" name="quantity_product" placeholder="Số lượng sản phẩm" value="">
                          <span id="error_quantity" class="text-danger fsize-12"></span>
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Mô tả:</label>
                          <textarea class="form-control desc_product" id="desc_product" name="desc_product" placeholder="Mô tả sản phẩm (Thông số kỹ thuật, hướng dẫn, giới thiệu,..."></textarea>
                          <span id="error_desc" class="text-danger fsize-12"></span>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Hình ảnh 1</label>
                          <div class="custom-file">
                            <div id="showImg">

                            </div>
                            <input type="file" class="form-control custom-file-input" id="image_product" name="image_product" value="">
                          </div>
                          <span id="error_image_product" class="text-danger fsize-12"></span>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Hình ảnh 2</label>
                          <div class="custom-file">
                            <input type="file" class="form-control custom-file-input" id="image_product_2" name="image_product_2">
                          </div>
                          <span id="error_image_product_2" class="text-danger fsize-12"></span>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Hình ảnh 3</label>
                          <div class="custom-file">
                            <input type="file" class="form-control custom-file-input" id="image_product_3" name="image_product_3">
                          </div>
                          <span id="error_image_product_3" class="text-danger fsize-12"></span>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Ngày nhập</label>
                          <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">
                              <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="date" class="form-control" name="date" id="date">
                          </div>
                          <span id="error_date" class="text-danger fsize-12"></span>
                        </div>

                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Chọn danh mục</label>
                          <select class="form-control select2 " name="category_product" id="category_product" style="width: 100%;" id="category_product">
                            <?php foreach ($category as $key => $cate) { ?>
                              <option value="<?php echo $cate['id_category_product'] ?>">
                                <?php echo $cate['title_category_product'] ?>
                              </option>
                            <?php } ?>
                          </select>
                          <span id="error_catepro" class="text-danger fsize-12"></span>
                        </div>

                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Có nổi bật ???</label>
                          <select class="form-control select2 " style="width: 100%;" tabindex="-1" aria-hidden="true" name="noi_bat" id="noi_bat">
                            <option value="1">Có</option>
                            <option value="0" selected>Không</option>
                          </select>
                          <span id="error_noibat" class="text-danger fsize-12"></span>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm bt-close" data-dismiss="modal">Close</button>
                          <input type="hidden" name="action" id="action" value="insert" />
                          <input type="hidden" name="hidden_id" id="hidden_id" />
                          <input type="submit" name="form_action" id="form_action" class="btn btn-primary btn-sm" value="Insert" />
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <style>
          #form_addpro .form-group label {
            padding: 0;
          }

          .fsize-12 {
            font-size: 12px;
          }
        </style>

        <script>
          $(document).ready(function() {
            load_data(1);

            // CK EDITOR
            CKEDITOR.replace('desc_product', {
              width: "100%",
              height: "100px"
            });

            // select theo danh mục
            $(document).on('click', '#category', function(e) {
              e.preventDefault(); // Không load lại trang khi click phân trang.

              let id_cate = $(this).val();
              if (id_cate != '') {
                $.post('<?php echo BASE_URL ?>categoryController/search_product', {
                  id_cate: id_cate
                }, function(data) {
                  $('#result_search_product').html(data);
                })
              } else {
                load_data(1);
              }

            });
            // phân trang
            $(document).on('click', '.pagination li a', function(e) {
              e.preventDefault(); // Không load lại trang khi click phân trang.
              let url = $(this).attr('data-page');
              load_data(url);
            });

            function load_data(page) {
              $.ajax({
                url: "<?php echo BASE_URL ?>categoryController/load_data_product",
                method: "GET",
                data: {
                  page: page
                },
                success: function(data) {
                  $('#data_list_product').html(data);
                }
              })
            };

            function alertSweet(icon, msg) {
              Swal.fire({
                position: 'top-end',
                icon: icon,
                title: msg,
                showConfirmButton: false,
                timer: 1500
              })
            }


            $('#form_addpro').on('submit', function(event) {
              event.preventDefault();

              var error_title = '';
              var error_price = '';
              var error_price_old = '';
              var error_quantity = '';
              var error_desc = '';
              var error_image_product = '';
              var desc_product = CKEDITOR.instances['desc_product'].getData();
              // // title 
              if ($('#title_product').val() == '') {
                error_title = 'Không được để trống trường này';
                $('#error_title').text(error_title);
                $('#title_product').css('border-color', '#cc0000');
              } else {
                error_title = '';
                $('#error_title').text(error_title);
                $('#title_product').css('border-color', '');
              }
              // price
              if ($('#price_product').val() == '') {
                error_price = 'Không được để trống trường này';
                $('#error_price').text(error_price);
                $('#price_product').css('border-color', '#cc0000');
              } else {
                error_price = '';
                $('#error_price').text(error_price);
                $('#price_product').css('border-color', '');
              }
              // old_price
              if ($('#old_price_product').val() == '') {
                error_price_old = 'Không được để trống trường này';
                $('#error_price_old').text(error_price_old);
                $('#old_price_product').css('border-color', '#cc0000');
              } else if ($('#old_price_product').val() > $('#price_product').val()) {
                error_price_old = 'Giá giảm không thể lớn hơn giá gốc...!';
                $('#error_price_old').text(error_price_old);
                $('#old_price_product').css('border-color', '#cc0000');
              } else {
                error_price_old = '';
                $('#error_price_old').text(error_price_old);
                $('#old_price_product').css('border-color', '');
              }
              // quantity
              if ($('#quantity_product').val() == '') {
                error_quantity = 'Không được để trống trường này';
                $('#error_quantity').text(error_quantity);
                $('#quantity_product').css('border-color', '#cc0000');
              } else {
                error_quantity = '';
                $('#error_quantity').text(error_quantity);
                $('#quantity_product').css('border-color', '');
              }
              // description
              if (CKEDITOR.instances['desc_product'].getData() == '') {
                error_desc = 'Không được để trống trường này';
                $('#error_desc').text(error_desc);
                $('.desc_product').css('border-color', '#cc0000');
              } else {
                error_desc = '';
                $('#error_desc').text(error_desc);
                $('.desc_product').css('border-color', '');
              }
              // description
              if ($('#image_product').val() == '') {
                error_image_product = 'Không được để trống trường này';
                $('#error_image_product').text(error_image_product);
                $('#image_product').css('border-color', '#cc0000');
              } else {
                error_image_product = '';
                $('#error_image_product').text(error_image_product);
                $('#image_product').css('border-color', '');
              }
              if (error_title != '' || error_price != '' || error_price_old != '' || error_quantity != '' || error_desc != '' || error_image_product != '') {
                return false;
              } else {
                var form_data = $(this).serialize();
                var action = $('#action').val();
                var idHidden = $('#hidden_id').val();
                alert(action + idHidden);
                var FData = new FormData(this);
                FData.append('action', action);
                FData.append('desc_product', desc_product);
                FData.append('hidden_id', idHidden);


                $.ajax({
                  url: "<?php echo BASE_URL ?>categoryController/crud_product",
                  method: "POST",
                  data: FData,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(data) {
                    message = data.msg.msg;
                    icon = data.msg.icon;
                    alertSweet(icon, message);
                    load_data(1);
                    $('.bt-close').click();
                    $('#form_addpro')[0].reset();
                    console.log(data);
                    // alert(data);
                  },
                  error: function(error) {
                    console.log(error);
                    // alert(error);
                  }
                });
              }

            });

            $(document).on('click', '.editproduct', function(event) {
              event.preventDefault();
              var id = $(this).attr('id');

              $('#modal_title').text('Cập nhật sản phẩm');
              $('#action').val('update');
              $('#hidden_id').val(id);
              $('#form_action').val('Update');

              // alert(id);
              var action = 'fetch_single';
              $.ajax({
                url: "<?php echo BASE_URL ?>categoryController/crud_product",
                method: "POST",
                data: {
                  id: id,
                  action: action
                },
                dataType: "json",
                success: function(data) {
                  // alert(data);
                  $('#title_product').val(data.data.title_product);
                  $('#price_product').val(data.data.price_product);
                  $('#old_price_product').val(data.data.old_price_product);
                  $('#quantity_product').val(data.data.quantity_product);
                  CKEDITOR.instances['desc_product'].setData(data.data.desc_product);

                  $('#showImg').html('<img src="<?php echo BASE_URL ?>public/uploads/imgproduct/' + data.data.image_product + '" alt="' + data.data.image_product + '">');

                  $("select#category_product option[value='" + data.data.id_category_product + "']").attr("selected", "selected");

                  if (data.data.noi_bat != '0') {
                    $("select#noi_bat option[value='1']").attr("selected", "selected");
                  } else {
                    $("select#noi_bat option[value='0']").attr("selected", "selected");
                  }

                }
              });
            });

            $(document).on('click', '.deleteproduct', function() {
              var id = $(this).attr('id');
              var action = 'delete';

              Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url: "<?php echo BASE_URL ?>categoryController/delete_product",
                    method: "POST",
                    data: {
                      id: id,
                      action: action
                    },
                    dataType: "json",
                    success: function(data) {
                      if (data == true) {
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                      }
                      load_data(1);
                    }
                  });
                }
              })
            });

            // search
            $('#search_product').keyup(function() {
              var txt = $('#search_product').val();
              if (txt != '') {
                $.post('<?php echo BASE_URL ?>categoryController/search_product', {
                  search: txt
                }, function(data) {
                  $('#result_search_product').html(data);
                })
              } else {
                load_data(1);
              }

            })

          });
        </script>