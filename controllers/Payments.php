 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->model('stripe/Payment','Payment');
	}


	public function index()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('stripe/stripe');
		$this->load->view('footer');
	}

    public function payment()
	{
         require_once('application/libraries/stripe-php/init.php');

        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

       $charge = \Stripe\Charge::create ([
                "amount" => 55 * 100,
                "currency" => "usd",
                "source" => $this->input->post('stripeToken'),
                "description" => "Test payment from webpreparations"
        ]);
    $chargeJson = $charge->jsonSerialize();


  /*  for insert data in database start */
   $item_name       = "Premium Script Webpreparations";
   $item_number     = "PS123456";
   $item_price      = 55 * 100;
   $currency        = "usd";
   $order_id        = "SKA92712382139";

   $amount                  = $chargeJson['amount'];
   $balance_transaction     = $chargeJson['balance_transaction'];
   $currency                = $chargeJson['currency'];
   $status                  = $chargeJson['status'];


  $insert_data = array(
                    'name'                  => $this->input->post('name'),
                    'email'                 => $this->input->post('email'),
                    'card_num'              => $this->input->post('card_num'),
                    'card_cvc'              => $this->input->post('card_cvc'),
                    'card_exp_month'        => $this->input->post('card_exp_month'),
                    'card_exp_year'         => $this->input->post('card_exp_year'),
                    'item_name'             => $item_name,
                    'item_number'           => $item_number,
                    'item_price'            => $item_price,
                    'item_price_currency'   => $currency,
                    'paid_amount'           => $amount,
                    'paid_amount_currency'  => $currency,
                    'payment_status'        => $status,
                    'created_by'            => 1,
                    'created_date'          => date('Y-m-d H:i:s')
                     );


  $this->Payment->insert($insert_data);
              /*  for insert data in database close */

        $this->session->set_flashdata('success', 'Payment made successfully.');

        redirect('/stripe/Payments/index', 'refresh');

        $this->load->helper('email');


                  $config = Array(
                      'protocol' => 'smtp',
                      'smtp_host' => 'ssl://smtp.googlemail.com',
                      'smtp_port' => 465,
                      'smtp_user' => 'zymantasvalacka@gmail.com', // change it to yours
                      'smtp_pass' => 'olimpiada2014', // change it to yours
                      'mailtype' => 'html',
                      'charset' => 'iso-8859-1',
                      'wordwrap' => TRUE
                  );

                  $message = 'Spam hohohoho';
                  $this->load->library('email', $config);
                  $this->email->set_newline("\r\n");
                  $this->email->from('zymantasvalacka@gmail.com'); // change it to yours
                  $this->email->to($_POST['emailSpam']);// change it to yours
                  $this->email->subject('Thank you for signin Up for some spam');
                  $this->email->message($message);

                  if($this->email->send())
                  {
                      $data = array(
                          'email' => $_POST['emailSpam'],

                      );
                      $this->db->insert('spam', $data);
                      $this->session->set_flashdata("success", "Dekui!");
                  }
	}

}
