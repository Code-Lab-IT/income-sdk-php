<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

if ($_SERVER['argc'] < 2) {
    die('Use: php getLoanDetails.php [loanId]');
}

$loanId = $_SERVER['argv'][1];

$loanDetails = $sdk->getLoansDetails($loanId);

if ($loanDetails) {
    print_r($loanDetails);
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print_r($sdk->getErrors());
}