<?php

class order extends DController
{

	public function __construct()
	{
		session::checkSession();
		parent::__construct();
	}

	public function index()
	{
		$this->order();
	}
	public function order()
	{
		session::init();

		$orderModel = $this->load->model('orderModel');
		$table_order = "tbl_order";
		$data['order'] = $orderModel->list_order($table_order);

		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');

		$this->load->view('cpanel/order/order', $data);
		$this->load->view('cpanel/footer');
	}

	public function order_details($order_code)
	{
		session::init();

		$table_order_details = "tbl_order_details";
		$table_product = "tbl_product";
		$orderModel = $this->load->model('orderModel');

		$cond = "$table_product.id_product = $table_order_details.product_id AND $table_order_details.order_code = '$order_code'";
		$cond_info = "$table_order_details.order_code = '$order_code'";
		$data['order_details'] = $orderModel->list_order_details($table_product, $table_order_details, $cond);
		$data['order_info'] = $orderModel->list_info($table_order_details, $cond_info);

		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');

		$this->load->view('cpanel/order/order_details', $data);
		$this->load->view('cpanel/footer');
	}

	public function delete_order()
	{
		session::init();
		if ($_POST["action"] == "delete") {
			$id = $_POST["id"];

			$table = 'tbl_order';
			$condition = "order_id = '$id'";
			$orderModel = $this->load->model('orderModel');

			$result = $orderModel->deleteOrder($table, $condition);

			die(json_encode($result));
		}
	}

	public function order_confirm($order_code)
	{
		session::init();

		$ordermodel = $this->load->model('orderModel');
		$table_order = "tbl_order";
		$cond = "$table_order.order_code='$order_code'";
		$data = array(
			'order_status' => 1
		);
		$result = $ordermodel->order_confirm($table_order, $data, $cond);

		if ($result == 1) {
			$message['msg'] = "Đã xử lý đơn hàng thành công";
			header('Location:' . BASE_URL . "/order?msg=" . urlencode(serialize($message)));
		} else {
			$message['msg'] = "Đã xử lý đơn hàng thất bại";
			header('Location:' . BASE_URL . "/order?msg=" . urlencode(serialize($message)));
		}
	}
}
