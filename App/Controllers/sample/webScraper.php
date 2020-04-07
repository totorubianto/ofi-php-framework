<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\helper;

class indexController extends Controller
{
    public function scrap()
    {
        /**
         * Get url link and image 
         * according keyword from all source
         */

        $data = [
            // keyword what do you want
            'keyword' => 'gambar',
            // All source to scrapper the content 
            'source' => [
                'https://kajian.net/',
                'https://www.nu.or.id/',
                'https://namamia.com/',
                'http://badaronline.com/',
                'https://konsultasisyariah.com/',
                'https://pengusahamuslim.com/',
                'https://islamdownload.net/',
                'https://yufid.tv/',
                'https://muslimah.or.id/',
                'https://nucare.id/',
                'https://muslim.or.id/',
                'https://islam.nu.or.id/',
                'https://www.portal-islam.id/'
            ],
        ];

        // And the results in JSON
        helper::scraper($data);
    }
}
