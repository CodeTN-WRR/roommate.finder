<?php

class AuthenticateApi {
    // Main method to redeem a code
    function login() {
		$obj = (object) array('foo' => 'bar', 'property' => 'value');
        echo json_encode($obj);
    }
}
 
// This is the first thing that gets called when this page is loaded
// Creates a new instance of the RedeemAPI class and calls the redeem method
$api = new AuthenticateApi;
$api->login();
 
?>