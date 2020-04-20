<?php
//$bill_url = "https://www.google.com.ng/";
$bill_url ="https://swapi.dev/api/films/";


//connect to db
    $con = mysqli_connect("localhost","root","","demo");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }
    //selecting data from the table user that are yet to be billed
    $result = mysqli_query($con,"SELECT * FROM `billings` where `status`=0");
    $userDetails = array();
    while($row_user = mysqli_fetch_assoc($result)){
        $userDetails[] = $row_user;
    }
    $user_req = array_chunk($userDetails,2,true);
    foreach($user_req as $req){
        foreach($req as $sub_req_keys => $sub_req_val){
           $url = $bill_url.$sub_req_val['id'];
            try{
                $response = file_get_contents($url);
                if($response !==false){
                    $data = json_decode(json_encode($response));
                    echo "<pre>"; print_r($data);
                    //update db
                    $id = $sub_req_val['id'];
                    $update =mysqli_query($con,"UPDATE billings SET status='1' WHERE id=$id");
                }
            }catch(Exception $e){
                //echo $e->getMessage();
                //update db
                $id = $sub_req_keys['id'];
                $update =mysqli_query($con,"UPDATE billings SET status='0' WHERE id=$id");
            }
           
        }
        echo "<hr/> Request:" .$sub_req_keys;
    }
  