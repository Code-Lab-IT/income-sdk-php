<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

$result = $sdk->getLoansList();

if (!empty($result)) {
    $loan = $result[0];

    $loanDetails = $sdk->getLoansDetails($loan->loan_id);

    print_r($loanDetails);

} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print_r($sdk->getErrors());
}