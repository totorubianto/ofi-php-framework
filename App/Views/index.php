<?php 
    $design->header(array(
        'title' => true,
        'theme' => 'white', // white or dark
        'float' => 'right',
        'menu' => [
            [
                'name' => "Contact Me",
                'url' => "mailto:teguhrijanandi02@gmail.com"
            ],
        ],        
    ));  
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.12.2/mapbox-gl.css' rel='stylesheet' />
<style>
#map {
  height: 370px
}
</style>

<script>
var lokasi = [
  113.9213, // Long
  -0.7893 // Lat
];
</script>

<br>
<div class="container-fluid">
    <div class="container">

        <div id='map'></div>

        <br>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-body text-light bg-info">
                        <strong>
                            <div class="float-left">Positif</div>
                        <div class="float-right">
                            <?php echo $indo['positif'] ?>
                        </div>
                        </strong>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-body text-light bg-success">
                        <strong>
                            <div class="float-left">
                                Sembuh
                            </div>
                            <div class="float-right">
                                <?php echo $indo['sembuh'] ?>
                            </div>
                        </strong>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card bg-danger text-light">
                    <div class="card-body">
                        <strong>
                            <div class="float-left">
                                Meninggal
                            </div>
    
                            <div class="float-right">
                                <?php echo $indo['meninggal'] ?>
                            </div>
                        </strong>
                    </div>
                </div>
            </div>
            
        </div>

        <br>

        <input id="cari" class="form-control mb-2" placeholder="Cari Negara" type="text">

        <div style="height: 700px; overflow: scroll" class="table-resposnive ">
            <table class="table">
                <tr>
                    <td>No</td>
                    <td>Negara</td>
                    <td>
                        Kasus Terdeteksi
                    </td>
                    <td>Sembuh</td>
                    <td>Aktif</td>
                    <td>
                        Meninggal
                    </td>
                    <td>
                        Lihat
                    </td>
                </tr>

                <tbody id="konten">
                    <?php for ($i=0; $i <= count($all) ; $i++) { ?>
                        <tr>
                            <td><?php echo $i + 1 ?></td>
                            <td>
                                <?php echo $all[$i]['attributes']['Country_Region'] ?>
                            </td>
                            <td>
                                <?php echo $all[$i]['attributes']['Confirmed'] ?>
                            </td>
                            <td>
                                <?php echo $all[$i]['attributes']['Recovered'] ?>
                            </td>
                            <td>
                                <?php echo $all[$i]['attributes']['Active'] ?>
                            </td>
                            <td>
                                <?php echo $all[$i]['attributes']['Deaths'] ?>
                            </td>
                            <td>
                                <button id="btn<?php echo $i ?>" class="btn btn-sm border btn-light"> <small><i class="fas fa-sm fa-search"></i></small> </button>

                                <script>
                                    $('#btn<?php echo $i ?>').on('click', function() {
                                        var map = new mapboxgl.Map({
                                            container: 'map',
                                            style: 'mapbox://styles/mapbox/streets-v8',
                                            center: [
                                                <?php echo $all[$i]['attributes']['Long_'] ?>, // Long
                                                <?php echo $all[$i]['attributes']['Lat'] ?> // Lat
                                            ],
                                            zoom: 3
                                        });
                                        $('html,body').animate({ scrollTop: 0 }, 'slow'); return false;
                                    });
                                </script>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <br>
    </div>
</div>
<script>
    $(document).ready(function(){
      $("#cari").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#konten tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>

<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.12.2/mapbox-gl.js'></script>
<script>


mapboxgl.accessToken = 'pk.eyJ1IjoidGVndWgwMiIsImEiOiJjazMycmoycTIwZml6M2xtbXlqdHhidWhnIn0.qx-WIcq_BfBmQer8S-Vpeg';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v8',
    center: lokasi,
    zoom: 3
});

var framesPerSecond = 15; 
var initialOpacity = 1
var opacity = initialOpacity;
var initialRadius = 6;
var radius = initialRadius;
var maxRadius = 18;

map.on('load', function () {

    // Add a source and layer displaying a point which will be animated in a circle.
    map.addSource('point', {
        "type": "geojson",
        "data": {
            "type": "Point",
            "coordinates": [
                0, 0
            ]
        }
    });

    map.addLayer({
        "id": "point",
        "source": "point",
        "type": "circle",
        "paint": {
            "circle-radius": initialRadius,
            "circle-radius-transition": {duration: 0},
            "circle-opacity-transition": {duration: 0},
            "circle-color": "#007cbf"
        }
    });

    map.addLayer({
        "id": "point1",
        "source": "point",
        "type": "circle",
        "paint": {
            "circle-radius": initialRadius,
            "circle-color": "#007cbf"
        }
    });


    function animateMarker(timestamp) {
        setTimeout(function(){
            requestAnimationFrame(animateMarker);

            radius += (maxRadius - radius) / framesPerSecond;
            opacity -= ( .9 / framesPerSecond );

            map.setPaintProperty('point', 'circle-radius', radius);
            map.setPaintProperty('point', 'circle-opacity', opacity);

            if (opacity <= 0) {
                radius = initialRadius;
                opacity = initialOpacity;
            } 

        }, 1000 / framesPerSecond);
        
    }

    // Start the animation.
    animateMarker(0);
});
</script>