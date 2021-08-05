<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

// base64 encoded "hello world"
$result = $sdk->uploadCollateral(1111, 'example.txt', 'aGVsbG8gd29ybGQ=');

if ($result)
{
  print 'Collateral file uploaded to loean';
}
else
{
  print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
  print_r($sdk->getErrors());
}