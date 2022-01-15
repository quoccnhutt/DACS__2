<section class="bread_crumb">
   <div class="container">
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
         <div class="col-12">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#" style="color: #adadad">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page" style="color: #000"><span>Liên hệ</span></li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</section>

<!--  -->
<div class="container contact">
   <div class="row">
      <div class="col-lg-8 col-md-7">
         <div class="page-login">
            <div class="login">
               <h1 class="title-head">
                  <a href="#">Liên hệ</a>
               </h1>
               <span>Bạn hãy điền nội dung tin nhắn vào form dưới đây và gửi cho chúng tôi. Chúng tôi sẽ trả lời bạn sau khi nhận được.</span>
               <form action="<?php echo BASE_URL ?>index/guilienhe" id="contact" method="post">
                  <input type="hidden" value="contact" name="FormType">
                  <div class="form-signup clearfix">
                     <fieldset class="form-group">
                        <label>Tên: </label>
                        <input type="text" name="ten" id="name" class="form-control  form-control-lg" required>
                     </fieldset>

                     <fieldset class="form-group">
                        <label>Email: </label>
                        <input type="email" name="email" id="email" class="form-control  form-control-lg" required>
                     </fieldset>
                     <fieldset class="form-group">
                        <label>Nội dung: </label>
                        <textarea name="noidung" id="comment" class="form-control form-control-lg" rows="5" required></textarea>
                     </fieldset>

                     <div class="pull-xs-left" style="margin-top:20px;">
                        <button tyle="summit" class="btn btn-lg btn-style btn-style-active btn-dark">Gửi tin nhắn</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>


      <div class="col-lg-4 col-md-5">
         <div class="widget-item info-contact">
            <div class="logo text-xs-left">
               <a href="#" class="logo-wrapper">
                  <img src="image/logo.png" alt="">
               </a>
            </div>
            <div class="clearfix"></div>
            <p></p>
            <ul class="widget-menu">
               <li><i class="fa fa-map-marker color-x" aria-hidden="true"></i>
                  <p>
                     Trần Đại Nghĩa, phường Hoà Quý, quận Ngũ Hành Sơn, TP Đà Nẵng.
                  </p>
               </li>
               <li>
                  <i class="fa fa-phone color-x" aria-hidden="true"></i>
                  <p><a href="tel: 0357970571 "> 0357970571 </a></p>
               </li>
               <li>
                  <i class="fa fa-envelope-o" aria-hidden="true" style="color: #000"></i>
                  <p><a href="mailto: quocnhutn6702@gmail.com "> quocnhutn6702@gmail.com </a></p>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>

<!-- map -->
<div class="box-map">
   <div class="">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30684.66955899421!2d108.24843786861541!3d15.983102309197088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1634179235385!5m2!1svi!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
   </div>
</div>
<!---End bg_in----->
<!--end:body-->
<div class="clear"></div>


<!-- bread Crump -->