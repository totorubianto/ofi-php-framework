<form class="form-group" action="<?php echo $data['url'] ?>" enctype="multipart/form-data" method="<?php echo $method ?>">
    <?php for ($i = 1; $i <= count($data['input']); $i++) { ?>
        <?php $a = $i - 1; ?>

        <?php if (!strtolower($data['input'][$a]['input'])) { ?>
        
        <small><?php echo ucwords($data['input'][$a]['name']) ?></small>
        <input 
            <?php
                if ($data['input'][$a]['required'] == 'yes' || !$data['input'][$a]['required']) {
                    echo 'required';
                }
            ?>
        type="<?php if (!$data['input'][$a]['type']) {
                echo 'text';
            } else {
                echo strtolower($data['input'][$a]['type']);
            }?>"   
            name="<?php echo strtolower(str_replace(' ', '', $data['input'][$a]['name'])) ?>"
            class="form-control mb-2"
        >

        <?php } elseif (strtolower($data['input'][$a]['input']) == 'select') { ?>

            <small><?php echo ucwords($data['input'][$a]['name']) ?></small>
            <select 

            <?php
                if ($data['input'][$a]['required'] == 'yes' || !$data['input'][$a]['required']) {
                    echo 'required';
                }
            ?>
            
            class="custom-select mb-2" name="<?php echo strtolower(str_replace(' ', '', $data['input'][$a]['name'])) ?>">
            <option disabled selected value="">Select a Value</option>
                <?php
                    $o = 1;
                    while ($o <= count($data['input'][$a]['option'])) {
                        echo '<option value="'.$data['input'][$a]['option'][$o - 1]['value'].'">'.ucwords($data['input'][$a]['option'][$o - 1]['text']).'</option>';
                        $o++;
                    }
                ?>
            </select>

        <?php } elseif (strtolower($data['input'][$a]['input']) == 'textarea') { ?>

            <small><?php echo ucwords($data['input'][$a]['name']) ?></small>
            <textarea  class="form-control mb-2"
                <?php
                    if ($data['input'][$a]['required'] == 'yes' || !$data['input'][$a]['required']) {
                        echo 'required';
                    }
                ?>
            name="<?php echo strtolower(str_replace(' ', '', $data['input'][$a]['name'])) ?>" rows="4"></textarea>

        <?php } ?>
        
    <?php } ?>
    
    <button class="btn mt-3 btn-success" type="submit"> <?php echo $data['submit'] ?> </button>
</form>
