<?php 
    if ($data['type'] == 'btn') {
        echo '<button class="btn" data-toggle="collapse" data-target="#' . $data['name'] . '"> '. $data['value'] .' </button>';

    } elseif($data['type'] == 'link') {

        echo "<a data-toggle='collapse' data-target='#" . $data['name'] . "' class='text-dark text-decoration-none' href='#" . $data['name'] . "'>" . $data['value'] . "</a>" ;

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