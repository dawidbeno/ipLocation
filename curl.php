<?php

$ip = $_SERVER['REMOTE_ADDR'];
echo "request IP: ".$ip;

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "http://ipinfo.io/".$ip."/json");
$contents = curl_exec($ch);
echo "<br>Content from API call: ".$contents;

$res = json_decode($contents, true);
$country = $res["country"];

if ($country == "SK") {
    echo "Setup Slovak language";
} else if ($country == "DE"){
    echo "Setup German language";
} else {
    echo "Setup English language";
}

?>