<?php 
    if ($data['type'] == 'btn') {
        echo '<button class="btn" data-toggle="collapse" data-target="#' . $data['name'] . '"> '. $data['value'] .' </button>';

    } elseif($data['type'] == 'collapse') {
        echo '
            <div id="'. $data['name'] .'" class="collapse">
                ' . $data['value'] . '
            </div>
        ';
    } else {
        echo "Collapse Section Error, check your code!";
    }
    
?>