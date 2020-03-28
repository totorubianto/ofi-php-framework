<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $status ?> Error - <?php echo PROJECTNAME ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE ?>/assets/css/bootstrap.min.css">

    <style>
        body {
            margin: 0px !important;
        }

        html, body {
            overflow: hidden !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid text-center d-flex justify-content-center align-items-center" style="height: 100vh;">
        
        <div>
            <h1 class="display-2"><?php echo $status ?> <?php echo $title ?></h1>
            <p>
                <?php echo $msg ?>
            </p>

            <br>

            <a onclick="window.history.back();" href="#">
                <button class="btn btn-light border w-50">Go Back</button>
            </a>
        </div>
        
    </div>
</body>
</html>