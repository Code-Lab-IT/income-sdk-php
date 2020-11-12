<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

if ($_SERVER['argc'] < 2) {
    die('Use: php getLoanInvestments.php [loanId]');
}

$loanId = $_SERVER['argv'][1];

$loanInvestments = $sdk->getLoanInvestments($loanId);

if ($loanInvestments !== false) {
    print_r($loanInvestments);
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print_r($sdk->getErrors());
}