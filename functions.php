<?php

function liqpay($public_key,$private_key,$version="3",$action="pay",$article,$order_id){

//data
    $json_string_array = array(
        'public_key' =>$public_key,
        'version' => $version,
        'action' => $action,
        'amount' => $article->price_pdf,
        'currency' => 'UAH',
        'description' => $article->title,
        'order_id' => $order_id
    );
    //json string
    // {"public_key":"i81205308458","version":"3","action":"pay","amount":"3","currency":"UAH","description":"test","order_id":"000001"}
    $json_string = json_encode($json_string_array);

    $data = base64_encode($json_string);
    $sign_string = $private_key;
    $sign_string .= $data;
    $sign_string .= $private_key;
    $signature = base64_encode(sha1($sign_string, true));
    $liqpay = array($data, $signature);
return $liqpay;
}
/* timout session*/
 function timeOutSession($time_out){

    $time = $_SERVER['REQUEST_TIME'];

    /**
     * for a 30 minute timeout, specified in seconds
     */
    $timeout_duration = $time_out;

    /**
     * Here we look for the user's LAST_ACTIVITY timestamp. If
     * it's set and indicates our $timeout_duration has passed,
     * blow away any previous $_SESSION data and start a new one.
     */
    if (isset($_SESSION['LAST_ACTIVITY']) &&
        ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        session_unset();
        session_destroy();
        session_start();
    }

    /**
     * Finally, update LAST_ACTIVITY so that our timeout
     * is based on it and not the user's login time.
     */
    $_SESSION['LAST_ACTIVITY'] = $time;
}
