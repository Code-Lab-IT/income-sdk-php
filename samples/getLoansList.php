<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

$result = $sdk->getLoansList();

if ($result) {
    foreach ($result as $loan) {
        echo 'Loan Income Ref: ' . $loan->income_loan_ref . "\n";
        echo "-----------------------------\n";
    }
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print_r($sdk->getErrors());
}