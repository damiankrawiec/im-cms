<?php if(count($data['map-array']) > 0) {

    echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=' . $setting['google-api'] . '"></script>';

    if(isset($setting['map-style']) and $setting['map-style'] != '') {

        $styles = $setting['map-style'];

    }else $styles = '[{"featureType":"all","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"gamma":0.01},{"lightness":20}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"saturation":-31},{"lightness":-33},{"weight":2},{"gamma":0.8}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#050505"}]},{"featureType":"administrative.locality","elementType":"labels.text.stroke","stylers":[{"color":"#fef3f3"},{"weight":"3.01"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#0a0a0a"},{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.stroke","stylers":[{"color":"#fffbfb"},{"weight":"3.01"},{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":30},{"saturation":30}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":20}]},{"featureType":"poi.attraction","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"lightness":20},{"saturation":-20}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":10},{"saturation":-30}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":25},{"lightness":25}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#a1a1a1"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#292929"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#202020"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"simplified"},{"hue":"#0006ff"},{"saturation":"-100"},{"lightness":"13"},{"gamma":"0.00"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#686868"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"visibility":"off"},{"color":"#8d8d8d"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#353535"},{"lightness":"6"}]},{"featureType":"road.arterial","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":"3.45"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#d0d0d0"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"lightness":"2"},{"visibility":"on"},{"color":"#999898"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#383838"}]},{"featureType":"road.local","elementType":"labels.text.stroke","stylers":[{"color":"#faf8f8"}]},{"featureType":"water","elementType":"all","stylers":[{"lightness":-20}]}];';

?>

    <script>

        let $styles = <?php echo $styles; ?>

        function initMap($object = false, $coordinates, $zoom) {

            if($object && $coordinates.indexOf(",") > -1) {

                let $coordinatesArray = $coordinates.split(",");

                let $uluru = {lat: parseFloat($coordinatesArray[0]), lng: parseFloat($coordinatesArray[1])};

                let $map = new google.maps.Map(document.getElementById($object), {zoom: $zoom, center: $uluru, styles: $styles});

                let $marker = new google.maps.Marker({position: $uluru, map: $map});

                let $popup = popup($object);

                if($popup) {

                    let $window = new google.maps.InfoWindow({
                        content: $popup
                    });

                    $window.open($map, $marker);

                    $marker.addListener("click", () => {

                        $window.open($map, $marker);

                    });


                }

            }

        }

        function popup($object) {

            if ($object) {

                let $parent = document.getElementById($object).closest('.object');

                let $popup = $parent.getElementsByClassName('map-popup')

                if($popup.length) {

                    return $popup[0].outerHTML;

                }else return false;

            }

        }

    </script>

<?php

    echo '<script>';

    $zoomMap = 10;
    if(isset($setting['zoom-map']) and $setting['zoom-map'] != '')
        $zoomMap = $setting['zoom-map'];

    foreach($data['map-array'] as $m => $map) {

        echo 'initMap("'.$m.'", "'.$map.'", '.$zoomMap.');'."\n";

    }

    echo '</script>';

}