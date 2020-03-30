<?php 

namespace App\Core;
use App\Core\Controller;
use App\Models\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class helper 
{   
    /**
     * Method request
     * this method is to take a data
     * from a request
     */

    public static function request($val_request)
    {   
            // memberi fasilitas bisa mengambil 
            // inputan yang namanya ada spasinya
            $hapus_spasi = str_replace(' ', '', $val_request);
            $jadi_kecil = strtolower($hapus_spasi);
            return $_REQUEST[$jadi_kecil];
    }   

    /**
     * Method hash 
     * For hashing a sensitive word
     * like a password
     */

    public static function hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Method slug
     * this method is to replace space
     * in a words to '-' sign
     */

    public function slug($string)
    {
        return strtolower(str_replace(' ', '-', $string));
    }

    /**
     * Method redirect
     * To redirect to new url
     */

    public function redirect($url)
    {
        return header("Location: " . $url);
    }

    /**
     * Method json_beautify
     * This function is to fetch data API 
     * in GET Method and print again in JSON
     * header type
     */

    public static function json_beautify($json_url)
    {
        // Library untuk mendapatkan data API dan mempercantiknya
        // cuma metode get yang diizinkan

        // persiapkan curl
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $json_url);

        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // tutup curl 
        curl_close($ch);      

        // menampilkan hasil curl
        header('Content-Type: application/json');
        echo $output;

    }

    /**
     * Method  blockIp
     * This function is detect a IP, what thats IP is
     * allow to visit your sites or not. When not allowed
     * your visitor will have a 500 error form they browser.
     */

    public static function blockIp()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        // search IP in blockIp.php
        include 'App/Middleware/blockIp.php';

        $z= array_search($ip, $block);

        if(in_array($ip, $block)) {
            header('HTTP/1.1 503 Service Temporarily Unavailable');
            header('Status: 503 Service Temporarily Unavailable');
            header($_SERVER["SERVER_PROTOCOL"]." 503 Service Temporarily Unavailable", true, 503);
            exit();
          }
          
    }

    /**
     * Method toJson
     * This function is to convert array data
     * to json data
     */

    public static function toJson($data)
    {
        // Set content type menjadi application/json
        header('Content-Type: application/json');
        return json_encode($data);
    }

    /**
     * Method auth
     * is to get your auth information
     * from the database (login required to use)
     */

    public static function auth($datas)
    {
        if(!$_SESSION['login_user']) {
            $results = null;
        } else {
            $val['id'] = $_SESSION['id_user']; 
            $database_engine = new DB();
            $hasil = $database_engine->get_user_login($val);
            $results = $hasil[$datas];
        }

        return $results;
    }

    public static function sendEmail($data)
    {
        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Asia/Jakarta');

        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = SMTPDebug;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = Host;

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = Port;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = SMTPSecure;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = GmailUsername;

        //Password to use for SMTP authentication
        $mail->Password = GmailPassword;

        //Set who the message is to be sent from
        $mail->setFrom(senderEmail, senderName);

        //Set who the message is to be sent to
        $mail->addAddress($data['to'], $data['receiverName']);

        //Set the subject line
        $mail->isHTML(true);  
        $mail->Subject = $data['subject'];
        $mail->AltBody = $data['body'];
        $mail->Body    = $data['body'];

        if(!$data['attachment']) {

        } else {

            if($data['attachment']['type'] == 'url') {
                $mail->addStringAttachment(file_get_contents($data['attachment']['value']), $data['attachment']['name']);
            } else {
                $mail->addAttachment($data['attachment']['value']);
            }
        }

         $mail->send();

         return $mail;
    }

}