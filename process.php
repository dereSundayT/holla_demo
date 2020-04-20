<?php
try{
    //$ip =$_GET['ip'];
    $client_id ='d0bbd19ec70416571dda';
    $client_secret = '4aa97fa4aeba86dc22a89c76743546ba73d3a2e0';
    //$url ="https://api.github.com/search/users?q=dereSunday&client_id=".$client_id.'&client_secret='.$client_secret;
    $url = "https://api.github.com/search/users?q=dereSunday&client_id=d0bbd19ec70416571dda&client_secret=4aa97fa4aeba86dc22a89c76743546ba73d3a2e0";
    $response = file_get_contents($url);
    if($response !==false){
        echo $response;
    }
}catch(Exception $e){
    echo $e->getMessage();
}

?>