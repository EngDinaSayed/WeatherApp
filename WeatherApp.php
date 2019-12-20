
<!DOCTYPE html>
<html>

<head>
  <style>
    h1{
    color:pink;}
  body{
    background-image:url("cool-wallpaper-desktop-hd-one-direction-your-cool-wallpaper-desktop-wallpaper-hd-one-direction-desktop-87309096.jpg");
    background-repeat:no-repeat;} 
  </style>
</head>

<body>
<form method="get" action="WeatherApp.php" >
  <h1><u> The Weather Forecast for Today </h1></u>
  City Name: <input type="text" name="city" placeholder="city"> <br/>
  <input type="submit" value="Submit">
</form>
</body>

</html>

<?php

if(isset($_GET)){

  $user_city=$_GET['city'];
  $weather_data = file_get_contents("https://api.weatherbit.io/v2.0/forecast/3hourly?city=".$user_city."&key=1ac308d7083d5ae7a8452d8369c55784");
  $json = json_decode($weather_data,true);
  
  $partofday = $json['data']['0']['pod'];
  $Weathertempcel = $json['data']['0']['weather']['app_temp'];
  $winddir = $json['data']['0']['wind_dir'];
  $pressure = $json['data']['0']['pres'];
  $sealevelpre = $json['data']['0']['slp'];

  print_r($json);


  echo "<h1 style='font-family:verdana;'> City Name: </h1>". $user_city . "<br/>";
  echo "<h1 style='font-family:verdana;'> Part of Day: </h1>" . $partofday . "<br/>";
  echo "<h1 style='font-family:verdana;'> Temperature Default Celcius: </h1>" . $Weathertempcel . "<br/>";
  echo "<h1 style='font-family:verdana;'> Wind Direction: </h1>" . $winddir. "<br/>";
  echo "<h1 style='font-family:verdana;'> Pressure: </h1>" . $pressure. "<br/>";
  echo "<h1 style='font-family:verdana;'> Sea Level Pressure: </h1>" . $sealevelpre . "<br/>";}

 ?>
