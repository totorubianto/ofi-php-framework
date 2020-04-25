
<style>
.bingkai{width:auto;writing-mode:vertical-rl;text-orientation:upright;position:fixed;text-align:center;z-index:9999999999999999;bottom:0;padding-bottom:16px;cursor:pointer;margin-bottom:-190px;animation-duration:.4s;left:4%;transition:.4s;}.bingkai img{margin-bottom:-9px}.bingkai:hover{margin-bottom:0!important}
#kontenDebugger{position:fixed;z-index:99999999999999999;background-color:#fff;top:0;left:0;right:0;bottom:0}#menuDebuggerItem,#menuDebuggerItem td,#menuDebuggerItem tr{padding-top:10px;padding-bottom:10px;margin-bottom:0;text-align:center;}
#menuDebuggerItem a {text-decoration: none !important; color: #17a2b8;}
</style>

<!-- Bingkai Debugger -->
<div id="bingkaiDebugger" class="bingkai bg-info text-light">
    <img width="auto" class="border" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAXVBMVEU/wck7qrGXl5fL29w9ucHv8PDX3d319fU7sbg/vcXj6ek4oafz8/Onp6eurq621dfKysrX5eViur+Ftbefn5+yt7ecwsQ2lpuMjIx8zdJQr7Sf1NiPj49LuL9GlJlGooI5AAAA6UlEQVQ4y7WT2XLDIAxFhc0igWy8xHaWtv//mRXO9MnImcmkMOjpaL9AeHHgw4B7xDPAzd9Ic1QBzgQIYFY1QiYiawGmUYkwGwBAMXSLFSDfyRhCI1kEGQ/AiPbpvgPQHgAPZksW5RqrAOJLWykjGQ2wCaQLS6gApcW/MqqAICkRYomkAMV3k0c//gDEaQeISqZHbVBuvcsiyhTSquzCzwSyDENZ1YO/7dPIJ4pqJ5zaM8mxW9y5JlmTXLc0Q+iGEJo+XDoxB6C/+CcQCxBfyZ4rwMBOjhj2XC2y5+Xrem2anhv+v6/3DvALsoQcHsKElYgAAAAASUVORK5CYII=" alt="">
    Debugger
</div>

<!-- Konten debugger -->
<div class="container-fluid" id="kontenDebugger">
    <header id="headerDebugger" class="bg-info fixed-top container-fluid p-0">
        <div class="container-fluid py-2 text-light">
            <div class="row">
                <div class="col">
                    <h5><?= PROJECTNAME ?></h5>
                </div>
                <div class="col hide-sm text-right">
                    <h5>Debugger Tools</h5>
                </div>
            </div>
        </div>
    </header>

    

    <div id="kontenDebuger" style="margin-top: 50px; overflow-y: auto !important; height: 86%;" class="py-3">
    <div class="py-2" style="z-index: -99; position: absolute;">
        Please select one of the menus below to display the results here
    </div>

        <div id="serverInfo" class="collapse">
            <h5 class="text-info">Server Information</h5>
            <div class="table-responsive mt-3">
                <table class="table table-striped">
                    <?php foreach ($_SERVER as $key => $value) { ?>
                        <tr>
                            <td><?= $key ?></td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div id="RouteInfo" class="collapse container-fluid">
            <?php 
                include PROJECTPATH . '\App\route\web.php';
            ?>

            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <h5 class="text-info">Your Application Routes</h5>
                </div>

                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <?php for ($i=0; $i < count($route) ; $i++) { ?>
                                <tr>
                                    <td>
                                        <div>Url : <a class="text-decoration-none text-info" href="<?= PROJECTURL ?><?php echo $route[$i]['url']?>"><?= PROJECTURL ?><?php echo $route[$i]['url']?></a></div>
                                        <div>
                                            Type : 
                                            <?php 
                                                if($route[$i]['type'] == '') {
                                                    echo "<code>Invalid type!</code>";
                                                } else {
                                                    echo $route[$i]['type'];
                                                }
                                            ?>
                                        </div>
                                        <div>
                                            To : 
                                            <?php 
                                                if($route[$i]['to'] != '') {
                                                    if(strtolower($route[$i]['type']) == 'controller') {
                                                        echo 'App\Controllers\\' . $route[$i]['to'];
                                                    } else if(strtolower($route[$i]['type']) != 'controller' || strtolower($route[$i]['type']) == '') {
                                                        echo $route[$i]['to'];
                                                    }
                                                } else {
                                                    echo "<code>Invalid direction!</code>";
                                                }
                                            ?>
                                        </div>
                                    </td>

                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>            
        </div>

        <div id="HeaderRequest" class="collapse container-fluid">
            <h5 class="text-info">Header Request Information</h5>
            <table class="table table-striped">
                <?php foreach (getallheaders() as $name => $value) { ?>
                    <tr>
                        <td>
                            <?= $name ?>
                        </td>
                        <td> <?= $value ?> </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div id="PHPInformation" class="collapse container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-12">
                    <h5 class="text-info">Your PHP Information</h5>
                </div>

                <div class="col">
                    <table class="table table-striped">
                        <tr>    
                            <td>
                                CGI
                            </td>
                            <td>
                                <?php 
                                    $sapi_type = php_sapi_name();
                                    if (substr($sapi_type, 0, 3) == 'cgi') {
                                        echo "You are using CGI PHP\n";
                                    } else {
                                        echo "You are not using CGI PHP\n";
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Zend engine version (Php Version)
                            </td>
                            <td> <?= phpversion() ?> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div id="Database" class="collapse container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-12">
                    <?php include PROJECTPATH . '\config.php'; ?>
                    <?php 
                        use App\Core\model; $database_cek = new Model(); 
                    ?>
                    <h5 class="text-info">Your Database Configuration</h5>
                </div>

                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td>Host</td>
                                <td> <?= $config['host'] ?> </td>
                            </tr>

                            <tr>
                                <td>Database Name</td>
                                <td> <?= $config['dbname'] ?> </td>
                            </tr>

                            <tr>
                                <td>Database Username</td>
                                <td> <?= $config['user'] ?> </td>
                            </tr>

                            <tr>
                                <td>Database Password</td>
                                <td> <?= $config['password'] ?> </td>
                            </tr>

                            <tr>
                                <td>Database Status</td>
                                <td> 
                                        <?php 
                                            if($database_cek->db->connect_errno == 0 && $database_cek->db->connect_error == '') {
                                                echo "The database are connected";
                                            } else {
                                                echo $database_err_msg = '#' . $database_cek->db->connect_errno . ' - ' . $database_cek->db->connect_error; ?>        
                                                <br>
                                                <a target="_blank" href="https://www.google.com/search?q=<?php echo rawurlencode($database_err_msg) ?>">Search in google</a> - 
                                                <a target="_blank" href="https://stackoverflow.com/search?q=<?php echo rawurlencode($database_err_msg) ?>">Search in stackoverflow</a> -
                                                <a target="_blank" href="https://duckduckgo.com/?q=<?php echo rawurlencode($database_err_msg) ?>">Search in duck duck go</a>
                                           <?php } ?>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="Loadedextension" class="collapse container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <h5 class="text-info">Loaded Database extension </h5>
                </div>

                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Extension Name</th>
                            </tr>
                            <?php foreach(get_loaded_extensions() as $key => $value) { ?>
                                <tr>
                                    <td> <?= $key + 1 ?> </td>
                                    <td>
                                        <?= $value ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 45px;"></div>

    <div class="fixed-bottom">
        <div class="table-responsive">
            <table id="menuDebuggerItem" class="table bg-light">
                    <tr>
                        <td>
                            <a class="closeDebugger" href="#">Close Debugger</a>
                        </td>
                        <td>
                            <a class="serverInfo" href="#">Server Information</a>
                        </td>
                        <td>
                            <a class="RouteInfo" href="#">Route</a>
                        </td>
                        <td>
                            <a class="HeaderRequest" href="#">Header Request</a>
                        </td>
                        <td>
                            <a class="PHPInformation" href="#">PHP Information</a>
                        </td>
                        <td>
                            <a class="Database" href="#">Database</a>
                        </td>
                        <td>
                            <a class="Loadedextension" href="#">Loaded extension</a>
                        </td>
                    </tr>
            </table>
        </div>
    </div>
</div>

<script>
    $('#kontenDebugger').hide();$('#kontenDebuger .collapse').addClass('bg-light');$("#menuDebuggerItem td").addClass("border-right"),$("#menuDebuggerItem td").css("cursor","pointer"),$("#bingkaiDebugger").click(function(){$("#kontenDebugger").fadeIn(),$("body").css("overflow","hidden")}),$("#serverInfo").hide(),$("#RouteInfo").hide(),$("#HeaderRequest").hide(),$("#PHPInformation").hide(),$("#Database").hide(),$("#Loadedextension").hide(),$("#menuDebuggerItem .serverInfo").click(function(){$("#serverInfo").fadeToggle(),$("#RouteInfo").hide(),$("#HeaderRequest").hide(),$("#PHPInformation").hide(),$("#Database").hide(),$("#Loadedextension").hide()}),$("#menuDebuggerItem .RouteInfo").click(function(){$("#serverInfo").hide(),$("#RouteInfo").slideToggle(),$("#HeaderRequest").hide(),$("#PHPInformation").hide(),$("#Database").hide(),$("#Loadedextension").hide()}),$("#menuDebuggerItem .HeaderRequest").click(function(){$("#serverInfo").hide(),$("#RouteInfo").hide(),$("#HeaderRequest").slideToggle(),$("#PHPInformation").hide(),$("#Database").hide(),$("#Loadedextension").hide()}),$("#menuDebuggerItem .PHPInformation").click(function(){$("#serverInfo").hide(),$("#RouteInfo").hide(),$("#HeaderRequest").hide(),$("#PHPInformation").slideToggle(),$("#Database").hide(),$("#Loadedextension").hide()}),$("#menuDebuggerItem .Database").click(function(){$("#serverInfo").hide(),$("#RouteInfo").hide(),$("#HeaderRequest").hide(),$("#PHPInformation").hide(),$("#Database").slideToggle(),$("#Loadedextension").hide()}),$("#menuDebuggerItem .Loadedextension").click(function(){$("#serverInfo").hide(),$("#RouteInfo").hide(),$("#HeaderRequest").hide(),$("#PHPInformation").hide(),$("#Database").hide(),$("#Loadedextension").slideToggle()});$('.closeDebugger').click(function() {$('#kontenDebugger').hide();$('body').css('overflow', 'auto');});
</script>