<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

$result = $sdk->updateLoanSchedule(1111, [
    'schedule_components' => [
        'principal' => 'principal',
        'interest' => 'interest',
        'monthly_fee' => 'fee',
        'admission_fee' => 'fee',
        'insurance' => 'forward_fee',
        'penalty_fee' => 'interest',
    ],
    'schedule' => [
        [
            'rowno' => 1,
            'date' => '2020-09-03',
            'principal' => 155.2,
            'interest' => 44.1,
            'monthly_fee' => 10,
            'repayment' => [
                'total' => 209.3,
                'repaid' => true,
                'payments' => [
                    [
                        'date' => '2020-09-01',
                        'amount' => 200.11,
                    ],
                    [
                        'date' => '2020-09-08',
                        'amount' => 9.19,
                    ],
                ],
            ],
        ],
    ]
]);

if ($result) {
    print 'Loan schedule updated';
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print_r($sdk->getErrors());
}