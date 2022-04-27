<?php

$TOKEN = "5341869290:AAFAH-BDf9VWbUhDu9CKGAhykzUK4KklQg0";


$headers = array(
"Host: app.oneaset.co.id",
"Connection: keep-alive",
"Accept: application/json, text/plain, */*",
"countryId: 1",
"User-Agent: Mozilla/5.0 Version/4.0 Chrome/94.0.4606.71 Mobile Safari/537.36",
"languageId: 123",
);
$url = "https://app.oneaset.co.id/api/app/biz/activity/master/user/task/list?activityId=2";
$res = curl($url,$headers,"get");
$js = json_decode($res,true);
$name = $js["data"]["5"]["redEnvelopeVO"]["nameId"];
$stock = $js["data"]["5"]["redEnvelopeVO"]["remainNum"];
echo "[<>] NAME => $name\n";
if($stock == "1" | $stock == "0" ){
echo "[<>] STOCK => ABIS\n";
}else{
echo "[<>] STOCK => $stock\n";



$chatid = "5054751641";
$pesan = "$stock";
$method = "sendMessage";
$url = "https://api.telegram.org/bot" . $TOKEN . "/". $method;	$post = [ 		'chat_id' => $chatid, 'text' => $pesan 	]; $header = [ "X-Requested-With: XMLHttpRequest", "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" ]; $ch = curl_init(); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_HTTPHEADER, $header); curl_setopt($ch, CURLOPT_POSTFIELDS, $post ); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); $datas = curl_exec($ch); $error = curl_error($ch); $status = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch); $debug['text'] = $pesan; $debug['respon'] = json_decode($datas, true);




}





function curl($url, $header, $mode="get", $data=0)
	{
	if ($mode == "get" || $mode == "Get" || $mode == "GET")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);
		}
		elseif ($mode == "poss" || $mode == "Poss" || $mode == "POSS")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_HEADER, true);
		$result = curl_exec($ch);
		}
	elseif ($mode == "post" || $mode == "Post" || $mode == "POST")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);
		}
	elseif ($mode == "patch" || $mode == "PATCH" || $mode == "Patch")
	   {
		$ch = curl_init($url);
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
         $result = curl_exec($ch);
		}
		elseif ($mode == "options" || $mode == "Options" || $mode == "OPTIONS")
		{
		$ch = curl_init($url);
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'OPTIONS');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
         $result = curl_exec($ch);
		}
		else
		{
		$result = "Not define";
		}
	return $result;
	}



?>