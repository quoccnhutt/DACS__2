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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(".city").change(function() {
                var txt = $(".city").val();

                $.post('<?php echo BASE_URL ?>ajax/address', {
                    txt: txt
                }, function(data) {
                    $(".huyen").html(data);
                });
            });
        });
    </script>

</head>

<body>
    <div class="content">
        <?php if (isset($_SESSION["shopping_cart"])) { ?>
            <form action="<?php echo BASE_URL ?>giohangController/dathang" method="POST">

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
                            <article class="animate-floating-labels row">
                                <div class="col col--two">
                                    <section class="section">
                                        <div class="section__header">
                                            <div class="layout-flex">
                                                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                    <i class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop"></i>
                                                    Thông tin nhận hàng
                                                </h2>
                                                <a href="<?php echo BASE_URL ?>user/dangnhap">
                                                    <i class="fa fa-user-circle"></i>
                                                    <span>Đăng nhập </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="section__content">
                                            <div class="fieldset">
                                                <div class="field " data-bind-class="{'field--show-floating-label': email}">
                                                    <div class="field__input-wrapper">
                                                        <label for="email" class="field__label">
                                                            Email
                                                        </label>
                                                        <input name="email" id="email" type="email" class="field__input" data-bind="email" value="" require>
                                                    </div>
                                                </div>



                                                <div class="field " data-bind-class="{'field--show-floating-label': billing.name}">
                                                    <div class="field__input-wrapper">
                                                        <label for="billingName" class="field__label">Họ và tên</label>
                                                        <input name="name" id="billingName" type="text" class="field__input" data-bind="billing.name" value="" require>
                                                    </div>

                                                </div>

                                                <div class="field " data-bind-class="{'field--show-floating-label': billing.phone}">
                                                    <div class="field__input-wrapper">
                                                        <label for="billingPhone" class="field__label">
                                                            Số điện thoại (tùy chọn)
                                                        </label>
                                                        <input name="sodienthoai" require id="billingPhone" type="tel" class="field__input" data-bind="billing.phone" value="">
                                                    </div>

                                                </div>


                                                <div class="field " data-bind-class="{'field--show-floating-label': billing.address}">
                                                    <div class="field__input-wrapper">
                                                        <label for="billingAddress" class="field__label">
                                                            Địa chỉ (Tổ, thôn, xã)
                                                        </label>
                                                        <input name="diachi" id="billingAddress" type="text" class="field__input" data-bind="billing.address" value="">
                                                    </div>

                                                </div>


                                                <div class="field field--show-floating-label ">
                                                    <div class="field__input-wrapper field__input-wrapper--select2">
                                                        <label for="billingProvince" class="field__label">Tỉnh, thành phố</label>
                                                        <select name="tinhthanhpho" id="" class="form-control city">
                                                            <option value="">Thành phố</option>
                                                            <?php foreach ($tinh as $key => $value) { ?>
                                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['_name'] ?></option>
                                                            <?php }  ?>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="field field--show-floating-label ">
                                                    <div class="field__input-wrapper field__input-wrapper--select2">
                                                        <label for="billingDistrict" class="field__label">
                                                            Quận huyện (tùy chọn)
                                                        </label>
                                                        <select name="quanhuyen" id="" class="form-control huyen">
                                                            <option value="">Huyện</option>
                                                        </select>
                                                    </div>

                                                </div>




                                            </div>
                                        </div>
                                    </section>

                                    <div class="fieldset">
                                        <h3 class="visually-hidden">Ghi chú</h3>
                                        <div class="field " data-bind-class="{'field--show-floating-label': note}">
                                            <div class="field__input-wrapper">
                                                <label for="note" class="field__label">
                                                    Ghi chú (tùy chọn)
                                                </label>
                                                <textarea name="noidung" id="note" type="text" class="field__input" data-bind="note"></textarea>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col col--two">

                                    <section class="section">
                                        <div class="section__header">
                                            <div class="layout-flex">
                                                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                    <i class="fa fa-truck fa-lg section__title--icon hide-on-desktop"></i>
                                                    Vận chuyển
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="section__content" data-tg-refresh="refreshShipping" id="shippingMethodList" data-define="{isAddressSelecting: true, shippingMethods: []}">
                                            <div class="alert alert--loader spinner spinner--active hide" data-bind-show="isLoadingShippingMethod">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                    <use href="#spinner"></use>
                                                </svg>
                                            </div>


                                            <div class="alert alert-retry alert--danger hide" data-bind-event-click="handleShippingMethodErrorRetry()" data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; isLoadingShippingError">
                                                <span data-bind="loadingShippingErrorMessage">Không thể load phí vận chuyển. Vui lòng thử lại</span> <i class="fa fa-refresh"></i>
                                            </div>


                                            <div class="alert alert--info" data-bind-show="!isLoadingShippingMethod &amp;&amp; isAddressSelecting">
                                                Vui lòng nhập thông tin giao hàng
                                            </div>
                                        </div>
                                    </section>

                                    <section class="section">
                                        <div class="section__header">
                                            <div class="layout-flex">
                                                <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                    <i class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i>
                                                    Thanh toán
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="section__content">

                                            <div class="content-box" data-define="{paymentMethod: undefined}">





                                                <div class="content-box__row">
                                                    <div class="radio-wrapper">
                                                        <div class="radio__input">
                                                            <input name="paymentMethod" id="paymentMethod-190790" type="radio" class="input-radio" data-bind="paymentMethod" value="190790">
                                                        </div>
                                                        <label for="paymentMethod-190790" class="radio__label">
                                                            <span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
                                                            <span class="radio__label__accessory">
                                                                <span class="radio__label__icon">
                                                                    <i class="fa fa-money" style="font-size: 20px;"></i>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>

                                                    <div class="content-box__row__desc hide" data-bind-show="paymentMethod == 190790">
                                                        <p>cod</p>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </article>
                            <div class="field__input-btn-wrapper field__input-btn-wrapper--vertical hide-on-desktop">
                                <button type="submit" class="btn btn-checkout spinner" name="dat_hang
                            ">
                                    <span class="spinner-label">ĐẶT HÀNG</span>

                                </button>

                                <a href="<?php echo BASE_URL ?>giohangController" class="previous-link">
                                    <i class="previous-link__arrow">❮</i>
                                    <span class="previous-link__content">Quay về giỏ hàng</span>
                                </a>

                            </div>

                            <div id="common-alert" data-tg-refresh="refreshError">


                                <div class="alert alert--danger hide-on-desktop hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại</div>
                            </div>
                        </div>
                    </main>
                    <aside class="sidebar">
                        <div class="sidebar__header">
                            <h2 class="sidebar__title">
                                <?php

                                $i = 0;
                                foreach ($_SESSION["shopping_cart"] as $key => $value) {
                                    $i++;
                                }
                                ?>
                                Đơn hàng (<?php echo $i ?> sản phẩm)
                            </h2>
                        </div>
                        <div class="sidebar__content">
                            <div id="order-summary" class="order-summary order-summary--is-collapsed">
                                <div class="order-summary__sections">
                                    <div class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                        <table class="product-table">
                                            <caption class="visually-hidden">Chi tiết đơn hàng</caption>
                                            <thead class="product-table__header">
                                                <tr>
                                                    <th>
                                                        <span class="visually-hidden">Ảnh sản phẩm</span>
                                                    </th>
                                                    <th>
                                                        <span class="visually-hidden">Mô tả</span>
                                                    </th>
                                                    <th>
                                                        <span class="visually-hidden">Sổ lượng</span>
                                                    </th>
                                                    <th>
                                                        <span class="visually-hidden">Đơn giá</span>
                                                    </th>
                                                </tr>
                                            </thead>
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
                                                                <div class="product-thumbnail__wrapper" data-tg-static="">

                                                                    <img src="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['product_image'] ?>" alt="<?php echo $value['product_title']  ?>" class="product-thumbnail__image">

                                                                </div>
                                                                <span class="product-thumbnail__quantity">
                                                                    <?php echo $value['product_quantity'] ?>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <th class="product__description">
                                                            <span class="product__description__name">

                                                                <?php echo $value['product_title']  ?>
                                                            </span>


                                                        </th>
                                                        <td class="product__quantity visually-hidden"><em>Số lượng:</em> <?php echo $value['product_quantity'] ?></td>
                                                        <td class="product__price">

                                                            <?php echo number_format($value['product_price'], 0, ',', '.') . '₫'  ?>

                                                        </td>
                                                    </tr>
                                                <?php }  ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="order-summary__section order-summary__section--discount-code" data-tg-refresh="refreshDiscount" id="discountCode">
                                        <h3 class="visually-hidden">Mã khuyến mại</h3>
                                        <div class="edit_checkout animate-floating-labels">
                                            <div class="fieldset">
                                                <div class="field  ">
                                                    <div class="field__input-btn-wrapper">
                                                        <div class="field__input-wrapper">
                                                            <label for="reductionCode" class="field__label">Nhập mã giảm giá</label>
                                                            <input name="reductionCode" id="reductionCode" type="text" class="field__input" autocomplete="off">
                                                        </div>
                                                        <button class="field__input-btn btn spinner btn--disabled" type="button" disabled="">
                                                            <span class="spinner-label">Áp dụng</span>
                                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                                <use href="#spinner"></use>
                                                            </svg> -->
                                                        </button>
                                                    </div>

                                                    <p class="field__message field__message--error field__message--error-always-show hide">Có lỗi xảy ra khi áp dụng khuyến mãi. Vui lòng thử lại</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-summary__section order-summary__section--total-lines order-summary--collapse-element" id="orderSummary">
                                        <table class="total-line-table">
                                            <caption class="visually-hidden">Tổng giá trị</caption>
                                            <thead>
                                                <tr>
                                                    <td><span class="visually-hidden">Mô tả</span></td>
                                                    <td><span class="visually-hidden">Giá tiền</span></td>
                                                </tr>
                                            </thead>
                                            <tbody class="total-line-table__tbody">
                                                <tr class="total-line total-line--subtotal">
                                                    <th class="total-line__name">
                                                        Tạm tính
                                                    </th>
                                                    <td class="total-line__price"><?php echo number_format($total, 0, ',', '.') . '₫'  ?></td>
                                                </tr>

                                                <tr class="total-line total-line--shipping-fee">
                                                    <th class="total-line__name">
                                                        Phí vận chuyển
                                                    </th>
                                                    <td class="total-line__price">40.000₫</td>
                                                </tr>

                                            </tbody>
                                            <tfoot class="total-line-table__footer">
                                                <tr class="total-line payment-due">
                                                    <th class="total-line__name">
                                                        <span class="payment-due__label-total">
                                                            Tổng cộng
                                                        </span>
                                                    </th>
                                                    <td class="total-line__price">
                                                        <span class="payment-due__price"><?php echo number_format($total + 40000, 0, ',', '.') . '₫'  ?></span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="order-summary__nav field__input-btn-wrapper hide-on-mobile layout-flex--row-reverse">
                                        <button type="submit" class="btn btn-checkout spinner" name="dat_hang">
                                            <span class="spinner-label">ĐẶT HÀNG</span>
                                        </button>
                                        <a href="<?php echo BASE_URL ?>giohangController" class="previous-link">
                                            <i class="previous-link__arrow">❮</i>
                                            <span class="previous-link__content">Quay về giỏ hàng</span>
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </aside>
                </div>


            </form>
        <?php }  ?>

    </div>
























    <script src="<?php echo BASE_URL ?>public/css/checkout/checkout.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/css/checkout/checkout.vendor.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/css/checkout/stats.min.js"></script>





</body>

</html>