<?php
function getWeather() {
$requestAddress = "http://www.google.com/ig/api?weather=35805'&hl=en";
// Downloads weather data based on location - I used my zip code.
$xml_str = file_get_contents($requestAddress,0);
// Parses XML
$xml = new SimplexmlElement($xml_str);
// Loops XML
$count = 0;
     foreach($xml->weather as $item) {
          foreach($item->forecast_conditions as $new) {
               echo '<div class="weatherIcon">';
               echo '<img src="http://www.google.com/' . $new->icon['data'] . '"/><br/>';
               echo $new->day_of_week['data'];
               echo '</div>';
               }
          }
}
getWeather();

?>