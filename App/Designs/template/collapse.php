<?php 
    if ($type == 'btn') {
        echo '<button class="btn" data-toggle="collapse" data-target="#' . $name . '"> '. $value .' </button>';

    } elseif($type == 'collapse') {
        echo '
            <div id="'. $name .'" class="collapse">
                ' . $value . '
            </div>
        ';
    } else {
        echo "Collapse Section Error, check your code!";
    }
    
?>