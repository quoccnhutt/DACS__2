<?php

class giohangController extends DController
{

	public function __construct()
	{
		$data = array();
		$item = array();
		parent::__construct();
	}

	public function index()
	{
		$this->giohang();
	}

	public function giohang()
	{
		session::init();

		$table2 = 'tbl_category_post';
		$table = 'tbl_category_product';

		$categoryModel = $this->load->model('categoryModel');


		$data['danhmucsanpham'] = $categoryModel->list_category_home($table);
		$data['danhmucbaiviet'] = $categoryModel->list_category_post($table2);


		$this->load->view('header', $data);
		$this->load->view('giohang');
		$this->load->view('footer');
	}
	public function dathang()
	{
		session::init();
		$table_order = 'tbl_order';
		$table_order_details = 'tbl_order_details';

		$ordermodel = $this->load->model('orderModel');

		if (isset($_POST['dat_hang'])) {
			$name = $_POST['name'];
			$sodienthoai = $_POST['sodienthoai'];
			$email = $_POST['email'];
			$noidung = $_POST['noidung'];
			$xathanh = $_POST['diachi'];

			$id_tinhthanh = $_POST['tinhthanhpho'];
			$id_quanhuyen = $_POST['quanhuyen'];

			$addressModel = $this->load->model('addressModel');
			$data['huyen'] = $addressModel->ten_huyen($id_quanhuyen);
			$data['tinh'] = $addressModel->ten_tinh($id_tinhthanh);

			foreach ($data['huyen'] as $key => $value) {
				$quanhuyen = $value['_name'];
			}
			foreach ($data['tinh'] as $key => $value) {
				$tinhthanh = $value['_name'];
			}
			$order_code = rand(0, 9999);

			date_default_timezone_set('asia/ho_chi_minh');
			$date = date("d/m/y");
			$hour = date("h:i:sa");
			$order_date = $date . $hour;
			$diachi =  $xathanh . ', ' . $quanhuyen . ', ' . $tinhthanh;

			$data_order = array(
				'order_status' => 0,
				'order_code' => $order_code,
				'order_date' => $date . ' ' . $hour,
			);
			$result_order = $ordermodel->insert_order($table_order, $data_order);
			if (session::get("shopping_cart") == true) {
				foreach (session::get("shopping_cart") as $key => $value) {
					$data_details = array(
						'order_code' 				=> $order_code,
						'product_id' 				=> $value['product_id'],
						'product_quantity' 			=> $value['product_quantity'],
						'name' 						=> $name,
						'phonenumber' 				=> $sodienthoai,
						'email' 					=> $email,
						'address' 					=> $diachi,
						'noidung' 					=> $noidung
					);
					$result = $ordermodel->insert_order_details($table_order_details, $data_details);
				}
				// unset($_SESSION["shopping_cart"]);
			}
			$item = array(
				'email_KH' => $_POST['email'],
				'name_KH' => $_POST["name"],
				'diachi_KH' => $diachi,
				'code_don'    => $order_code
			);
			$_SESSION["info"][] = $item;

			// unset($_SESSION["info"]);


			header("Location:" . BASE_URL . 'giohangController/thankyou');
		}
	}

	public function chitiettintuc($id)
	{
		$this->load->view('header');
		// $this->load->view('slider');
		$this->load->view('details_post');
		$this->load->view('footer');
	}

	public function themgiohang()
	{
		session::init();
		//Session::destroy();
		if (isset($_SESSION["shopping_cart"])) {
			$avaiable = 0;
			foreach ($_SESSION["shopping_cart"] as $key => $value) {
				if ($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['product_id']) {
					$avaiable++;
					$_SESSION["shopping_cart"][$key]['product_quantity'] = $_SESSION["shopping_cart"][$key]['product_quantity'] + $_POST['product_quantity'];
				}
			}
			if ($avaiable == 0) {
				$item = array(
					'product_id' => $_POST["product_id"],
					'product_title' => $_POST["product_title"],
					'product_price' => $_POST["product_price"],
					'product_image' => $_POST["product_image"],
					'product_quantity' => $_POST["product_quantity"]
				);
				$_SESSION["shopping_cart"][] = $item;
			}
		} else {
			$item = array(
				'product_id' => $_POST["product_id"],
				'product_title' => $_POST["product_title"],
				'product_price' => $_POST["product_price"],
				'product_image' => $_POST["product_image"],
				'product_quantity' => $_POST["product_quantity"]
			);
			$_SESSION["shopping_cart"][] = $item;
		}
		header("Location:" . BASE_URL . 'giohangController');
	}

	public function updategiohang()
	{
		session::init();
		if (isset($_POST['delete_cart'])) {
			if (isset($_SESSION["shopping_cart"])) {
				foreach ($_SESSION["shopping_cart"] as $key => $value) {
					if ($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['delete_cart']) {
						unset($_SESSION["shopping_cart"][$key]);
					}
				}
				header('Location:' . BASE_URL . 'giohangController');
			} else {
				header('Location:' . BASE_URL . 'giohangController');
			}
		} else if (isset($_POST['update_cart'])) {
			foreach ($_POST['qty'] as $key => $qty) {
				foreach ($_SESSION["shopping_cart"] as $session => $value) {
					if ($value['product_id'] == $key && $qty >= 1) {
						$_SESSION['shopping_cart'][$session]['product_quantity'] = $qty;
						header('Location:' . BASE_URL . 'giohangController/checkout');
					} else if ($value['product_id'] == $key && $qty <= 0) {
						unset($_SESSION["shopping_cart"][$session]);
						header('Location:' . BASE_URL . 'giohangController');
					}
				}
			}
		}
	}
	public function checkout()
	{
		session::init();

		$table_tinh = "province";
		$table_huyen = "district";

		$addressModel = $this->load->model('addressModel');
		$data['tinh'] = $addressModel->list_tinh($table_tinh);

		$this->load->view('checkout', $data);
	}
	public function thankyou()
	{
		session::init();

		// $email = $_POST['email'];
		// echo $email;

		$table_tinh = "province";
		$table_huyen = "district";

		$addressModel = $this->load->model('addressModel');
		$data['tinh'] = $addressModel->list_tinh($table_tinh);

		$this->load->view('thankyou', $data);
	}
	public function unset_donhang()
	{
		session::init();

		// BASE_URL . "public/PHPMailer-master/src/PHPMailer.php";
		// require BASE_URL . "public/PHPMailer-master/src/SMTP.php";
		// require BASE_URL . "public/PHPMailer-master/src/Exception.php";

		if (isset($_POST['back'])) {
			$mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
			try {
				//  $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
				$mail->isSMTP();
				$mail->CharSet  = "utf-8";
				$mail->Host = 'smtp.gmail.com';  //SMTP servers
				$mail->SMTPAuth = true; // Enable authentication
				$nguoigui = 'quocnhutn6702@gmail.com';
				$matkhau = '78626488';
				$tennguoigui = 'Nhạc cụ Dương Đông';
				$mail->Username = $nguoigui; // SMTP username
				$mail->Password = $matkhau;   // SMTP password
				$mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
				$mail->Port = 465;  // port to connect to                
				$mail->setFrom($nguoigui, $tennguoigui);
				$to = "nguyequocdanh684@gmail.com";
				$to_name = "bạn";
				$tieude = "Xác nhận đơn hàng #1028 từ Dương Đông Shop";
				$content = "Cảm ơn Anh/chị đã đặt hàng tại Dương Đông!

				Đơn hàng của Anh/chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/chị.
				Nếu Anh/chị có bất kỳ câu hỏi nào, xin liên hệ với chúng tôi tại quocnhutn6702@gmail.com
Trân trọng,
Ban quản trị cửa hàng Nhạc cụ Dương Đông";

				$mail->addAddress($to, $to_name); //mail và tên người nhận  
				$mail->addAddress("nguyenquocdanh684@gmail.com", "honghanhnguyenthi");
				$mail->isHTML(true);  // Set email format to HTML
				$mail->Subject = $tieude;
				$noidungthu = ' <div class="card" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title"><b>Xin chào ' . $to_name . '</b></h5>
							<h6 class="card-subtitle mb-2 text-muted"></h6>
							<p class="card-text">' . $content . '</p>
						</div>
						</div> ';
				$mail->Body =  $noidungthu;
				if (isset($_FILES['file']['name'])) {
					$uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));    /* Hàm tempnam() sẽ tạo file với tên file là duy nhất trong nằm thư mục truyền vào. Nếu thư mục không tồn tại, hàm tempnam() có thể tạo tệp tin vào thư mục tạm của hệ thống. */

					if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
						$mail->addAttachment($uploadfile, $_FILES['file']['name']);
				}
				$mail->smtpConnect(array(
					"ssl" => array(
						"verify_peer" => false,
						"verify_peer_name" => false,
						"allow_self_signed" => true
					)
				));
				if ($mail->send()) {
					// echo "Gửi thành công";
					unset($_SESSION["shopping_cart"]);
					unset($_SESSION["info"]);

					// header('Location:' . BASE_URL);
					header('Location:' . BASE_URL);
				}
			} catch (Exception $e) {
				// echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
				// header("Location:" . BASE_URL . 'giohangController/thankyou');
			}
		} else {
			header("Location:" . BASE_URL . 'giohangController/thankyou');
		}
	}
}
