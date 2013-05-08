<?php

include ("raffle.html");


$url = "http://api.meetup.com/2/rsvps?event_id=118208822&order=event&rsvp=yes&desc=false&offset=0&format=json&only=member&page=200&fields=&sig_id=39730562&sig=151524c86e0bb23c72f69f308233ffc8366e0897&key=597d711c1a263a1546671f5c1a67d42";
$curl = curl_init($url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($curl);
curl_close($curl);
?>

<script>
    members = <?= $return ?>.results;
</script>

</body></html>