<!-- bread Crump -->
<section class="bread_crumb">
   <div class="container">
      <div class="row">
         <div class="col-12 col-md-6 ">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" style="color: #adadad">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page" style="color: #000"><span>Giỏ hàng</span></li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</section>

<section class="main-cart-page main-container col1-layout">
   <div class="main container hidden-xs">
      <div class="col-main cart_desktop_page cart-page">
         <div class="cart page_cart hidden-xs-down">
            <?php if (isset($_SESSION["shopping_cart"])) { ?>
               <form action="<?php echo BASE_URL ?>giohangController/updategiohang" method="POST">
                  <div class="bg-scroll">
                     <div class="cart-thead">
                        <div style="width: 17%">Ảnh sản phẩm</div>
                        <div style="width: 33%"><span class="nobr">Tên sản phẩm</span></div>
                        <div style="width: 15%" class="a-center"><span class="nobr">Đơn giá</span></div>
                        <div style="width: 14%" class="a-center">Số lượng</div>
                        <div style="width: 15%" class="a-center">Thành tiền</div>
                        <div style="width: 6%">Xoá</div>
                     </div>
                     <div class="cart-tbody">


                        <?php
                        $total = 0;
                        $i = 0;
                        foreach ($_SESSION["shopping_cart"] as $key => $value) {
                           $subtotal = $value['product_price'] * $value['product_quantity'];
                           $total += $subtotal;
                           $i++;
                        ?>
                           <div class="item-cart productid-12608369">
                              <div style="width: 17%" class="image">
                                 <a class="product-image" title="<?php echo $value['product_title']  ?>" href="/dan-organ-yamaha-psr-e353">
                                    <img width="75" height="auto" alt="<?php echo $value['product_title']  ?>" src="<?php echo BASE_URL ?>public/uploads/imgproduct/<?php echo $value['product_image'] ?>">
                                 </a>
                              </div>
                              <div style="width: 33%" class="a-center">
                                 <h2 class="product-name">
                                    <a href="/dan-organ-yamaha-psr-e353">
                                       <?php echo $value['product_title']  ?>
                                    </a>
                                 </h2>
                                 <span class="variant-title" style="display: none;">
                                    <?php echo $value['product_title']  ?>
                                 </span>
                              </div>
                              <div style="width: 15%" class="a-center">
                                 <span class="item-price">
                                    <span class="price">
                                       <?php echo number_format($value['product_price'], 0, ',', '.') . ' ₫'  ?>
                                    </span>
                                 </span>
                              </div>
                              <div style="width: 14%" class="a-center">
                                 <div class="input_qty_pr">
                                    <input class="variantID" type="hidden" name="variantId" value="12608369">
                                    <button onclick="var result = document.getElementById('qtyItem<?php echo $value['product_id'] ?>'); var qtyItem12608369 = result.value; if( !isNaN( qtyItem12608369 ) && qtyItem12608369 > 1 ) result.value--;return false;" class="reduced_pop items-count btn-minus" type="submit" value="<?php echo $value['product_id'] ?>">–</button>

                                    <input type="text" maxlength="12" min="0" class="input-text number-sidebar input_pop input_pop qtyItem12608369" id="qtyItem<?php echo $value['product_id'] ?>" name="qty[<?php echo $value['product_id'] ?>]" size="4" value="<?php echo $value['product_quantity']  ?>">

                                    <button onclick="var result = document.getElementById('qtyItem<?php echo $value['product_id'] ?>'); var qtyItem12608369 = result.value; if( !isNaN( qtyItem12608369 )) result.value++;return false;" class="increase_pop items-count btn-plus" type="submit" value="<?php echo $value['product_id'] ?>">

                                       +</button>

                                 </div>
                              </div>
                              <div style="width: 15%" class="a-center">
                                 <span class="cart-price"> <span class="price">
                                       <?php echo number_format($subtotal, 0, ',', '.') . ' ₫'  ?>
                                    </span>
                                 </span>
                              </div>
                              <div style="width: 6%">
                                 <button type="submit" value="<?php echo $value['product_id'] ?>" name="delete_cart">
                                    <!-- <a class="button remove-item remove-item-cart" title="Xóa"> -->
                                    <span><span>Xóa</span></span>
                                    <!-- </a> -->
                                 </button>

                              </div>
                           </div>
                        <?php
                        }
                        ?>


                     </div>
                  </div>

                  <div class="container cart-collaterals cart_submit row" style="justify-content: end;">
                     <div class="totals col-sm-7 col-xs-12 col-md-offset-7">
                        <div class="totals">
                           <div class="inner">
                              <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                                 <colgroup>
                                    <col>
                                    <col>
                                 </colgroup>
                                 <tfoot>
                                    <tr>
                                       <td colspan="1" class="a-left"><strong>Tổng tiền</strong></td>
                                       <td class="a-right"><strong><span class="totals_price price"><?php echo number_format($total, 0, ',', '.') . ' ₫'  ?></span></strong></td>
                                    </tr>
                                 </tfoot>
                              </table>
                              <ul class="checkout">
                                 <li class="nutcheckout">
                                    <button class="button btn-proceed-checkout" title="Tiến hành đặt hàng" type="submit" name="update_cart"><span>Tiến hành đặt hàng</span>
                                    </button>
                                    <a href="<?php echo BASE_URL ?>">Quay lại cửa hàng</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            <?php } else { ?>

               <div class="bg-scroll">
                  <div class="cart-thead">
                     <div style="width: 17%">Ảnh sản phẩm</div>
                     <div style="width: 33%"><span class="nobr">Tên sản phẩm</span></div>
                     <div style="width: 15%" class="a-center"><span class="nobr">Đơn giá</span></div>
                     <div style="width: 14%" class="a-center">Số lượng</div>
                     <div style="width: 15%" class="a-center">Thành tiền</div>
                     <div style="width: 6%">Xoá</div>
                  </div>
                  <div class="cart-tbody">
                  </div>
               </div>

               <div class="container cart-collaterals cart_submit row" style="justify-content: end;">
                  <div class="totals col-sm-7 col-xs-12 col-md-offset-7">
                     <div class="totals">
                        <div class="inner">
                           <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                              <colgroup>
                                 <col>
                                 <col>
                              </colgroup>
                              <tfoot>
                                 <tr>
                                    <td colspan="1" class="a-left"><strong>Tổng tiền</strong></td>
                                    <td class="a-right"><strong><span class="totals_price price">0 VNĐ</span></strong></td>
                                 </tr>
                              </tfoot>
                           </table>
                           <ul class="checkout">
                              <li class="row nutcheckout">
                                 <button class="button btn-proceed-checkout col-12  col-lg-6" title="Tiến hành đặt hàng" type="submit" name="update_cart"><span>Tiến hành đặt hàng</span>
                                 </button>
                                 <a href="<?php echo BASE_URL ?>" class="col-12  col-lg-6">Quay lại cửa hàng</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>

            <?php }  ?>

         </div>
      </div>
   </div>

</section>
<div class="clearfix"></div>