<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('product_form');
	}

	public function check()
	{
		//check whether stripe token is not empty
		if(!empty($_POST['stripeToken']))
		{
			//get token, card and user info from the form
			$token  = $_POST['stripeToken'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$card_num = $_POST['card_num'];
			$card_cvc = $_POST['cvc'];
			$card_exp_month = $_POST['exp_month'];
			$card_exp_year = $_POST['exp_year'];

			//include Stripe PHP library
			require_once APPPATH."third_party/stripe/init.php";

			//set api key
			$stripe = array(
			  "secret_key"      => "sk_test_gAuMTZ5iumEJqAwVSP2tK6vl00PVXWyJog",
			  "publishable_key" => "pk_test_0LgffoQ1OgAQ4INiRFZWC0Do008Xz8DNn0"
			);

			\Stripe\Stripe::setApiKey($stripe['secret_key']);

			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
				'email' => $email,
				'source'  => $token
			));

			//item information
			$itemPrice = $_SESSION['total'] * 100; //stripes uses cents
			$currency = "usd";
			$orderID = session_id();

			//charge a credit or a debit card
			$charge = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount'   => $_SESSION['total'] * 100,
				'currency' => $currency,

				'metadata' => array(

				)
			));

			//retrieve charge details
			$chargeJson = $charge->jsonSerialize();

			//check whether the charge is successful
			if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
			{
				//order details
				$amount = $chargeJson['amount'];
				$balance_transaction = $chargeJson['balance_transaction'];
				$currency = $chargeJson['currency'];
				$status = $chargeJson['status'];
				$date = date("Y-m-d H:i:s");


				//insert tansaction data into the database
				$dataDB = array(
					'name' => $name,
					'email' => $email,
					'card_num' => md5($card_num),
					'card_cvc' => md5($card_cvc),
					'card_exp_month' => $card_exp_month,
					'card_exp_year' => $card_exp_year,
					'Order_number' =>$orderID,
					'paid_amount' =>$_SESSION['total'],
					'paid_amount_currency' => $currency,
                    'adress' =>  $_POST['adress'],
                    'country' => $_POST['country'],
					'txn_id' => $balance_transaction,
					'payment_status' => $status,
					'created' => $date,
					'modified' => $date
				);

				if ($this->db->insert('orders', $dataDB)) {
					if($this->db->insert_id() && $status == 'succeeded'){
						$data['insertID'] = $this->db->insert_id();
						$this->load->view('payment_success', $data);
						// redirect('Welcome/payment_success','refresh');
					}else{
						echo "Transaction has been failed";
					}
                    $this->db->where('cust_id', session_id());
                    $this->db->delete('cart');


                    $_SESSION['cart'] = 0;
                    $_SESSION['total'] = 0;


				}
				else
				{
					echo "not inserted. Transaction has been failed";
				}

			}
			else
			{
				echo "Invalid Token";
				$statusMsg = "";
			}
		}
	}

	public function payment_success()
	{
		$this->load->view('payment_success');
	}

	public function payment_error()
	{
		$this->load->view('payment_error');
	}

	public function help()
	{
		$this->load->view('help');
	}

}
