<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhạc cụ Dương Đông - Thanh toán đơn hàng</title>

    <link rel="shortcut icon" href="//bizweb.dktcdn.net/assets/sapo_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/checkout.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/checkout/css.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/checkout/checkout.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/checkout/checkout.vendor.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/font-awesome-4.7.0/css/font-awesome.css" />
    <style>
        .glot-sub-active {
            color: #1296ba !important;
        }

        .glot-sub-hovered {
            color: #1296ba !important;
        }

        .glot-sub-clzz {
            cursor: pointer;

            line-height: 1.2;
            font-size: 28px;
            color: #FFCC00;
            background: rgba(17, 17, 17, 0.7);

        }

        .glot-sub-clzz:hover {
            color: #1296ba !important;
        }

        .ej-trans-sub {
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999999;
            cursor: move;
        }

        .ej-trans-sub>span {
            color: #3CF9ED;
            font-size: 18px;
            text-align: center;
            padding: 0 16px;
            line-height: 1.5;
            background: rgba(32, 26, 25, 0.8);
            text-shadow: 0px 1px 4px black;
            padding: 0 8px;

            line-height: 1.2;
            font-size: 16px;
            color: #0CB1C7;
            background: rgba(67, 65, 65, 0.7);

        }

        .ej-main-sub {
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999999;
            cursor: move;
            padding: 0 8px;
        }

        .ej-main-sub>span {
            color: white;
            font-size: 20px;
            line-height: 1.5;
            text-align: center;
            background: rgba(32, 26, 25, 0.8);
            text-shadow: 0px 1px 4px black;
            padding: 2px 8px;

            line-height: 1.2;
            font-size: 28px;
            color: #FFCC00;
            background: rgba(17, 17, 17, 0.7);

        }

        .ej-main-sub .glot-sub-clzz {
            background: transparent !important
        }

        .tran-subtitle>.view-icon-edit-sub {
            cursor: pointer;
            padding-left: 10px;
            top: 2px;
            position: relative;
        }

        .tran-subtitle>.view-icon-edit-sub>svg {
            width: 16px;
            height: 16px;
            pointer-events: none;

        }

        i.fa.fa-user-circle {
            font-size: 20px;
        }
    </style>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
</head>

<body>

    <div class="content">
        <?php if (isset($_SESSION["shopping_cart"])) { ?>

            <?php
            foreach ($_SESSION["info"] as $key => $value1) {
                $name1 = $value1['name_KH'];
                $email1 = $value1['email_KH'];
                $diachi1 = $value1['diachi_KH'];
                $code1 = $value1['code_don'];
            }
            ?>

            <input type="hidden" name=" ">
            <div class="wrap">

                <main class="main">
                    <header class="main__header">
                        <div class="logo logo--left ">

                            <h1 class="shop__name">
                                <a href="#">
                                    Dương Đông
                                </a>
                            </h1>

                        </div>
                    </header>
                    <div class="main__content">
                        <article class="row">
                            <div class="col col--primary">
                                <section class="section section--icon-heading">
                                    <div class="section__icon unprintable">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                                <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="thankyou-message-container">
                                        <h2 class="section__title">Cảm ơn bạn đã đặt hàng
                                        </h2>

                                        <p class="section__text">
                                            Một email xác nhận đã được gửi tới <?php echo $email1  ?>
                                            . <br>
                                            Xin vui lòng kiểm tra email của bạn
                                        </p>


                                    </div>
                                </section>
                            </div>
                            <div class="col col--secondary">
                                <aside class="order-summary order-summary--bordered order-summary--is-collapsed" id="order-summary">
                                    <div class="order-summary__header">
                                        <?php
                                        $i = 0;
                                        $soluong = 0;
                                        foreach ($_SESSION["shopping_cart"] as $key => $value) {
                                            $i++;
                                            $soluong += $value['product_quantity'];
                                        }
                                        ?>
                                        <div class="order-summary__title">
                                            Đơn hàng #<?php echo $code1  ?>

                                            <span class="unprintable">(<?php echo $soluong  ?>
                                                )</span>
                                        </div>
                                        <div class="order-summary__action hide-on-desktop unprintable">
                                            <a data-toggle="#order-summary" data-toggle-class="order-summary--is-collapsed" class="expandable">
                                                Xem chi tiết
                                            </a>
                                        </div>
                                    </div>
                                    <div class="order-summary__sections">
                                        <div class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                            <table class="product-table">
                                                <tbody>
                                                    <?php
                                                    $total = 0;
                                                    $soluong = 0;
                                                    $i = 0;
                                                    foreach ($_SESSION["shopping_cart"] as $key => $value) {
                                                        $subtotal = $value['product_price'] * $value['product_quantity'];
                                                        $total += $subtotal;
                                                        $soluong += $value['product_quantity'];
                                                        $i++;
                                                    ?>
                                                        <tr class="product">
                                                            <td class="product__image">
                                                                <div class="product-thumbnail">
                                                                    <div class="product-thumbnail__wrapper">

                                                                        <img src="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['product_image'] ?>" alt="<?php echo $value['product_title']  ?>" class="product-thumbnail__image">

                                                                    </div>
                                                                    <span class="product-thumbnail__quantity unprintable"><?php echo $value['product_quantity'] ?></span>
                                                                </div>
                                                            </td>
                                                            <th class="product__description">
                                                                <span class="product__description__name"> <?php echo $value['product_title']  ?></span>


                                                            </th>
                                                            <td class="product__quantity printable-only">
                                                                x 2
                                                            </td>
                                                            <td class="product__price">


                                                                <?php echo number_format($value['product_price'], 0, ',', '.') . '₫'  ?>

                                                            </td>
                                                        </tr>
                                                    <?php }  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-summary__section">
                                            <table class="total-line-table">
                                                <tbody class="total-line-table__tbody">


                                                    <tr class="total-line total-line--subtotal">
                                                        <th class="total-line__name">Tạm tính</th>
                                                        <td class="total-line__price"><?php echo number_format($total, 0, ',', '.') . '₫'  ?></td>
                                                    </tr>

                                                    <tr class="total-line total-line--shipping-fee">
                                                        <th class="total-line__name">Phí vận chuyển</th>
                                                        <td class="total-line__price">

                                                            40.000₫

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-summary__section">
                                            <table class="total-line-table">
                                                <tbody class="total-line-table__tbody">
                                                    <tr class="total-line payment-due">
                                                        <th class="total-line__name">
                                                            <span class="payment-due__label-total">Tổng cộng</span>
                                                        </th>
                                                        <td class="total-line__price">
                                                            <span class="payment-due__price"><?php echo number_format($total + 40000, 0, ',', '.') . '₫'  ?></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <div class="col col--primary">
                                <section class="section">
                                    <div class="section__content section__content--bordered">

                                        <div class="row">

                                            <div class="col col--md-two">
                                                <h2>Thông tin mua hàng</h2>
                                                <p><?php echo $name1  ?></p>

                                                <p><?php echo $email1  ?>
                                                </p>


                                                <p></p>

                                            </div>

                                            <div class="col col--md-two">
                                                <h2>Địa chỉ nhận hàng</h2>
                                                <!-- <p> </p> -->

                                                <p></p>


                                                <p><?php echo $diachi1  ?></p>


                                                <p></p>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col--md-two">
                                                <h2>Phương thức thanh toán</h2>
                                                <p>Thanh toán khi giao hàng (COD)</p>
                                            </div>
                                            <div class="col col--md-two">
                                                <h2>Phương thức vận chuyển</h2>
                                                <p>Giao hàng tận nơi</p>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                                <section class="section unprintable">
                                    <form action="<?php echo BASE_URL ?>giohangController/unset_donhang" method="POST">
                                        <div class="field__input-btn-wrapper field__input-btn-wrapper--floating">
                                            <button type="submit" class="btn btn--large" name="back">Tiếp tục mua hàng</button>
                                            <!-- <a href="/" class="btn btn--large">Tiếp tục mua hàng</a> -->
                                            <span class="text-icon-group text-icon-group--large icon-print" onclick="window.print()">
                                                <i class="fa fa-print"></i>
                                                <span>In </span>
                                            </span>
                                        </div>
                                    </form>

                                </section>
                            </div>
                        </article>
                    </div>
                </main>

            </div>

        <?php }  ?>

    </div>

    <script src="<?php echo BASE_URL ?>public/css/checkout/checkout.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/css/checkout/checkout.vendor.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/css/checkout/stats.min.js"></script>

</body>

</html>