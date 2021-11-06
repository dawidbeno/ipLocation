<?php

$ip = $_SERVER['REMOTE_ADDR'];
echo "request IP: ".$ip;

$contents = file_get_contents("https://ipinfo.io/".$ip."/json");
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