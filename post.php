<?php
error_reporting(0);
require_once 'XML/RPC2/Client.php'; 

$email = "someone@whoiusedto.know";
$email = $_POST[email];
try
{
    $client = XML_RPC2_Client::create("http://api.benchmarkemail.com/1.3/");
    $token = $client->login("user", "pass");

    $listID = "123abc"; 

    $rec1['email'] = $email;
    $rec = array($rec1);

    $result = $client->listAddContacts($token, $listID, $rec);
} catch (XML_RPC2_FaultException $e){
    $er = "ERROR:" . $e->getFaultString() ."(" . $e->getFaultCode(). ")";
}


?>
