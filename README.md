# OFI PHP FRAMEWORK

Sebuah kerangka framework yang masih belum jadi hehe

<h3>Table Of Contents</h3>
<ol>
  <li> <a href="#gettingStarted">Getting Started</a> </li>
  <li> <a href="#navigation">Make a navigation section</a> </li>
</ol>

<div id="gettingStarted">
   If you wants to start make a section, first you can write 
        
	$design = new design();
	
   and then you can choose what do you want to do, for example you wants to make a navigation you can declare like this
   
        $design = new design();
        $design->header( //array data here );
	
   Note. you can read in <a href="#navigation">Make a navigation section</a> section to make a navigation.
   
</div>

<div id="navigation">
	<h3>Make a navigation section</h3>
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
