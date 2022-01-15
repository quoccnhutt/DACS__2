<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="">
      <div class="row">
        <div class="col-md-2">
          <button type="button" class="btn btn-dark btn-icon-text add btn-sm mb-2" data-toggle="modal" data-target="#add">Add</button>
        </div>
        <div class="col-md-5">

        </div>
        <div class="col-md-5">
          <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" name="search" id="search" class="form-control" placeholder="Search">
          </div>
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
    </style>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh mục sản phẩm</h4>

            <div class="table-responsive" id="data_list">
              <table class="table table-hover ">
                <!-- table-striped table-bordered -->
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Quản lý</th>
                  </tr>
                </thead>
                <tbody id="">
                </tbody>
              </table>
            </div>

            <!-- Thêm danh mục -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal_title">Thêm danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" id="form_add">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label" style="padding: 0;">Tên danh muc:</label>
                        <input type="text" class="form-control" id="name_cate" name="title_category_product" placeholder="Tên danh mục" value="">
                        <span id="error_title" class="text-danger fsize-12"></span>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã danh muc:</label>
                        <input type="text" class="form-control" id="code_cate" name="maDM" placeholder="Mã danh mục" value="">
                        <span id="error_code" class="text-danger fsize-12"></span>
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Mô tả:</label>
                        <textarea class="form-control desc" id="desc_cate" name="description" placeholder="Mô tả"></textarea>
                        <span id="error_desc" class="text-danger fsize-12"></span>

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
        #form_add .form-group label {
          padding: 0;
        }

        .fsize-12 {
          font-size: 12px;
        }

        .cke_dialog {
          z-index: 10055 !important;
        }
      </style>
      <script>
        $(document).ready(function() {
          load_data(1);



          // CK EDITOR
          CKEDITOR.replace('desc_cate', {
            width: "100%",
            height: "100px"
          });

          $(document).on('click', '.pagination li a', function(e) {
            e.preventDefault(); // Không load lại trang khi click phân trang.
            let url = $(this).attr('data-page');
            load_data(url);
          });

          function load_data(page) {
            $.ajax({
              url: "<?php echo BASE_URL ?>categoryController/load_data_catepro",
              method: "GET",
              data: {
                page: page
              },
              dataType: "text",
              success: function(data) {
                $('#data_list').html(data);
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

          $('.add').on('click', function() {
            $('#modal_title').text('Thêm danh mục');
            $('#name_cate').val('');
            $('#code_cate').val('');
            // $('.desc').val('');
            CKEDITOR.instances['desc_cate'].setData('');
            $('#action').val('insert');
            $('#hidden_id').val('');
            $('#form_action').val('Insert');
          })

          $('#form_add').on('submit', function(event) {
            event.preventDefault();

            // alert('ok');

            var error_title = '';
            var error_code = '';
            var desc = CKEDITOR.instances['desc_cate'].getData();
            if ($('#name_cate').val() == '') {
              error_title = 'Không được để trống trường này';
              $('#error_title').text(error_title);
              $('#name_cate').css('border-color', '#cc0000');
            } else {
              error_title = '';
              $('#error_title').text(error_title);
              $('#name_cate').css('border-color', '');
            }
            if ($('#code_cate').val() == '') {
              error_code = 'Không được để trống trường này';
              $('#error_code').text(error_code);
              $('#code_cate').css('border-color', '#cc0000');
            } else {
              error_code = '';
              $('#error_code').text(error_code);
              $('#code_cate').css('border-color', '');
            }

            if (desc == '') {
              error_desc = 'Không được để trống trường này';
              $('#error_desc').text(error_desc);
              $('#desc_cate').css('border-color', '#cc0000');
            } else {
              error_desc = '';
              $('#error_desc').text(error_desc);
              $('#desc_cate').css('border-color', '');
            }

            if (error_title != '' || error_code != '') {
              return false;
            } else {
              var form_data = $('#form_add').serialize();
              // alert(form_data);
              var action = $('#action').val();
              var title_category_product = $('#name_cate').val();
              var maDM = $('#code_cate').val();
              var id = $('#hidden_id').val();

              $.ajax({
                url: "<?php echo BASE_URL ?>categoryController/crud_category_product",
                method: "POST",
                data: {
                  form_data,
                  action: action,
                  id:id,
                  description: desc,
                  title_category_product: title_category_product,
                  maDM: maDM
                },
                dataType: "json",
                success: function(data) {
                  message = data.msg.msg;
                  icon = data.msg.icon;
                  alertSweet(icon, message);
                  load_data(1);
                  $('.bt-close').click();
                  $('#form_add')[0].reset();
                  // alert(data);
                }
              });
            }
          });

          $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            var action = 'fetch_single';
            $.ajax({
              url: "<?php echo BASE_URL ?>categoryController/crud_category_product",
              method: "POST",
              data: {
                id: id,
                action: action
              },
              dataType: "json",
              success: function(data) {
                $('#modal_title').text('Cập nhật danh mục');
                $('#name_cate').val(data.data.title);
                $('#code_cate').val(data.data.code);
                CKEDITOR.instances['desc_cate'].setData(data.data.desc);
                // $('.desc').val(data.data.desc);
                $('#action').val('update');
                $('#hidden_id').val(id);
                $('#form_action').val('Update');
              }
            });
          });

          $(document).on('click', '.delete', function() {
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
                  url: "<?php echo BASE_URL ?>categoryController/delete_category",
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
          $('#search').keyup(function() {
            var txt = $('#search').val();
            $.post('<?php echo BASE_URL ?>categoryController/search_category', {
              search: txt
            }, function(data) {
              $('#result_search').html(data);
            })
          })

        });
      </script>