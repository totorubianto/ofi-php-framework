<?php 

use App\Core\Controller;
use App\Core\helper;

class sendMailExample
{
    /**
     * Example from sendMail Controller
     */
    public function sendMail()
    {
        $mail = [
            'to'           => 'teguhrijanandi02@gmail.com',
            'receiverName' => 'Hai teguh Rijanandi',
            'subject'      => 'First Testing', // subjcet message
            'body'         => 'wkwkwkwkw', // in html

            // Attachment is optional
            'attachment'   => [
                'name'  => 'attachment.jpg',
                'type'  => 'url', // url and file
                // value is image url or image path 
                'value' => 'https://i1.wp.com/www.mypurohith.com/wp-content/uploads/2019/03/lukisan-pemandangan-alam.jpg',
            ],
        ];

        $sendMail = helper::sendEmail($mail);
        
        if (!$sendMail) {
            echo 'Mailer Error: '.$sendMail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }
}
