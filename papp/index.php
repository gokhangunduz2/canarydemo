<?php

echo "<style>body {background-color:black; color:white;} </style>";

echo "VERSION: " . getenv("APP_VERSION");

?>


<script>
const lat = 41.00958937064345;
const lng = 28.9776264472511;
const params = 'airTemperature';

fetch(`https://api.stormglass.io/v2/weather/point?lat=${lat}&lng=${lng}&params=${params}`, {
  headers: {
    'Authorization': '993b2342-2dc8-11f1-beac-0242ac120004-993b2400-2dc8-11f1-beac-0242ac120004'
  }
})
.then((response) => response.json())
.then((data) => {

  const now = new Date();

  let closest = null;
  let minDiff = Infinity;

  data.hours.forEach(item => {
    const itemTime = new Date(item.time);

    const diff = Math.abs(itemTime - now);

    if (diff < minDiff) {
      minDiff = diff;
      closest = item;
    }
  });

  const temp = closest.airTemperature.noaa;

  console.log("Şu anki sıcaklık:", temp);

});
</script>
