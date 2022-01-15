<?php

class ajax extends DController
{
    public function __construct()
    {
        $message = array();
        $data = array();

        parent::__construct();
    }

    public function index()
    {

        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $a = $_POST["data"];
        if ($a != '') {
            $sql = "SELECT * FROM tbl_product WHERE title_product LIKE '%$a%' LIMIT 5";


            $productModel = $this->load->model('productModel');
            $data['result'] = $productModel->search($sql);

            $num = count($data['result'], 0);
            if ($num > 0) {
                foreach ($data['result'] as $key => $value) {

                    echo "<li class='kq'><a href='" . BASE_URL . "sanphamController/danhmuc/" . $value['id_category_product'] . "'>" . $value['title_product'] . "</a></li>";
                }
            }
        }
    }

    public function timkiemadmin()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $a = $_POST["data"];
        $sql = "SELECT * FROM tbl_product, tbl_category_product WHERE title_product LIKE '%$a%' AND tbl_product.id_category_product = tbl_category_product.id_category_product ORDER BY tbl_product.id_product DESC;";


        $productModel = $this->load->model('productModel');
        $data['result'] = $productModel->search($sql);

        $num = count($data['result'], 0);
        if ($num > 0) {
            $i = 0;
            foreach ($data['result'] as $key => $value) {
                $i++;
                echo "<tr>";

                echo "<td>" . $i . "</td>";

                echo "<td>";
                echo "  <div class='vanban'>" . $value['title_product'] . "</div>";
                echo "</td>";

                echo "<td>";
                echo number_format($value['price_product'], 0, ',', '.') . "'đ'";
                echo "</td>";

                echo "<td>";
                echo "  <div class='vanban'>" . $value['desc_product'] . "</div>";
                echo "</td>";

                echo "<td>" . $value['quantity_product'] . "</td>";

                echo "<td>";
                echo " <img src=" . BASE_URL . "public/uploads/imgproduct/" . $value['image_product'] . " height='100px' width='100px' alt=''> ";
                echo "</td>";
                echo "<td>";
                echo " <img src=" . BASE_URL . "public/uploads/imgproduct/" . $value['image_product_2'] . " height='100px' width='100px' alt=''> ";
                echo "</td>";
                echo "<td>";
                echo " <img src=" . BASE_URL . "public/uploads/imgproduct/" . $value['image_product_3'] . " height='100px' width='100px' alt=''> ";
                echo "</td>";

                echo "<td>" . $value['title_category_product'] . "</td>";

                echo "<td>";
                if ($value['noi_bat'] == 0) {
                    echo 'Không';
                } else {
                    echo 'Có';
                }
                echo "</td>";

                echo "<td>" . $value['date'] . "</td>";

                echo "<td>";
                echo "<a href='" . BASE_URL . "categoryController/xemchitiet_sanpham/" . $value['id_product'] . "' class='btn btn-warning btn-sm'>Xem</a> ";
                echo "<a href='" . BASE_URL . "categoryController/edit_product/" . $value['id_product'] . "' class='btn btn-primary btn-sm'>Cập nhật</a> ";
                echo "<a href='" . BASE_URL . "categoryController/delete_product/" . $value['id_product'] . "' class='btn btn-danger btn-sm'>Xoá</a> ";
                echo "</td>";

                echo "</tr>";
            }
        }
    }
    // Chọn tỉnh thành
    public function address()
    {
        $a = $_POST["txt"];

        $table_tinh = "province";
        $table_huyen = "district";

        $addressModel = $this->load->model('addressModel');
        $data['huyen'] = $addressModel->list_quanhuyen($table_huyen, $a);
        $data['tinh'] = $addressModel->list_tinh($table_tinh);

        $num = count($data['huyen'], 0);
        // echo $num;
        if ($num > 0) {
            foreach ($data['huyen'] as $key => $value) {
                echo "<option value='" . $value['id'] . "'>" . $value['_name'] . "</option>";
            }
        }
    }



    // review danh gia
    public function submit_rating()
    {
        if (isset($_POST['rating_data'])) {
            $user_name = $_POST['user_name'];
            $user_review = $_POST['user_review'];
            $user_rating = $_POST['rating_data'];
            $id_product = $_POST['id_product'];
            $date = date("Y-m-d H:i:s");

            // return $id_product;
            $table = 'tbl_review';
            $data = array(
                'id_product'             => $id_product,
                'user_name'             => $user_name,
                'user_rating'             => $user_rating,
                'user_review'             => $user_review,
                'date_review'           => $date


            );
            $productModel = $this->load->model('productModel');
            $result = $productModel->insertReview($table, $data);

            return $result;
        }
    }
    // load du lieu revieww
    public function load_data_rating()
    {
        if (isset($_GET["action"]) && isset($_GET["id_product"])) {

            $id_product = $_GET["id_product"];

            $average_rating = 0;
            $total_review = 0;
            $five_star_review = 0;
            $four_star_review = 0;
            $three_star_review = 0;
            $two_star_review = 0;
            $one_star_review = 0;
            $total_user_rating = 0;
            $review_content = array();

            $table_review = "tbl_review";

            $sql = "SELECT * FROM tbl_review WHERE id_product = '$id_product' ORDER BY id_review DESC";

            $productModel = $this->load->model('productModel');
            $data['data_review'] = $productModel->load_review($sql);

            foreach ($data['data_review'] as $row) {
                $review_content[] = array(
                    'user_name'        =>    $row["user_name"],
                    'user_review'    =>    $row["user_review"],
                    'rating'        =>    $row["user_rating"],
                    'datetime'        =>  $row["date_review"]
                );

                if ($row["user_rating"] == '5') {
                    $five_star_review++;
                }

                if ($row["user_rating"] == '4') {
                    $four_star_review++;
                }

                if ($row["user_rating"] == '3') {
                    $three_star_review++;
                }

                if ($row["user_rating"] == '2') {
                    $two_star_review++;
                }

                if ($row["user_rating"] == '1') {
                    $one_star_review++;
                }

                $total_review++;

                $total_user_rating = $total_user_rating + $row["user_rating"];
            }
            $average_rating = $total_user_rating / $total_review;

            $result = array();

            $result["kq"] = array(
                'average_rating'    =>    number_format($average_rating, 1),
                'total_review'        =>    $total_review,
                'five_star_review'    =>    $five_star_review,
                'four_star_review'    =>    $four_star_review,
                'three_star_review'    =>    $three_star_review,
                'two_star_review'    =>    $two_star_review,
                'one_star_review'    =>    $one_star_review,
                'review_data'        =>    $review_content
            );
            die(json_encode($result));
        }
    }

    // add comment
    public function add_comment()
    {
        $error = '';
        $comment_name = '';
        $comment_content = '';
        $id_product = $_GET['id_product'];
        $id_comment = $_GET['id_comment'];
        $date_comment = date("Y-m-d H:i:s");

        $data = array();

        // $id_product = $_POST["id_product"];
        if (empty($_GET["comment_name"])) {
            $error .= '<p class="text-danger">Name is required</p>';
        } else {
            $comment_name = $_GET["comment_name"];
        }

        if (empty($_GET["comment_content"])) {
            $error .= '<p class="text-danger">Comment is required</p>';
        } else {
            $comment_content = $_GET["comment_content"];
        }

        if ($error == '') {
            $table = 'tbl_comment';
            $data = array(
                'id_comment_parent'             => $_GET["id_comment"],
                'comment'                       => $comment_content,
                'comment_sender_name'           => $comment_name,
                'date_comment'                  => $date_comment,
                'id_product'                    => $id_product

            );
            $error = '<label class="text-success">Comment Added</label>';
            $productModel = $this->load->model('productModel');
            $result = $productModel->insertComment($table, $data);
        }
        $output['err'] = array(
            'error' => $error
        );
        die(json_encode($output));
    }

    // load comment
    public function load_comment()
    {

        $id_product = $_GET['id_product'];

        $table_comment = "tbl_comment";

        $sql = "SELECT * FROM tbl_comment WHERE id_comment_parent = '0' AND id_product = '$id_product' ORDER BY id_comment DESC";

        $productModel = $this->load->model('productModel');
        $data['data_comment'] = $productModel->load_comment($sql);


        $output = '';
        foreach ($data['data_comment'] as $key => $value) {
            $output .= '
                <div class="card panel-default " style="">
                <div class="card-header">By <b>' . $value["comment_sender_name"] . '</b> on <i>' . $value["date_comment"] . '</i></div>
                <div class="card-body">' . $value["comment"] . '</div>
                <div class="card-footer" align="right"><button type="button" class="btn btn-outline-secondary reply" id="' . $value["id_comment"] . '">Reply</button></div>
                </div>
            ';
            $data_reply = $productModel->get_reply_comment($value["id_comment"], $marginleft = 0);

            $output .= $data_reply;
        }
        echo $output;
    }
}
