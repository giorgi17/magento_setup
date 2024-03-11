<?php
$baseUrl = 'https://magento.test/';

//// Get authorization token
//$token = $request->integrationAdminTokenServiceV1CreateAdminAccessToken([
//    'username' => '',
//    'password' => '<YOUR_PASSWORD>'
//]);

$token = 'pk6h4ryh2n506y3q7yg5gmn6bio65etr';

$opts = [
    'https' => [
        'header' => 'Authorization: Bearer ' . $token
    ]
];
$context = stream_context_create($opts);

// Disable SSL verification (for testing purposes only)
$options = [
    'stream_context' => $context,
//    'cache_wsdl' => WSDL_CACHE_NONE,
//    'ssl' => [
//        'verify_peer' => false,
//        'verify_peer_name' => false,
//        'allow_self_signed' => true
//    ]
];

// Init SOAP client
//$soapClient = new SoapClient(
//    "{$baseUrl}soap/default?services=customerCustomerRepositoryV1",
//    ['stream_context' => $context]
//);

$soapClient = new SoapClient(
    "{$baseUrl}soap/default?wsdl&services=customerAccountManagementV1",
    ['stream_context' => $context]
);


$result = $soapClient->customerCustomerRepositoryV1GetById(['customerId' => 126]);

var_dump($result);
