<?php 


// Using default PHP curl library
$ch = curl_init('https://webtopdf.expeditedaddons.com/?api_key=H3QW2E59S8VDR0846YFAT5460NMJUGBIO7LC719XP12K3Z&content=http://tl-haisha.herokuapp.com/haisha_desp.php&margin=10&html_width=1024&title=My PDF Title');

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);


?>
