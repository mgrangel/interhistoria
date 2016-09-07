<?php

$curl = curl_init();
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                                                                  
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data))                                                                       
);
curl_setopt($curl, CURLOPT_URL, 'http://webservice.local/');  // Set the url path we want to call
$result = curl_exec($curl);

//see the results
$json=json_decode($result,true);
curl_close($curl);
print_r($json);

?>