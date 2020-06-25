<?php
//require("")
//include 'AutoLoaderIncl.php';
require_once "mollie/vendor/autoload.php"; 
session_start();
$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
 $name = $POST['Name'];
 $email = $POST['email'];
 $comments = $POST['comments'];
 $price = $POST['selectboxProducts'];
 $products = "";
 if ($price == 100) {
     $products = "Build Website";
 }
 else{
     $products = "Build Application";
 }
 $price .= ".00";
 $_SESSION['product'] = $products;
 $_SESSION['price'] = $price; 

 try {
    $payment = $mollie->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => "$price"
        ],
        "description" => "Payment from Prins Web",
        "redirectUrl" => "http://622796.infhaarlem.nl/makePDF.php",
        "webhookUrl"  => "https://webshop.example.org/mollie-webhook/",
    ]);

    
    //database_write($orderId, $payment->status);

    /*
     * Send the customer off to complete the payment.
     * This request should always be a GET, thus we enforce 303 http response code
     */
    header("Location: " . $payment->getCheckoutUrl(), true, 303);

 } catch (\Mollie\Api\Exceptions\ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
 }
 
?>