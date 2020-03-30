<?php 

namespace App\Controllers;
use App\Core\Controller;
use App\Models\DB;
use App\Core\helper;

class indexController extends Controller
{
	public function index()
	{
		$this->loadTemplate('index', []);
	}	

	public function sendMail()
	{
		$mail = [
			'to' => 'teguhrijanandi02@gmail.com',
			'receiverName' => 'Hai teguh Rijanandi',
			'subject' => 'First Testing', // subjcet message
			'body' => 'wkwkwkwkw', // in html
			'attachment' => [
				'name' => 'attachment.jpg',
				'type' => 'url',
				'value' => 'https://i1.wp.com/www.mypurohith.com/wp-content/uploads/2019/03/lukisan-pemandangan-alam.jpg'
			]
		];

		$sendMail = helper::sendEmail($mail);
		if (!$sendMail) {
            echo "Mailer Error: " . $sendMail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
	}
}