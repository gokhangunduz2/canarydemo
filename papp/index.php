<?php
echo "<style>body {background-color:black; color:white;} </style>";

echo "VERSION: " . getenv("APP_VERSION");

?>

const lat = 58.7984;
const lng = 17.8081;
const params = 'windSpeed';

<script>
fetch(`https://api.stormglass.io/v2/weather/point?lat=${lat}&lng=${lng}&params=${params}`, {
  headers: {
    'Authorization': '993b2342-2dc8-11f1-beac-0242ac120004-993b2400-2dc8-11f1-beac-0242ac120004'
  }
}).then((response) => response.json()).then((jsonData) => {
  // Do something with response data.
  console.log(jsonData)
});
</script>
