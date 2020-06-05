<?php

namespace App\Core;

use App\Models\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class helper
{
    /**
     * Method request
     * this method is to take a data
     * from a request.
     */
    public static function request($val_request)
    {
        // memberi fasilitas bisa mengambil
        // inputan yang namanya ada spasinya
        $hapus_spasi = str_replace(' ', '', $val_request);
        $jadi_kecil = strtolower($hapus_spasi);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $_REQUEST[$jadi_kecil];     
        } else {
            return $_GET[$hapus_spasi];
        }

    }

    /**
     * Method request
     * this method is to take a data
     * from a ajax request.
     */

    public static function ajaxRequest($val_request)
    {   
        // Jika POST Method
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if(!$_REQUEST[$val_request]) {
                return $_REQUEST[$val_request];
            } else {
                return $_POST[$val_request];
            }

        } else {
            // Jika GET Method

            if(!$_REQUEST[$val_request]) {
                return $_REQUEST[$val_request];
            } else {
                return $_GET[$val_request];
            }
        }   
    }

    /**
     * Method hash
     * For hashing a sensitive word
     * like a password.
     */
    public static function hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Method slug
     * this method is to replace space
     * in a words to '-' sign.
     */
    public function slug($string)
    {
        return strtolower(str_replace(' ', '-', $string));
    }

    /**
     * Method redirect
     * To redirect to new url.
     */
    public function redirect($url)
    {
        if(strpos($url, 'http') !== false || strpos($url, 'https') !== false) {
            return header('Location: '.$url);
        } else {
            return header('Location: '. PROJECTURL . '/' . $url);
        }        
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
        if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        // search IP in blockIp.php
        include 'App/Middleware/blockIp.php';

        $z = array_search($ip, $block);

        if (in_array($ip, $block)) {
            header('HTTP/1.1 503 Service Temporarily Unavailable');
            header('Status: 503 Service Temporarily Unavailable');
            header($_SERVER['SERVER_PROTOCOL'].' 503 Service Temporarily Unavailable', true, 503);
            exit();
        }
    }

    /**
     * Method upload
     * Help to upload a file
     */

    public static function upload($data)
    {
        include 'mimes.php';
        // $data['form'] adalah nama form input yang menjadi acuan
        // $data['folder'] adalah nama folder tujuan untuk menjadi penyimpanan

        $ekstensi_diperbolehkan	= $mimes;
        $nama = $_FILES[$data['form']]['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES[$data['form']]['size'];
        $file_tmp = $_FILES[$data['form']]['tmp_name'];	
        
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran <= MAXUPLOAD){			

                    // Otomatis membuat direktori baru jika direktori yang diminta tidak ditemukan

                    $dir = PROJECTPATH . '/assets/upload/' . $data['folder'];
                    if (!file_exists( $dir ) && !is_dir($dir)) {
                        mkdir($dir);       
                    } 

                    move_uploaded_file($file_tmp, PROJECTPATH . '/assets/upload/' . $data['folder'] . '/' . $nama);

                    $bytes = $ukuran;

                    if ($bytes >= 1073741824)
                    {
                        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
                    }
                    elseif ($bytes >= 1048576)
                    {
                        $bytes = number_format($bytes / 1048576, 2) . ' MB';
                    }
                    elseif ($bytes >= 1024)
                    {
                        $bytes = number_format($bytes / 1024, 2) . ' KB';
                    }
                    elseif ($bytes > 1)
                    {
                        $bytes = $bytes . ' bytes';
                    }
                    elseif ($bytes == 1)
                    {
                        $bytes = $bytes . ' byte';
                    }
                    else
                    {
                        $bytes = '0 bytes';
                    }
                    
                    $status['status'] = 'Success';
                    $status['filename'] = $nama;
                    $status['filesize'] = $bytes;
                    $status['storageLocation'] = PROJECTURL . '/assets/upload/' . $data['folder'] . '/' . $nama;
                    return $status;

                }else{
                    $status['status'] = 'THE SIZE OF FILE IS TOO LARGE';
                    $status['filename'] = $nama;
                    $status['filesize'] = $bytes;
                    $status['storageLocation'] = PROJECTURL . '/assets/upload/' . $data['folder'] . '/' . $nama;
                    return $status;
                }    
            }else{
                    $status['status'] = 'EXTENSION OF FILES IS NOT ALLOWED';
                    $status['filename'] = $nama;
                    $status['filesize'] = $bytes;
                    $status['storageLocation'] = PROJECTURL . '/assets/upload/' . $data['folder'] . '/' . $nama;
                    return $status;
            }
    }

    /**
     * Method auth
     * is to get your auth information
     * from the database (login required to use).
     */
    public static function auth($datas)
    {
        if (!$_SESSION['login_user']) {
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
        $mail = new PHPMailer();

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
        $mail->Body = $data['body'];

        if (!$data['attachment']) {
        } else {
            if ($data['attachment']['type'] == 'url') {
                $mail->addStringAttachment(file_get_contents($data['attachment']['value']), $data['attachment']['name']);
            } else {
                $mail->addAttachment($data['attachment']['value']);
            }
        }

        $mail->send();

        return $mail;
    }
}
