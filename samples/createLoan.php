<?php
require '../vendor/autoload.php';
require './env.php';

use incomeSDK\Core\Client;

$sdk = new Client(API_KEY);

$result = $sdk->createLoan([
    'loan_id' => '1111',
    'country' => 'FIN',
    'type' => 'CAR',
    'currency' => 'USdD',
    'issued_date' => '2020-03-15',
    'list_date' => '2020-03-17',
    'issued_amount' => '15.5',
    'list_amount' => '16.7',
    'skin_in_the_game' => '23',
    'repaid_amount' => '11.5',
    'debt_amount' => '7.13',
    'schedule_type' => 'INTEREST_ONLY',
    'interest_rate' => '89',
    'apr' => '7.3',
    'extendable_schedule' => true,
    'purpose' => 'some purpose',
    'buyback_guarantee' => false,
    'loan_schedule' => [
        'schedule_components' => [
            'principal' => 'principal',
            'interest' => 'interest',
            'monthly_fee' => 'fee',
            'admission_fee' => 'fee',
            'insurance' => 'forward_fee',
            'penalty_fee' => 'interest',
        ],
        'schedule' => [[
            'rowno' => 1,
            'date' => '2020-09-03',
            'principal' => 155.2,
            'interest' => 44.1,
            'monthly_fee' => 10,
        ], [
            'rowno' => 2,
            'date' => '2020-10-03',
            'principal' => 155.2,
            'interest' => 44.1,
            'monthly_fee' => 10,
        ],
        ],
    ],
    'timezone' => 'America/Anguilla',
]);

if ($result) {
    print 'Loan created';
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print_r($sdk->getErrors());
}