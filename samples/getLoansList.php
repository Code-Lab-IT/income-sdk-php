<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

$result = $sdk->getLoansList();

if ($result) {
    foreach ($result as $loan) {
        echo 'Loan ID: ' . $loan->loan_id . "\n";
        echo 'Loan Income ID: ' . $loan->income_loan_id . "\n";
        echo "-----------------------------\n";
    }
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print_r($sdk->getErrors());
}