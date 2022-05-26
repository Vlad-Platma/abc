<?php
error_reporting(0);
system("clear");
banner();
while(true){
open();
}
function claim(){
include("cfg.php");
$ua = array("user-agent: $UserAgent",
"cookie: $cookie");
$url = "https://helidrops.io/coins.php";
$inn = curl($url,$ua,"get");
$one = explode('<span id="refilltimer">',$inn);
$jedaa = explode('</span>',$one[1])[0];
$one = explode(':',$jedaa);
$jeda = explode(':',$one[1])[0];
if($jedaa == "00:00:00"){
$one = explode('<input type="hidden" value="',$inn);
$rrr = explode('" id="r" name="r">',$one[3])[0];
$solve = hcptcha($ApiKey,"https://helidrops.io","391d405b-6e0c-42bf-b836-a9e7bd9de00b");
$data = "captchatype=1&h-captcha-response=".$solve."&claim=2&r=".$rrr;
$end = curl($url,$ua,"post",$data);
$one = explode('<body class="@@dashboard bodyradialstatic" onload="swalTimer(',$end);
$berhasil = explode(',4000);">',$one[1])[0];
$succ = str_replace("'","",$berhasil);
$cek = strpos($end,"Successfully claimed 5 free coins!");
echo "\033[1;37m│\033[1;32m$succ
\033[1;37m├\033[1;37m────────────────────────────────────\n";



return open();
}else{
for ($i=$jeda;$i>0;$i--){
for ($x=60;$x>0;$x--){
echo "\033[1;37m\r[00:".$i.":".$x."]next claim\r";sleep(1);
echo "\r                    \r";
}
}
sleep(3);
return claim();
}
}
function open(){
include("cfg.php");


$uag = array("user-agent: $UserAgent",
"cookie: $cookie");
$uap = array("x-requested-with: XMLHttpRequest",
"user-agent: $UserAgent",
"content-type: application/x-www-form-urlencoded; charset=UTF-8",
"cookie: $cookie");
$url = "https://helidrops.io/home.php";
$inn = curl($url,$uag,"get");
$one = explode('<span id="bottomcoins">',$inn);
$ccoins = explode('</span>',$one[1])[0];
if($ccoins == "0"){
return claim();
}
$one = explode('action: ',$inn);
$action = explode(',',$one[1])[0];
$data = "action=".$action;
$end = curl("https://helidrops.io/jax_box.php",$uap,"post",$data);
$one = explode('<font color="red">',$end);
$username = explode(' you are seeing this message because all cheating attempts will be detected and user will blacklisted</font>',$one[1])[0];
$one = explode(':::',$end);
$coin = explode(':::',$one[4])[0];
$exp = explode(':::',$one[6])[0];
$ball = explode(':::',$one[3])[0];
$reward = explode(':::',$one[2])[0];
echo "\033[1;37m│\033[1;31musername \033[1;32m: \033[1;34m".$username."
\033[1;37m│\033[1;31mexp      \033[1;32m: \033[1;34m".$exp."
\033[1;37m│\033[1;31mballance \033[1;32m: \033[1;34m$".$ball."
\033[1;37m│\033[1;31mcoins    \033[1;32m: \033[1;34m".$coin."
\033[1;37m│\033[1;31mreward   \033[1;32m: \033[1;34m".$reward."
\033[1;37m├\033[1;37m────────────────────────────────────\n";
if($coin == "0"){
return claim();
}
$ab = rand(1,10);
sleep($ab);
}
function curl($url, $headers, $mode="get", $data=0)
        {
        if ($mode == "get" || $mode == "Get" || $mode == "GET")
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($ch);
}
        elseif ($mode == "post" || $mode == "Post" || $mode == "POST")
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);
}
        else
{
$result = "Not define";
}
        return $result;
        }
function curll($url, $post = 0, $httpheader = 0, $proxy = 0){ // url, postdata, http headers, proxy, uagent
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        if($post){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if($httpheader){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        }
        if($proxy){
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        }
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
        }
    }

function hcptcha($key,$web,$sitekey){
    $ua  =["Host: api.anycaptcha.com","Content-Type: application/json"];
    $url = "https://api.anycaptcha.com";
    $data=json_encode([
        "clientKey" => $key,
        "task" => [
            "type"         => "HCaptchaTaskProxyless",
            "websiteURL"   => $web,
            "websiteKey"   => $sitekey
            ],
        ]);
    $create =json_decode(curll($url."/createTask",$data,$ua)[1],1);
    if(!$task = $create["taskId"]){
        echo "\tanycaptcha ".$create["errorCode"]."\n";return false;
    }
    $data = json_encode([
        "clientKey" => $key,
        "taskId"    => $create["taskId"]
        ]);
    while(true):
    echo "wait for result....!";
    $solve=json_decode(curll($url."/getTaskResult",$data,$ua)[1],1);
    echo "\r                                           \r";
    if($solve["status"] == "processing"){
        echo "processing bypass recaptcha";
        sleep(7);
        echo "\r                                        \r";
        continue;}
        return $solve["solution"]["gRecaptchaResponse"];
    endwhile;
}
function banner(){
$sc_name = "helidrops.io";
$sc_version = "1.0";
$banner =
 "\033[1;37m┌\033[1;37m───────────────\033[1;35m•\033[1;32m◥\033[1;33mೋೋ\033[1;32m◤\033[1;35m•\033[1;37m───────────────\033[1;37m┐
\033[1;37m│\033[1;36m╦╔═╦ ╦╔═╗═╗ ╦  ╔═╗╦ ╦╔═╗╔╗╔╔╗╔╔═╗╦  \033[1;37m│
\033[1;37m│\033[1;32m╠╩╗╠═╣╚═╗╔╩╦╝  ║  ╠═╣╠═╣║║║║║║║╣ ║  \033[1;37m│
\033[1;37m│\033[1;36m╩ ╩╩ ╩╚═╝╩ ╚═  ╚═╝╩ ╩╩ ╩╝╚╝╝╚╝╚═╝╩═╝\033[1;37m│
\033[1;37m├\033[1;37m────────────────────────────────────\033[1;37m┘
\033[1;37m│              \033[1;34m[\033[1;33mINFO\033[1;34m]
\033[1;37m│\033[1;31m[\033[1;37mScript : \033[1;32m$sc_name\033[1;31m]
\033[1;37m│\033[1;31m[\033[1;37mScript By : \033[1;32mAga katoroik\033[0;31m[\033[1;32mKhsx\033[0;31m]\033[1;31m]
\033[1;37m│\033[1;31m[\033[1;37mChannel : \033[1;32mKhsx channel\033[1;31m]
\033[1;37m│\033[1;31m[\033[1;37mScript Version : \033[1;32m$sc_version\033[1;31m]
\033[1;37m│\033[1;31m[\033[1;37mDate : \033[1;32m".date("Y-m-d")."\033[1;31m]
\033[1;37m│\033[1;31m[\033[1;37mTelegram : \033[1;32m@OwlCamp\033[1;37m\033[1;31m]
\033[1;37m├\033[1;37m────────────────────────────────────┘\n";

echo $banner;}
?>
