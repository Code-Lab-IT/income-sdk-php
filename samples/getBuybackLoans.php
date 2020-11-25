<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

$result = $sdk->getBuybackLoans('2020-01-01', '2020-12-31');

if ($result) {
    foreach ($result as $item) {
        echo 'Loan Income Ref: ' . $item->income_loan_ref . "\n";
        echo 'Amount: ' . $item->amount . "\n";
        echo 'Intrest amount: ' . $item->intrest_amount . "\n";
        echo 'Buyback reason: ' . $item->reason . "\n";
        echo "-----------------------------\n";
    }
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print_r($sdk->getErrors());
}