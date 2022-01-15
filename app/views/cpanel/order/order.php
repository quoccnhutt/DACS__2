<!-- 

width:100%;// chiều rộng bằng khối bao nó
    white-space: pre-wrap; 
    overflow: hidden; // ẩn các nội dung khi kích thước lớn hơn chiều rộng khối bên ngoài
    text-overflow: ellipsis; //thêm 3 dấu chấm ở cuối
    -webkit-line-clamp: 3;// số dòng muốn hiển thị
    -webkit-box-orient: vertical;
     display: -webkit-box;

 -->

<!-- partial -->
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


        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tát cả đơn hàng</h4>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tình trạng</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($order as $key => $value) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $value['order_code'] ?></td>
                                            <td><?= $value['order_date'] ?></td>
                                            <td>
                                                <div class="">
                                                    <?php
                                                    if ($value['order_status'] == 0) {
                                                        echo 'Đơn hàng mới';
                                                    } else {
                                                        echo 'Đã xử lý';
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?php echo BASE_URL ?>order/order_details/<?= $value['order_code'] ?>" class="btn btn-primary btn-sm">

                                                    <i class="mdi mdi-eye"></i>
                                                </a>

                                                <?php
                                                if ($value['order_status'] != 0) {
                                                ?>
                                                    <button type="button" class="btn  btn-sm deleteOrder" id="<?php echo $value['order_id'] ?>">
                                                        <i class="mdi mdi-cup-off"></i>
                                                    </button>

                                                <?php }  ?>
                                            </td>
                                            <style>
                                                i.mdi.mdi-cup-off {
                                                    font-size: 20px;
                                                    color: #fff;
                                                }

                                                .deleteOrder {
                                                    background: red;
                                                }

                                                i.mdi.mdi-eye {
                                                    font-size: 20px;
                                                    color: #fff;

                                                }
                                            </style>
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
                    $(document).on('click', '.deleteOrder', function() {
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
                                    url: "<?php echo BASE_URL ?>order/delete_order",
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

                                    }
                                });
                            }
                        })
                    });
                })
            </script>