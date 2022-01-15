<?php
spl_autoload_register(function ($class) {
	include_once('system/libs/' . $class . '.php');
});
include_once('app/config/config.php');

include_once('public/PHPMailer-master/src/PHPMailer.php');
include_once('public/PHPMailer-master/src/SMTP.php');
include_once('public/PHPMailer-master/src/Exception.php');
// include BASE_URL . "public/PHPMailer-master/src/PHPMailer.php";
// include BASE_URL . "public/PHPMailer-master/src/SMTP.php";
// include BASE_URL . "public/PHPMailer-master/src/Exception.php";
$main = new Main();

?>
</body>

</html>