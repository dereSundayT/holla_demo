<?php
$bill_url = '';
//connect to db
    $con = mysqli_connect("localhost","root","","demo");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }
    //selecting data from the table user
    $result = mysqli_query($con,"SELECT * FROM `billings`");
    $userDetails = array();
    while($row_user = mysqli_fetch_assoc($result)){
        $userDetails[] = $row_user;
    }
    //echo '<pre>'; print_r( json_decode(json_encode($userDetails)));
    //die();
    //$userDetails =  json_decode(json_encode($userDetails));
    $user_req = array_chunk($userDetails,2);
    foreach($user_req as $req){
        foreach($req as $sub_req_keys => $sub_req_val){
            $url = 'tolu.com'. $sub_req_val['amount_to_bill'];
            echo $url;
        }
    }
  