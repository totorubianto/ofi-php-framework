# OFI PHP FRAMEWORK

Sebuah kerangka framework yang masih belum jadi hehe

#### Table Of Contents
<ol>
  <li> <a href="#navigation">Make a navigation section</a> </li>
</ol>

<div id="navigation">
	To make top navigation section you can write this code in your index.php
	
	$design = new design();

    $design->header(array(
        'title' => true, // true or false
        'theme' => 'dark', // white or dark
        'float' => 'left', // left, center, right
        'menu' => [
            [
                'name' => "Menu 1",
                'url' => "http://google.com"
            ],

            [
                'name' => "Menu 2",
                'url' => "http://google.com"
            ],
        ],        
    ));
</div>
