<?php

class user extends DController
{

    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        $this->user();
    }

    public function user()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');

        $table_user = "tbl_user";

        $userModel = $this->load->model('userModel');
        $data['account_user'] = $userModel->list_user($table_user);


        $this->load->view('cpanel/users/list_user', $data);
        $this->load->view('cpanel/footer');
    }

    public function admin()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');

        $table = "tbl_admin";

        $userModel = $this->load->model('userModel');
        $data['account_admin'] = $userModel->list_admin($table);


        $this->load->view('cpanel/users/list_admin', $data);
        $this->load->view('cpanel/footer');
    }

    public function details_user($id)
    {

        $table1 = 'tbl_user';

        $condition = "id_user='$id'";
        $userModel = $this->load->model('userModel');

        $data['data'] = $userModel->userbyId($table1, $condition);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/users/detail_user', $data);
        $this->load->view('cpanel/footer');
    }

    public function check_login()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $table_user = 'tbl_user';
        $userModel = $this->load->model('userModel');

        $count = $userModel->login($table_user, $username, $password);

        if ($count == 0) {
            $message['msg'] = "Tên tài khoản hoặc mật khẩu SAI, xin kiểm tra lại!!!";
            header('Location:' . BASE_URL . "user/dangnhap?msg=" . urlencode(serialize($message)));
        } else {
            $result = $userModel->getLogin($table_user, $username, $password);

            session::init();
            session::set('user', true);
            session::set('user_name', $result[0]['username']);
            session::set('user_id', $result[0]['password']);

            $message['msg'] = "Đăng nhập thành công";
            header('Location:' . BASE_URL . "user/dangnhap?msg=" . urlencode(serialize($message)));
        }
    }
    public function dangnhap()
    {
        session::init();
        $table_user = 'tbl_user';
        $userModel = $this->load->model('userModel');



        $table = 'tbl_category_product';
        $table1 = 'tbl_category_post';
        $table_product = 'tbl_product';
        $categoryModel = $this->load->model('categoryModel');
        $productModel = $this->load->model('productModel');
        $data['danhmucsanpham'] = $categoryModel->list_category($table);
        $data['danhmucbaiviet'] = $categoryModel->list_category_post($table1);
        $data['product'] = $productModel->list_product_home($table_product);

        $this->load->view('header', $data);
        $this->load->view('dangnhap', $data);
        $this->load->view('footer');
    }

    public function insert_dangky()
    {
        session::init();

        $name           = $_POST['name'];
        $password       = $_POST['password'];
        $sdt            = $_POST['sdt'];
        $email          = $_POST['email'];
        $diachi         = $_POST['diachi'];

        $table_user = 'tbl_user';
        $data = array(
            'name_user'         => $name,
            'password_user'     => md5($password),
            'phone_user'        => $sdt,
            'email_user'        => $email,
            'address_user'      => $diachi
        );
        $userModel = $this->load->model('userModel');
        $result = $userModel->insert_user($table_user, $data);

        if ($result == 1) {
            $message['msg'] = "Đăng ký tài khoản thành công";
            header('Location:' . BASE_URL . "user/dangnhap?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Đăng ký tài khoản thất bại";
            header('Location:' . BASE_URL . "user/dangky?msg=" . urlencode(serialize($message)));
        }
    }


    public function dangky()
    {
        session::init();

        $table = 'tbl_category_product';
        $table1 = 'tbl_category_post';
        // $table_product = 'tbl_product';
        $categoryModel = $this->load->model('categoryModel');
        // $productModel = $this->load->model('productModel');
        $data['danhmucsanpham'] = $categoryModel->list_category($table);
        $data['danhmucbaiviet'] = $categoryModel->list_category_post($table1);
        // $data['product'] = $productModel->list_product_home($table_product);

        $this->load->view('header', $data);
        // $this->load->view('slider');
        $this->load->view('dangky');
        $this->load->view('footer');
    }
    public function dangxuat()
    {
        session::init();
        session::unset('user');
        $message['msg'] = "Đăng xuất tài khoản thành công";
        header('Location:' . BASE_URL . "user/dangnhap?msg=" . urlencode(serialize($message)));
    }
}
