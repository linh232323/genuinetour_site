<?php
class Default_OrderController extends Benly_DefaultController {
	public function init() {
		parent::init ();
	}
	public function bookAction() {
		if ($this->_request->isPost ()) 

		{
			$customerModel = new Default_Model_CustomerAccount ();
			$travellerModel = new Default_Model_Traveller ();
			$orderModel = new Default_Model_Order ();
			$roomModel = new Default_Model_RoomOrder ();
			$customerId = 0;
			$orderId = 0;
			$total = 0;
			$surcharges = 0;
			$tour_id = $this->_request->getParam ( "tour_id" );
			$tour_cat_id = $this->_request->getParam ( "tour_cat_id" );
			$name = $this->_request->getParam ( "name" );
			$phone = $this->_request->getParam ( "phone" );
			$email = $this->_request->getParam ( "email" );
			$num_pas = $this->_request->getParam ( "num_pas" );
			$transports = $this->_request->getParam ( "trans" );
			//$surcharges = ( int ) $this->_request->getParam ( "surcharges" );
			$date_pick = $this->_request->getParam ( "date" );
			$chay = $this->_request->getParam ( "chay" );
			$man = $this->_request->getParam ( "man" );
			$description = $this->_request->getParam ( "description" );
			$payment = $this->_request->getParam ( "payment" );
			$result = $customerModel->CustomerAccount_insert ( $name, "empty", $email, "", "", $phone, $name );
			if ($result) {
				$custom = $customerModel->CustomerAccount_getByUsername ( $name );
				$customerId = $custom ['id'];
			}
			
			$room_1_0 = $this->_request->getParam ( "room_1_0" );
			$room_0_2 = $this->_request->getParam ( "room_0_2" );
			$room_1_1 = $this->_request->getParam ( "room_1_1" );
			$room_2_0 = $this->_request->getParam ( "room_2_0" );
			
			$result = $orderModel->Order_insert ( $customerId, 0, 0, 0, 0, 0, $tour_cat_id, date ( "Y-m-d H:i:s" ), "Chưa thanh toán", 0, 0, 0, 0, $tour_id );
			if ($result > 0) {
				$orderId = $result;
			} else {
				// echo "error:".$result;
			}
			
			$result = $roomModel->RoomOrder_insert ( $orderId, $tour_cat_id, $room_1_0, $room_1_1, $room_2_0, $room_0_2 );
			
			$num_0_5_children = 0;
			$num_5_11_children = 0;
			$num_2_12_children = 0;
			$num_adults = 0;
			$num_foreigners = 0;
			
			$pas_genders = $this->_request->getParam ( "pas_gender");
			$pas_names = $pas_name = $this->_request->getParam ("pas_name");
			$pas_ages = $this->_request->getParam ( "pas_age");
			$pas_cids = $this->_request->getParam ( "pas_cid");
			$pas_nations = $this->_request->getParam ( "pas_nation");
			
			for($i = 0; $i < count($pas_genders); $i ++) {
				$pas_name = $pas_names[$i];
				$pas_age = $pas_ages[$i];
				$age = ( int ) $pas_age;
				if ($age <= 12 && $age >= 2) {
					$num_2_12_children += 1;
				}
				if ($age <= 11 && $age >= 5) {
					$num_5_11_children += 1;
				}
				if ($age <= 5 && $age >= 0) {
					$num_0_5_children += 1;
				}
				if ($age > 12) {
					$num_adults += 1;
				}
				$pas_gender = $pas_genders[$i];
				$pas_nation = $pas_nations[$i];
				$pas_cid = $pas_cids[$i];
				$result = $travellerModel->Traveller_insert ( $pas_name,
						 $pas_cid, $pas_nation, "", $orderId, "", $pas_age, $pas_gender );
			}
			
			$travellers = $travellerModel->Traveller_getByOrderId ( $orderId );
			
			$data = $orderModel->Order_getById ( $orderId );
			
			$calculate = $this->Calculate_Order ( $travellers, $transports, $tour_id, $tour_cat_id, $room_1_0, $room_0_2, $room_1_1, $room_2_0 );
			
			$orderModel->setTotal ( $calculate ['total'] );
			$body = "<div>";
			$body = $body . "<h1>Thông tin chung</h1>";
			
			$body = $body . "<p>Anh/Chị: <b>" . $name . "</b> <br/>Email: <b>" . $email . "</b>  <br/>DT: <b>" . $phone . "</b></p>";
			$body = $body . "<p><b>Đã đặt Tour du lịch:</b></p>";
			$body = $body . "<p>Ngày khởi hành: <b>" . $date_pick . "</b></p>";
			$body = $body . "<p>Tên tour: <b>" . $data ['tour_intro_name'] . "</b></p>";
			$body = $body . "<p>Tên tour: <b>" . $data ['tour_category_name'] . "</b></p>";
			
			$body = $body . "<h1>Danh sách hành khách</h1><ul>";
			foreach ( $travellers as $t ) {
				$body = $body . "<li>Tên:" . $t ['name'] . " -Tuổi:" . $t ['old_year'] . " -Giới tính: " . $t ['gender'] . " -Quốc tịch: " . $t ['nation_name'] . " -CMND/Passport: " . $t ['passport'] . "</li>";
			}
			$body = $body . "</ul><h1>Phòng</h1>";
			
			$body = $body . "<p>Số phụ thu phòng đơn: <b>" . $calculate ['num_surcharge'] . "</b></p>";
			if ($room_1_0 != 0) {
				$body = $body . "<p>01 giường đôi: <b>$room_1_0 phòng</b></p>";
			}
			if ($room_0_2 != 0) {
				$body = $body . "<p>02 giường đơn: <b>$room_0_2 phòng</b></p>";
			}
			if ($room_1_1 != 0) {
				$body = $body . "<p>01 giường đôi + 01 giường đơn: <b>$room_1_1 phòng</b></p>";
			}
			if ($room_2_0 != 0) {
				$body = $body . "<p>02 giường đôi: <b>$room_2_0 phòng</b></p>";
			}
			$body = $body . "<p>Chay: " . $chay . "(phần) - Mặn :" . $man . "(phần)</p>";
			$body = $body . "<h1>Thông tin thanh toán</h1>";
			$body = $body . "<p>Giá Tour: <b>" . $calculate ['price_tour'] . "</b> VND</p>";
			$body = $body . "<p>Giá phụ thu phòng: <b>" . $calculate ['surcharge'] . "</b> VND</p>";
			$body = $body . "<p>Giá phụ thu nước ngoài: <b>" . $calculate ['foreigner'] . "</b> VND</p>";
			$body = $body . "<p>Giá phương tiện: <b>" . $calculate ['price_trans'] . "</b> VND</p>";
			$body = $body . "<p><h1>Tổng tiền vé: <b>" . $calculate ['total'] . "</b></h1> VND</p>";
			
			$tran = new Default_Model_TransportDetail ();
	
			if (count ( $transports ) > 0) {
				$body = $body . "<h1>Phương tiện di chuyển:</h1><ul>";
				foreach ( $transports as $id ) {
					$data = $tran->TransportDetail_getById ( $id );
					$body = $body . "<li>" . $data ['transport_name'] . "</li>";
				}
				$body = $body . "</ul>";
			}
			$body = $body . "</div>";
			
			$orderModel->setNum_Adults ( $num_adults );
			$orderModel->setNum_0_5_Children ( $num_0_5_children );
			$orderModel->setNum_6_12_Children ( $num_5_11_children );
			$orderModel->setNum_2_12_Children ( $num_2_12_children );
			$orderModel->setDescription ( $body );
			
			$result = $orderModel->Order_update ();
			$customerModel->setUser_Name ( hash ( "adler32", $orderId . "ORDER" ) );
			$customerModel->setPassword ( "123" );
			$customerModel->CustomerAccount_update ();
			
			if ($result > 0) {
				$this->sendMail ( "TOUR-" . $orderId, $orderModel, $customerModel );
				switch ($payment) {
					case 1 :
						$checkout = new Benly_NLCheckout ();
						$return_url = "http://benlytourist.com.vn/order/resultnl"; // Địa
						                                                           // chỉ
						                                                           // trả về
						                                                           // giao
						                                                           // dịch
						$receiver = "contact@benlytourist.com.vn"; // Tài khoản ngân
						                                           // lượng
						$transaction_info = "Thanh toán đơn hàng Tour du lịch"; // Mô
						                                                        // tả
						                                                        // chung
						$order_code = "TOUR-" . $orderId; // Mã hóa đơn
						$price = $calculate ['total']; // Giá đơn hàng
						$url = $checkout->buildCheckoutUrlExpand ( $return_url, $receiver, $transaction_info, $order_code, $price );
						
						$this->_redirect ( $url );
						break;
					case 2 :
						$this->_redirect ( "/order/check/user/" . $customerModel->getUser_Name () );
						break;
				}
			} else {
				echo "Cannot insert";
			}
		} elseif ($this->_request->isXmlHttpRequest) {
			$transports = $this->_request->getParam ( "trans" );
		} else {
			$nationModel = new Default_Model_Nation ();
			$tourModel = new Default_Model_TourIntro ();
			$roomCatModel = new Default_Model_TourCategory ();
			$tourPriceModel = new Default_Model_TourPrice ();
			$tranDetailModel = new Default_Model_TransportDetail ();
			$tourScheduel = new Default_Model_TourSchedule ();
			$tour_id = $this->_request->getParam ( "id" );
			if ($tour_id) {
				$this->view->tour = $tourModel->load ( $tour_id );
				$this->view->tour_cat = $tourPriceModel->TourPrice_getByTour ( $tour_id );
				$this->view->nation = $nationModel->Nation_listall ();
				$this->view->transport = $tranDetailModel->TransportDetail_getByTourId ( $tour_id );
				$now = new DateTime ();
				$this->view->tour_schedule = $tourScheduel->TourSchedule_getByTourID_And_Time ( $tour_id, date ( "Y-m-d", $now->format ( "U" ) ) );
			}
		}
	}
	public function calAction() {
		$this->_helper->layout()->disableLayout();
		$room_1_0 = $this->_request->getParam ( "room_1_0" );
		$room_0_2 = $this->_request->getParam ( "room_0_2" );
		$room_1_1 = $this->_request->getParam ( "room_1_1" );
		$room_2_0 = $this->_request->getParam ( "room_2_0" );
		$tour_id = $this->_request->getParam ( "tour_id");
		$tour_cat_id = $this->_request->getParam ( "tour_cat_id");
		
		$currency = new Zend_Currency(array(
				
				'currency'   =>'VND',
				'symbol'      =>'VND',
				'display'   =>2,
				'precision'   =>0,
				'number_format' => '#.##0.00',
				'locale'      =>'de',
				'position'   =>Zend_Currency::RIGHT));
		
		$transports = $this->_request->getParam ( "trans" );
		$travellers = array();
		$pas_ages = $this->_request->getParam ( "pas_age");
		$pas_nations = $this->_request->getParam ( "pas_nation");
		if(isset($pas_ages[0]) && isset($pas_nations[0]) && count($pas_ages) !=0 && count($pas_nations)==count($pas_ages)){
			
		    for($i =0 ;$i<count($pas_ages);$i++){
				$temp = array('old_year'=>$pas_ages[$i],
						'nation_id'=>$pas_nations[$i]);
				$travellers[] = $temp; 
			}
			$calculate = $this->Calculate_Order ( $travellers, $transports, $tour_id, $tour_cat_id, $room_1_0, $room_0_2, $room_1_1, $room_2_0 );
			$body = "";
			$body = $body . "<p><b>Giá Tour: </b>" . $currency->toCurrency($calculate ['price_tour']) . "</p>";
			$body = $body . "<p><b>Số phụ thu phòng: </b>" . $calculate ['num_surcharge'] . "</p>";
			if($calculate ['surcharge'] != 0)
				$body = $body . "<p><b>Giá phụ thu phòng: </b>" . $currency->toCurrency($calculate ['surcharge']) . "</p>";
			if($calculate ['foreigner'] != 0)
				$body = $body . "<p><b>Giá phụ thu nước ngoài: </b>" . $currency->toCurrency($calculate ['foreigner']) . "</p>";
			if($calculate ['price_trans'] != 0)
				$body = $body . "<p><b>Giá phương tiện: </b>" . $currency->toCurrency($calculate ['price_trans']) . "</p>";
			$body = $body . "<p><b>Tổng tiền vé: </b>" .$currency->toCurrency( $calculate ['total']) . "</b></p>";
			echo $body;
		}
		
	}
	public function checkAction() {
		$user = $this->getRequest ()->getParam ( "user" );
		$this->view->user = $user;
	}
	public function Calculate_Order($travellers, $transports, $tour_id, $tour_cat_id, $num_1_0, $num_0_2, $num_1_1, $num_2_0) {
		$tour_price = new Default_Model_TourPrice ();
		$data = $tour_price->TourPrice_getByTour_Id_And_Tour_Cat_ID ( $tour_id, $tour_cat_id );
		if (! ($tour_price))
			return 0;
		if (count ( $travellers ) == 0)
			return 0;
		$m = 0;
		$n = 0;
		$p = 0;
		$q = 0;
		$k = 0;
		$w = 0;
		$total = 0;
		foreach ( $travellers as $item ) {
			if ($item ['nation_id'] != 1) {
				$w += 1;
			}
			if ($item ['old_year'] >= 12) {
				$m += 1;
			} else {
				if ($item ['old_year'] >= 6 && $item ['old_year'] <= 11) {
					$n += 1;
				}
				if ($item ['old_year'] >= 2 && $item ['old_year'] <= 11) {
					$q += 1;
				}
				if ($item ['old_year'] < 6) {
					$p += 1;
				}
				if ($item ['old_year'] < 2) {
					$k += 1;
				}
			}
		}
		$a = 0;
		if (($m == 1) && (($p + $n) == 1)) {
			$a = $m;
		} elseif ($m / 2 == 0) {
			if ((2 * $p - $m) > 0) {
				$a = $m + $n * 0.5 + ($p - $m / 2) * 0.5;
			} else {
				$a = $m + $n * 0.5;
			}
		} else {
			if ((2 * $p - $m + 1) > 0) {
				$a = $m + $n * 0.5 + ($p - ($m - 1) / 2) * 0.5;
			} else {
				$a = $m + $n * 0.5;
			}
		}
		$x = 0;
		if ($num_1_0 != 0) {
			$x += (2 * $num_1_0 - $m);
		}
		if ($num_1_1 != 0) {
			$x += (3 * $num_1_0 - $m);
		}
		if ($num_0_2 != 0) {
			$x += (2 * $num_0_2 - $m);
		}
		if ($num_2_0 != 0) {
			$x += (4 * $num_2_0 - $m);
		}
		
		if ($x < 0)
			$x = 0;
		$u = $m + $n * 0.5;
		$o = $m + $q * 0.75 + $k * 0.1;
		$s = $m + $n * 0.5;
		$temp = 0;
		// echo "$o $u $s $x $a $w";
		$tran = new Default_Model_TransportDetail ();
		if ($transports) {
			foreach ( $transports as $id ) {
				$tran->TransportDetail_getById ( $id );
				// echo $tran->getPrice()."<br/>";
				// Vé máy bay
				if ($tran->getTransport_Id () == 2) {
					$total += $o * $tran->getPrice ();
					$temp += $o * $tran->getPrice ();
				} elseif ($tran->getTransport_Id () == 3) {
					// Vé Xe lửa
					
					$total += $u * $tran->getPrice ();
					$temp += $u * $tran->getPrice ();
				} elseif ($tran->getTransport_Id () == 4) {
					$total += $s * $tran->getPrice ();
					$temp += $s * $tran->getPrice ();
				}
				// Vé tàu thủy
			}
		}
		$total += $a * $tour_price->getPrice () + $x * $tour_price->getSurcharge () + $w * $tour_price->getForeign_Charge ();
		
		$result = array (
				"adult" => $m,
				"children_6_11" => $n,
				"under_5" => $p,
				"children_2_11" => $q,
				"under_2" => $k,
				"num_tralvers" => count ( $travellers ),
				"num_surcharge" => $x,
				"price_tour" => ($a * $tour_price->getPrice ()),
				"price_trans" => ($temp),
				"surcharge" => ($x * $tour_price->getSurcharge ()),
				"foreigner" => ($w * $tour_price->getForeign_Charge ()),
				"total" => $total 
		);
		
		return $result;
	}
	function sendMail($order_id, $order, $user) {
		$mail_admin = array (
				"thanhliem@benlytourist.com.vn",
				"lanhuong@benlytourist.com.vn",
				"thanhliem.tran.vn@gmail.com",
				"honesthcmcity@yahoo.com",
				"benlytourist@yahoo.com" 
		);
		$mail_customer = $user->getEmail ();
		$mail = new Benly_SendMail ();
		$body = $order->getDescription () . "<h1>Tình trạng đơn hàng:" . $order->getStatus () . "</h1>";
		
		foreach ( $mail_admin as $admin ) {
			$mail->sendTo ( $admin, "contact@benlytourist.com.vn", "Đơn đặt hàng " . $order_id, $body );
		}
		$mail->sendTo ( $mail_customer, "contact@benltourist.com.vn", "Đơn Tour từ Benlytourist.com", $body );
	}
	public function resultnlAction() {
		$transaction_info = $this->getRequest ()->getQuery ( 'transaction_info' );
		$order_code = $this->getRequest ()->getQuery ( 'order_code' );
		$price = $this->getRequest ()->getQuery ( 'price' );
		$payment_id = $this->getRequest ()->getQuery ( 'payment_id' );
		$payment_type = $this->getRequest ()->getQuery ( 'payment_type' );
		$error_text = $this->getRequest ()->getQuery ( 'error_text' );
		$secure_code = $this->getRequest ()->getQuery ( 'secure_code' );
		
		$order_id = substr ( $order_code, 5 );
		$nganluong = new Benly_NLCheckout ();
		$result = $nganluong->verifyPaymentUrl ( $transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code );
		$order = new Default_Model_Order ();
		
		if ($result) {
			$order = new Default_Model_Order ();
			$order->Order_getById ( $order_id );
			if ($order->getTotal () == $price) {
				if ($payment_type == 1) {
					$order->setStatus ( "Thanh toán hoàn tất" );
					$order->setPayment_Id ( $payment_id );
				} else {
					$order->setStatus ( "Thanh toán tạm giữ" );
				}
				$this->view->show = "Thanh toán thành công. Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất.";
				
				if ($order->Order_update ()) {
					$pw = hash ( "adler32", $order_id . "ORDER" );
					$this->view->show = "<p>Thanh toán thành công. Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất.</p><p>Để xem tình trạng hóa đơn, bạn có thể truy cập vào trang <a href='/auth/login'>Xem chi tiết đơn Tour</a> </p><p>Mã truy cập: <b>" . $pw . "</b></p>";
					$user = new Default_Model_CustomerAccount ();
					$user->CustomerAccount_getByPassword ( $pw );
					$this->sendMail ( $order_code, $order, $user );
				} else {
					$this->view->show = "Đã cập nhật thanh toán";
				}
			} else {
				$this->view->show = "Không tìm thấy đơn hàng!";
			}
		} else {
			$this->view->show = "Quá trình thanh toán thất bại. Bạn vui lòng thử lại sau!";
		}
	}
}

?>
