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
                        <li class="breadcrumb-item active" aria-current="page" style="color: #000"><span> Đăng nhập tài khoản</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>




<div class="container">
    <h1 class="title-head"><span>Đăng nhập tài khoản</span></h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="page-login margin-bottom-30">
                <div id="login">
                    <span>
                        Nếu bạn đã có tài khoản, đăng nhập tại đây.
                    </span>
                    <form accept-charset="utf-8" action="<?php echo BASE_URL ?>user/check_login" id="customer_login" method="post">
                        <input name="FormType" type="hidden" value="customer_login">
                        <input name="utf8" type="hidden" value="true">
                        <div class="form-signup">

                        </div>
                        <div class="form-signup clearfix">
                            <fieldset class="form-group">
                                <label>Email: </label>
                                <input type="email" class="form-control form-control-lg" value="" name="username" id="customer_email" placeholder="Email" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Mật khẩu: </label>
                                <input type="password" class="form-control form-control-lg" value="" name="password" id="customer_password" placeholder="Mật khẩu" required>
                            </fieldset>



                            <div class="pull-xs-left" style="margin-top: 25px;">
                                <input class="btn btn-lg btn-style btn-dark" type="submit" value="Đăng nhập">
                                <a href="<?php echo BASE_URL ?>user/dangky" class="btn-link-style btn-register" style="margin-left: 20px;text-decoration: underline; ">Đăng ký</a>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div id="recover-password" class="form-signup">
                <span>
                    Bạn quên mật khẩu? Nhập địa chỉ email để lấy lại mật khẩu qua email.
                </span>
                <form accept-charset="utf-8" action="" id="recover_customer_password" method="post">
                    <input name="FormType" type="hidden" value="recover_customer_password">
                    <input name="utf8" type="hidden" value="true">
                    <div class="form-signup aaaaaaaa">

                    </div>
                    <div class="form-signup clearfix">
                        <fieldset class="form-group">
                            <label>Email: </label>
                            <input type="email" class="form-control form-control-lg" value="" name="Email" id="recover-email" placeholder="Email">
                        </fieldset>
                    </div>
                    <div class="action_bottom">
                        <input class="btn btn-lg btn-style btn-dark" style="margin-top: 25px;" type="submit" value="Lấy lại mật khẩu">

                    </div>
                </form>
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