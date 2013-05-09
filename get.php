<?php
$type = ($_GET["type"]) ? $_GET["type"] : 'past' ;

if($type == 'past'){
	$url = "https://api.meetup.com/2/events?key=597d711c1a263a1546671f5c1a67d42&sign=true&group_urlname=html5-il&status=past";
}else{
	$url = "https://api.meetup.com/2/events?key=597d711c1a263a1546671f5c1a67d42&sign=true&group_urlname=html5-il&page=1&status=upcoming";
}
$curl = curl_init($url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($curl);
curl_close($curl);

echo $return;

/*echo '{"past_events":"'.$return.'","future_events":"'.$return2.'"}';*/