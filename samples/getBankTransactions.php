<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

$result = $sdk->getBankTransactions('2020-01-01', '2020-12-31');

if ($result) {
    foreach ($result as $item) {
        echo 'Event uuid: ' . $item->event_uuid . "\n";
        echo 'Date: ' . $item->date . "\n";
        echo 'Amount: ' . $item->amount . "\n";
        echo 'Description: ' . $item->description . "\n";
        echo 'bankTransactionId: ' . $item->bankTransactionId . "\n";
        echo "-----------------------------\n";
    }
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print_r($sdk->getErrors());
}