<?php

class quanlyslide extends DController
{

    public function __construct()
    {
        $data = array();
        parent::__construct();
    }

    public function index()
    {
        $this->slide();
    }

    public function slide()
    {
        session::init();

        $table = 'tbl_slide';
        $slideModel = $this->load->model('slideModel');
        $data['slides'] = $slideModel->select_slide($table);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/slide/slide', $data);
        $this->load->view('cpanel/footer');
    }
    public function add_slide()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');

        $this->load->view('cpanel/slide/add_slide');
        $this->load->view('cpanel/footer');
    }
    public function insert_slide()
    {
        $title = $_POST['title_slide'];

        // Xử lý hình ảnh
        $image = $_FILES['image_slide']['name'];
        $tmp_image = $_FILES['image_slide']['tmp_name'];
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = "public/uploads/imgslide/" . $unique_image;


        $table = 'tbl_slide';
        $data = array(
            'title_slide'             => $title,
            'image_slide'             => $unique_image
        );
        $slideModel = $this->load->model('slideModel');
        $result = $slideModel->insertSlide($table, $data);

        if ($result == 1) {
            move_uploaded_file($tmp_image, $path_uploads);

            $message['msg'] = "Thêm hình ảnh slideshow thành công";
            header('Location:' . BASE_URL . "quanlyslide?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Thêm hình ảnh slideshow thất bại";
            header('Location:' . BASE_URL . "quanlyslide/add_slide?msg=" . urlencode(serialize($message)));
        }
    }


    public function edit_slide($id)
    {

        $table1 = 'tbl_slide';
        $condition = "id_slide='$id'";

        $slideModel = $this->load->model('slideModel');

        $data['slidebyid'] = $slideModel->slidebyId($table1, $condition);


        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/slide/edit_slide', $data);
        $this->load->view('cpanel/footer');
    }


    public function update_slide($id)
    {
        $table = 'tbl_slide';
        $condition = "id_slide='$id'";
        $slideModel = $this->load->model('slideModel');


        $title = $_POST['title_slide'];


        // Xử lý hình ảnh
        $image = $_FILES['image_slide']['name'];
        $tmp_image = $_FILES['image_slide']['tmp_name'];
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = "public/uploads/imgslide/" . $unique_image;
        if ($image) {
            $data['slidebyid'] = $slideModel->slidebyId($table, $condition);
            foreach ($data['slidebyid'] as $key => $value) {
                $path_unlink = "public/uploads/imgslide/";
                unlink($path_unlink . $value['image_slide']);
            }
            move_uploaded_file($tmp_image, $path_uploads);

            $data = array(
                'title_slide'             => $title,
                'image_slide'             => $unique_image
            );
        } else {
            $data = array(
                'title_slide'             => $title

                // 'image_post' 			=> $unique_image,

            );
        }

        $result = $slideModel->updateSlide($table, $data, $condition);


        if ($result == 1) {
            $message['msg'] = "Cập nhật thành công";
            header('Location:' . BASE_URL . "quanlyslide/slide?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Cập nhật thất bại";
            header('Location:' . BASE_URL . "quanlyslide/edit_slide?msg=" . urlencode(serialize($message)));
        }
    }
    public function delete_slide($id)
    {
        $table = 'tbl_slide';
        $condition = "id_slide = '$id'";
        $slideModel = $this->load->model('slideModel');

        $result = $slideModel->deleteSlide($table, $condition);

        if ($result == 1) {
            $message['msg'] = "Xoá thành công";
            header('Location:' . BASE_URL . "quanlyslide/slide?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Xoá thất bại";
            header('Location:' . BASE_URL . "quanlyslide/slide?msg=" . urlencode(serialize($message)));
        }
    }

    // BANNERRRRRRRRRRR 

    public function banner()
    {
        session::init();

        $table = 'tbl_banner';
        $slideModel = $this->load->model('slideModel');
        $data['banners'] = $slideModel->select_banner($table);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/banner/banner', $data);
        $this->load->view('cpanel/footer');
    }
    public function add_banner()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');

        $this->load->view('cpanel/banner/add_banner');
        $this->load->view('cpanel/footer');
    }
    public function insert_banner()
    {
        $title = $_POST['title_banner'];
        $thutu = $_POST['thutu'];

        // Xử lý hình ảnh
        $image = $_FILES['img_banner']['name'];
        $tmp_image = $_FILES['img_banner']['tmp_name'];
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = "public/uploads/imgbanner/" . $unique_image;


        $table = 'tbl_banner';
        $data = array(
            'title_banner'             => $title,
            'img_banner'             => $unique_image,
            'thutu'             => $thutu
        );
        $slideModel = $this->load->model('slideModel');
        $result = $slideModel->insertBanner($table, $data);

        if ($result == 1) {
            move_uploaded_file($tmp_image, $path_uploads);

            $message['msg'] = "Thêm hình ảnh banner thành công";
            header('Location:' . BASE_URL . "quanlyslide/banner?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Thêm hình ảnh slideshow thất bại";
            header('Location:' . BASE_URL . "quanlyslide/add_banner?msg=" . urlencode(serialize($message)));
        }
    }


    public function edit_banner($id)
    {

        $table1 = 'tbl_banner';
        $condition = "id_banner='$id'";

        $slideModel = $this->load->model('slideModel');

        $data['bannerbyid'] = $slideModel->bannerbyId($table1, $condition);


        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/banner/edit_banner', $data);
        $this->load->view('cpanel/footer');
    }


    public function update_banner($id)
    {
        $table = 'tbl_banner';
        $condition = "id_banner='$id'";
        $slideModel = $this->load->model('slideModel');


        $thutu = $_POST['thutu'];
        $title = $_POST['title_banner'];


        // Xử lý hình ảnh
        $image = $_FILES['img_banner']['name'];
        $tmp_image = $_FILES['img_banner']['tmp_name'];
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        $path_uploads = "public/uploads/imgbanner/" . $unique_image;
        if ($image) {
            $data['bannerbyid'] = $slideModel->bannerbyId($table, $condition);
            foreach ($data['bannerbyid'] as $key => $value) {
                $path_unlink = "public/uploads/imgbanner/";
                unlink($path_unlink . $value['img_banner']);
            }
            move_uploaded_file($tmp_image, $path_uploads);

            $data = array(
                'title_banner'             => $title,
                'img_banner'             => $unique_image,
                'thutu'             => $thutu
            );
        } else {
            $data = array(
                'title_slide'             => $title,
                'thutu'                     => $thutu

                // 'image_post' 			=> $unique_image,

            );
        }

        $result = $slideModel->updateBanner($table, $data, $condition);


        if ($result == 1) {
            $message['msg'] = "Cập nhật thành công";
            header('Location:' . BASE_URL . "quanlyslide/banner?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Cập nhật thất bại";
            header('Location:' . BASE_URL . "quanlyslide/edit_slide?msg=" . urlencode(serialize($message)));
        }
    }
    public function delete_banner($id)
    {
        $table = 'tbl_banner';
        $condition = "id_banner = '$id'";
        $slideModel = $this->load->model('slideModel');

        $result = $slideModel->deleteBanner($table, $condition);

        if ($result == 1) {
            $message['msg'] = "Xoá thành công";
            header('Location:' . BASE_URL . "quanlyslide/banner?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Xoá thất bại";
            header('Location:' . BASE_URL . "quanlyslide/banner?msg=" . urlencode(serialize($message)));
        }
    }
}
