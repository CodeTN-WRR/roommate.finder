<?php

class SearchStudentsApi {
    // Main method to redeem a code
    function search() {
		$obj = (object) array(array('foo' => 'bar', 'property' => 'value'), array('foo' => 'bar2', 'property' => 'value2') );
        echo json_encode($obj);
    }
}
 
// This is the first thing that gets called when this page is loaded
// Creates a new instance of the RedeemAPI class and calls the redeem method
$api = new SearchStudentsApi;
$api->search();
 
?>