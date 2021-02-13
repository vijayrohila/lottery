<?php header("Content-Type: text/html; charset=utf-8");?>
<!DOCTYPE html>
<html>
<head>
<style>
table.blueTable {
	border: 1px solid #1C6EA4;
	background-color: #EEEEEE;
	width: 50%;
	text-align: left;
	border-collapse: collapse;
}

table.blueTable td, table.blueTable th {
	border: 1px solid #AAAAAA;
	padding: 3px 2px;
}

table.blueTable tbody td {
	font-size: 13px;
}

table.blueTable tr:nth-child(even) {
	background: #D0E4F5;
}

table.blueTable thead {
	background: #1C6EA4;
	background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
	background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
	background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
	border-bottom: 2px solid #444444;
}

table.blueTable thead th {
	font-size: 15px;
	font-weight: bold;
	color: #FFFFFF;
	border-left: 2px solid #D0E4F5;
}

table.blueTable thead th:first-child {
	border-left: none;
}

table.blueTable tfoot {
	font-size: 14px;
	font-weight: bold;
	color: #FFFFFF;
	background: #D0E4F5;
	background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
	background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
	background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
	border-top: 2px solid #444444;
}

table.blueTable tfoot td {
	font-size: 14px;
}

table.blueTable tfoot .links {
	text-align: right;
}

table.blueTable tfoot .links a {
	display: inline-block;
	background: #1C6EA4;
	color: #FFFFFF;
	padding: 2px 8px;
	border-radius: 5px;
}
</style>
</head>
<body>
	
	<?php

	
	// https://dev.twitch.tv/docs/api/reference
$clientId = "wcn9vn60ropcq49jo4l7lrv2ymjsme";
$clientSecret = "7vtbvtu0cl5505f0ptjg6ide7bnuvf";

// twitch.tv/wuestenigel
$wuestenigelId = "204176068";

// getting my follower
$url = "https://api.twitch.tv/helix/users/follows?to_id=$wuestenigelId";

$data = returnTwitch($url, $clientId, $clientSecret);
print_r($data);
die('check1');



$url = "https://api.twitch.tv/helix/users?login=Perzivalgames";
$data = returnTwitch($url, $clientId, $clientSecret);
// getting userID of https://www.twitch.tv/perzivalgames
$userIdToFollow = $data->data[0]->id;


$url = "https://api.twitch.tv/helix/users/follows?from_id=$wuestenigelId&to_id=$userIdToFollow";


$data = returnTwitch($url, $clientId, $clientSecret);



echo "<hr>";

echo $url. "<br>WHY EMPTY?";
// https://dev.twitch.tv/docs/api/reference#create-user-follows
// WHY EMPTY RESPONSE?
print_r($data);

function returnTwitch($url, $clientid, $clientsecret)
{
    $cho = curl_init('https://id.twitch.tv/oauth2/token');
    curl_setopt($cho, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($cho, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($cho, CURLOPT_POST, 1);
    $fields = array(
        'client_id' => $clientid,
        'client_secret' => $clientsecret,
        'grant_type' => 'client_credentials',
        'token_type' => 'bearer',
        'state' => $_GET['state']
    );
    curl_setopt($cho, CURLOPT_POSTFIELDS, $fields);
    $output = curl_exec($cho);
    $oauth = json_decode($output, true);
    $token = $oauth['access_token'];
    $ch = curl_init();
    $headers = [
        'Client-ID: ' . $clientid,
        'Authorization: Bearer ' . $token
    ];
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    curl_close($ch);
    $res = json_decode($result);
    return $res;
}

?>
</body>
</html>
