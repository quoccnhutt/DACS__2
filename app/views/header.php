 <!DOCTYPE html>
 <html>

 <head>
     <title>Nhạc cụ Dương Đông</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
     <!-- <meta http-equiv="cleartype" content="on" />
     <link rel="icon" href="template/Default/img/favicon.ico" type="image/x-icon" />
     <meta name="Description" content="" />
     <meta name="Keywords" content="" /> -->
     <!--rieng-->
     <meta property="og:url" content="
     <?php
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        echo $actual_link;
        ?>" />
     <!-- <meta property="og:type" content="article" />
     <meta property="og:title" content="<?php echo $this->title ?>" />
     <meta property="og:description" content="<?php echo $this->desc ?>" />
     <meta property="og:image" content="<?php echo $this->image ?>" /> -->
     <!--rieng-->
     <!--tkw-->

     <!-- <meta vary="User-Agent" />
     <meta name="geo.region" content="VN-SG" />
     <link rel="icon" type="image/png" href="template/Default/img/favicon.png"> -->

     <!-- endinject -->
     <link rel="shortcut icon" href="<?php echo BASE_URL ?>public/images/logo2.png" />
     <!--tkw-->

     <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/style-index.css">
     <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/gioithieu.css">
     <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/tintuc.css">
     <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/lienhe.css">
     <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/dangky.css">
     <!-- <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/buttons.scss"> -->
     <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/base.scss.css">
     <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/sanpham.css">

     <!-- Bookstrap 4 css -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

     <!-- MMenu Css -->
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/8.5.24/mmenu.min.css">

     <!-- owl carousel CSS-->
     <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/owlcarousel/assets/owl.carousel.min.css">
     <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/owlcarousel/assets/owl.theme.default.min.css">

     <!-- QUERY 3.6 JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
     </script>

     <script src="<?php echo BASE_URL ?>public/css/owlcarousel/owl.carousel.min.js"></script>
     <script language="javascript" src="<?php echo BASE_URL ?>public/js/section3-slider.js"></script>

     <!-- hover css -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.1/css/hover-min.css" integrity="sha512-SJw7jzjMYJhsEnN/BuxTWXkezA2cRanuB8TdCNMXFJjxG9ZGSKOX5P3j03H6kdMxalKHZ7vlBMB4CagFP/de0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <script type="text/javascript" src="<?php echo BASE_URL ?>public/js/navigation.js"></script>

     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/8.5.24/addons/iconbar/mmenu.iconbar.min.css" integrity="sha512-OJdW/8K79XVTqt7DsAIp8XL93dlcV9Pz69VMKA7axTJ/r16oJndAiB0NfUDjLaxaGBdMCZsoz6er0iricOh0dQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/font-awesome-4.7.0/css/font-awesome.css" />

     <!-- js bookstrap -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

     <!-- Zoom images js -->
     <script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>

     <!-- font -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">


     <style>
         .result {
             background: #202020;
             margin-top: 10px;
             position: relative;
             width: 315px;
             z-index: 999;
         }

         li.kq {
             padding: 5px 25px;
             border-top: .5px solid #464646;
         }

         li.kq a {
             font-size: 15px;
         }

         li.kq:hover {
             background: #dfdfdf;
         }

         li.kq:hover a {
             text-decoration: none;

         }

         input#tukhoa {
             border-radius: 0;
         }

         button.btn.btn-primary.nuttimkiem {
             border-radius: 0;
         }
     </style>

     <script>
         $(document).ready(function() {
             $('#tukhoa').keyup(function() {
                 var txt = $('#tukhoa').val();
                 $.post('<?php echo BASE_URL ?>ajax', {
                     data: txt
                 }, function(data) {
                     $('#kqtimkiem').html(data);
                 });
             });
         });
     </script>


 </head>

 <body>

     <div id="my-page">
         <div id="my-header">
             <a href="#my-menu"><i class="fa fa-bars" aria-hidden="true"></i></a>

             <nav id="my-menu">
                 <ul>
                     <li class="active"><a href="<?php echo BASE_URL ?>">Trang Chủ</a></li>
                     <li><a href="<?php echo BASE_URL ?>index/gioithieu">Giới Thiệu</a></li>
                     <li><span>Sản phẩm</span>
                         <ul>
                             <?php foreach ($danhmucsanpham as $key => $value) { ?>
                                 <li><a class="" href="<?php echo BASE_URL ?>sanphamController/danhmuc/<?php echo $value['id_category_product'] ?>"><?php echo $value['title_category_product'] ?></a></li>
                             <?php }  ?>

                         </ul>
                     </li>
                     <li><a href="#">Piano-Organs</a></li>
                     <li><a href="#">Trống-Bộ gõ</a></li>
                     <li><a href="<?php echo BASE_URL ?>tintucController/tatca">Tin Tức</a></li>
                     <li><a href="<?php echo BASE_URL ?>index/lienhe">Liên Hệ</a></li>
                 </ul>
             </nav>
         </div>
         <div class="my-content">
             <div class="wrapper">
                 <!-- header START -->
                 <div class="container-fluid header ">
                     <div class="row">
                         <!-- LOGO -->
                         <div class="top-left col-md-4 " style="">
                             <a href="<?php echo BASE_URL ?>" class="logo-wrapper ">
                                 <img src="<?php echo BASE_URL ?>public/images/logo2.png" alt="<?php echo BASE_URL ?>public/images/logo2.png" style="padding-top: 10px">

                             </a>
                         </div>
                         <!-- NÚT LOGIN -->
                         <div class="top-right col-md-8  ">
                             <ul class="nav">
                                 <li class="nav-item ">
                                     <a class="nav-link" href="<?php echo BASE_URL ?>user/dangnhap"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Đăng nhập</a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" href="<?php echo BASE_URL ?>user/dangky"><i class="fa fa-user" aria-hidden="true"></i>Đăng ký</a>
                                 </li>
                                 <?php
                                    if (isset($_SESSION["shopping_cart"])) {
                                        $i = 0;
                                        foreach ($_SESSION["shopping_cart"] as $key => $value) {
                                            $i++;
                                        }
                                    } else {
                                        $i = 0;
                                    }

                                    ?>
                                 <li class="nav-item last">
                                     <a class="nav-link" href="<?php echo BASE_URL ?>giohangController/giohang" style="color: white;"> <img src="image/icon-cart.png" alt=""> Giỏ hàng (<span class="so-don-hang"><?php echo $i  ?>
                                         </span>)</a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- header END -->

                 <div class="container-fluid menu-area">
                     <!-- Main Menu -->
                     <nav class="navbar navbar-expand-lg">
                         <div class="navbar-collapse">
                             <div class="nav-inner">
                                 <ul class="nav main-menu menu navbar-nav">
                                     <li class="item active"><a href="<?php echo BASE_URL ?>">Trang chủ</a></li>
                                     <li class="item"><a href="<?php echo BASE_URL ?>index/gioithieu">Giới thiệu</a></li>
                                     <li class="item">
                                         <a href="<?php echo BASE_URL ?>sanphamController/tatca">Sản phẩm<i class="fa fa-angle-down" aria-hidden="true"></i><!-- <span class="new">New</span> -->
                                         </a>
                                         <ul class="dropdown">
                                             <?php foreach ($danhmucsanpham as $key => $value) { ?>
                                                 <li class="">
                                                     <a class="" href="<?php echo BASE_URL ?>sanphamController/danhmuc/<?php echo $value['id_category_product'] ?>"><?php echo $value['title_category_product'] ?>
                                                     </a>
                                                 </li>
                                             <?php } ?>

                                         </ul>
                                     </li>

                                     <li class="item"><a href="<?php echo BASE_URL ?>tintucController/tatca">Tin tức</a></li>
                                     <li class="item"><a href="<?php echo BASE_URL ?>index/lienhe">Liên hệ</a></li>

                                 </ul>

                                 <div class="search-box">

                                     <div class="input-group" style="justify-content: flex-end;">
                                         <div class="form-outline">
                                             <input type="search" id="tukhoa" placeholder="Nhập từ cần tìm..." class="form-control" autocomplete="off" />
                                             <!-- <label class="form-label" for="form1">Search</label> -->
                                         </div>
                                         <button type="button" class="btn btn-primary nuttimkiem" style="height: 47px;">
                                             <i class="fa fa-search"></i>
                                         </button>
                                     </div>

                                     <div class="result">
                                         <ul class="timkiem1" id="kqtimkiem">

                                         </ul>
                                     </div>
                                 </div>

                                 </style>
                             </div>
                         </div>
                     </nav>
                     <!--/ End Main Menu -->
                 </div>