<?php

$ip = $_SERVER['REMOTE_ADDR'];
echo "request IP: ".$ip;

$contents = file_get_contents("https://ipinfo.io/18.184.45.226/json");
$res = json_decode($contents, true);
$country = $res["country"];

if ($country == "SK") {
    echo "<br>Setup Slovak language";
} else {
    echo "<br>Setup English language";
}

?>