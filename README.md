# Get country from IP address
Recently I was creating web page which had localization for three different languages. I needed to find out the country from which a user requested my page. Based on the country I wanted to setup localization. English was default setting but in cases request was from Germany, localization should have been set to German. Other case was Slovak language in case request was send from Slovakia.
  
## ipinfo.io API
There are no ranges for IP addresses for each country. Country in which is particular IP address assigned, could change. So we have to rely on services which has access to database with metadata for particular IP. There are several servers, but I have used [ipinfo.io](ipinfo.io)

This is how you can obtain IP to work with:
```
$ip = $_SERVER['REMOTE_ADDR'];
```
## Option 1 : file_get_contents
To call ipinfo API we can use function file_get_contents. As a parameter add URL to ipinfo.io
```
$contents = file_get_contents("https://ipinfo.io/".$ip."/json");
$res = json_decode($contents, true);
$country = $res["country"];
```
However, this option requires allowed option **allow_url_fopen**. Make this option On to enable file_get_contents() work properly with url as parameter. You can edit php.ini file to manage this option.
```
allow_url_fopen = On
```

You can check this by executing phpinfo() or view php.ini file. 
```
phpinfo();
```

## Option 2 : curl
In case you are not able to edit php.ini or to use file_get_contents(), don't worry - there is second option for you. You can use cURL from php.
```
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "http://ipinfo.io/".$ip."/json");
$contents = curl_exec($ch);

```
Then you have to extract country from JSON response
```
$res = json_decode($contents, true);
$country = $res["country"];
```


