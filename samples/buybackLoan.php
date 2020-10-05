<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

$result = $sdk->buybackLoan(100040, 'Borrower paid back');

if ($result) {
    print 'Loan buyback. Loan details: '."\n";
    print_r($result);
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print 'Error message: ' . $sdk->getErrorMessage() . "\n";
    print 'Errors:' . "\n";
    print_r($sdk->getErrors());
}