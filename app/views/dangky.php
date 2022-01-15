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



<!-- bread Crump -->
<section class="bread_crumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" style="color: #adadad">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color: #000"><span> Đăng ký tài khoản</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>




<div class="container">
    <h1 class="title-head"><span>Đăng ký tài khoản</span></h1>
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="page-login margin-bottom-30">
                <div id="login">
                    <span>
                        Nếu chưa có tài khoản vui lòng đăng ký tại đây.
                    </span>
                    <form accept-charset="utf-8" action="<?php echo BASE_URL ?>user/insert_dangky" id="customer_login" method="post">
                        <input name="FormType" type="hidden" value="customer_login">
                        <input name="utf8" type="hidden" value="true">
                        <div class="form-signup">

                        </div>
                        <div class="form-signup clearfix">
                            <div class="row">

                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>Tên: </label>
                                        <input type="text" class="form-control form-control-lg" value="" name="name" id="firstName" placeholder="" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>Email: </label>
                                        <input type="email" class="form-control form-control-lg" value="" name="email" id="email" placeholder="" required>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">

                                    <fieldset class="form-group">
                                        <label>Mật khẩu: </label>
                                        <input type="password" class="form-control form-control-lg" value="" name="password" id="password" placeholder="" required>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>Số điện thoại: </label>
                                        <input type="text" class="form-control form-control-lg" value="" name="sdt" id="lastName" placeholder="" required>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>Địa chỉ: </label>
                                        <input type="text" class="form-control form-control-lg" value="" name="diachi" id="lastName" placeholder="" required>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="pull-xs-left" style="margin-top: 25px;">
                                <input class="btn btn-lg btn-style btn-dark" type="submit" value="Đăng ký"><span style="padding-left: 10px">Nếu bạn đã có tài khoản thì</span>
                                <a href="<?php echo BASE_URL ?>user/dangnhap" class="btn-link-style btn-register" style="margin-left: 10px;text-decoration: underline; ">Đăng nhập tại đây</a>
                            </div>

                        </div>
                </div>
                </form>
            </div>


        </div>
    </div>

</div>
<div class="container">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-12 mxh">
            <h3><b>Đăng nhập bằng Facebook hoặc Google</b></h3>
            <div style="display: inline-block;margin-right: 15px;"><a href="javascript:void(0)" class="social-login--facebook" onclick="loginFacebook()"><img width="129px" height="37px" alt="facebook-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a> </div>
            <div style="display: inline-block"><a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img width="129px" height="37px" alt="google-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a></div>
        </div>
    </div>
</div>

<script>
    function loginFacebook() {
        var a = {
                client_id: "947410958642584",
                redirect_uri: "https://store.mysapo.net/account/facebook_account_callback",
                state: JSON.stringify({
                    redirect_url: window.location.href
                }),
                scope: "email",
                response_type: "code"
            },
            b = "https://www.facebook.com/v3.2/dialog/oauth" + encodeURIParams(a, !0);
        window.location.href = b
    }

    function loginGoogle() {
        var a = {
                client_id: "997675985899-pu3vhvc2rngfcuqgh5ddgt7mpibgrasr.apps.googleusercontent.com",
                redirect_uri: "https://store.mysapo.net/account/google_account_callback",
                scope: "email profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile",
                access_type: "online",
                state: JSON.stringify({
                    redirect_url: window.location.href
                }),
                response_type: "code"
            },
            b = "https://accounts.google.com/o/oauth2/v2/auth" + encodeURIParams(a, !0);
        window.location.href = b
    }

    function encodeURIParams(a, b) {
        var c = [];
        for (var d in a)
            if (a.hasOwnProperty(d)) {
                var e = a[d];
                null != e && c.push(encodeURIComponent(d) + "=" + encodeURIComponent(e))
            } return 0 == c.length ? "" : (b ? "?" : "") + c.join("&")
    }
</script>
</div>