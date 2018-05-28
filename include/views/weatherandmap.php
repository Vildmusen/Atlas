<?php

// if(isset($_GET['c_id'])){
// 
        // $c_id = $_GET['c_id'];
        // $city = getcity($c_id);
        // $city = $city['city'];
        
        echo '         
                <div id="google_wrapper">   
                        <div id="show_map" onclick="show_map()"><div id="arrow_right"></div><p>Karta</p></div>    
                        <div id="googleMap">
                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9ufJ7Qk6fZyZkU8SWD1HOd4nCPnwexbI&callback=myMap"></script>
                        </div>
                </div>
                
                <div id="weather_wrapper">
                        <div id="show_weather" onclick="show_weather()"><div id="arrow_left"></div><p>Väder</p></div>
                        <a class="weatherwidget-io" href="https://forecast7.com/en/59d8617d64/uppsala/" data-label_1="UPPSALA" data-label_2="Väder" data-theme="original" ></a>
                </div>';
// }
?>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
