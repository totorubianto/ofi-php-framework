<?php 

use App\Core\Controller;
use App\Core\helper;

class exampleUploadCode
{
    // Auto detect folder exist
    // must POST method


    public function upload()
    {
        $upload = helper::upload([
            'form' => 'gb', // Input form name here
            'folder' => 'gambar', // Folder name what do you wants to save your file
        ]);

        echo $upload['status']; // To get upload status
        echo $upload['filename']; // To get filename after upload proccess
        echo $upload['filesize']; // To get filesize after upload proccess
        echo $upload['storageLocation']; // To where file are saved
    }
}
