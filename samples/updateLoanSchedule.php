<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

$result = $sdk->updateLoanSchedule(1111, [
    'schedule_components' => [
        'capital' => 'principal',
        'interest' => 'interest',
        'capitalDebInterest' => 'interest',
    ],
    'schedule' => [
        [
            'rowno' => 1,
            'date' => '2020-09-03',
            'capital' => 200.11,
            'interest' => 2.21,
            'capitalDebInterest' => 11.01,
            'repayment' => [
                'total' => 213.33, //213.33,
                'repaid' => true,
                'payments' => [
                    [
                        'date' => '2020-09-01',
                        'capital' => 200.11,
                        'interest' => 2.21,
                        'capitalDebInterest' => 11.01,
                    ],
                    [
                        'date' => '2020-09-08',
                        'amount' => 9.19,
                    ],
                ],
            ],
        ],
        [
            'rowno' => 2,
            'date' => '2020-10-03',
            'capital' => 176.5,
            'interest' => 11,
            'capitalDebInterest' => 24.55,
        ],
    ],
]);

if ($result) {
    print 'Loan schedule updated';
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print_r($sdk->getErrors());
}