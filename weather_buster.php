<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Weather Buster</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script>
        jQuery(window).ready(function () {
            jQuery("#btnInit").click(initiate_geolocation);
        });

        function initiate_geolocation() {
            navigator.geolocation.getCurrentPosition(handle_geolocation_query, handle_errors);
        }

        function handle_errors(error) {
            switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("user did not share geolocation data");
                break;

            case error.POSITION_UNAVAILABLE:
                alert("could not detect current position");
                break;

            case error.TIMEOUT:
                alert("retrieving position timed out");
                break;

            default:
                alert("unknown error");
                break;
            }
        }

        function handle_geolocation_query(position) {
            alert('Lat: ' + position.coords.latitude +
                ' Lon: ' + position.coords.latitude);
        }
    </script>
</head>

<body>
    <?php $first_view="1"; ?>



        <FORM ENCTYPE="multipart/form-data" ACTION="" METHOD=POST>
            Weather Location:
            <input name="place" type="text" id="location">
            <input type="submit" name="Get_Weather" value="Get Weather">
        </form>

        <div>
            <button id=”btnInit”>Find my location</button>
        </div>

        <?php 
				if (isset($_POST['Get_Weather'])) { 
				unset ($first_view);
				?>
            <?php

function getWeather() {
$place=$_POST['place'];

$requestAddress = "http://www.google.com/ig/api?weather=$place&hl=en";
// Downloads weather data based on location - I used my zip code.
$xml_str = file_get_contents($requestAddress,0);
// Parses XML
$xml = new SimplexmlElement($xml_str);
// Loops XML
$count = 0;


echo '<div id="weather">';
echo '<table>';
foreach($xml->weather as $item) {
		foreach($item->forecast_conditions as $new)
		  {
			   echo '<div class="weatherIcon">';
			   echo '<td>';
			   echo '<BR><img src="http://www.google.com/' . $new->icon['data'] . '"/><br/>';
               echo $new->day_of_week['data'];
			   echo '<BR>High: ' . $new->high['data'] . '';
			   echo '<BR>Low: ' . $new->low['data'] . '';
			   echo '</td></div>';
             }
	 }
echo '</table></div>';
}
getWeather();
				}
?>


                <?php if (isset($first_view)) { 
function getWeather() {
$requestAddress = "http://www.google.com/ig/api?weather=35810'&hl=en";
// Downloads weather data based on location - I used my zip code.
$xml_str = file_get_contents($requestAddress,0);
// Parses XML
$xml = new SimplexmlElement($xml_str);
// Loops XML
$count = 0;
echo '<div id="weather">';
     foreach($xml->weather as $item) {
          foreach($item->forecast_conditions as $new) {
               echo '<div class="weatherIcon">';
               echo '<img src="http://www.google.com/' . $new->icon['data'] . '"/><br/>';
               echo $new->day_of_week['data'];
               echo '</div>';
               }
          }
echo '</div>';
}
getWeather();
}
?>

</body>

</html>