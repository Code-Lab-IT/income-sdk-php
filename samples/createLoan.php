<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

$result = $sdk->createLoan([
    'loan_id' => '111123',
    'country' => 'FIN',
    'type' => 'CAR',
    'status' => 'Current',
    'currency' => 'USD',
    'issued_date' => '2020-03-15',
    'list_date' => '2020-03-17',
    'issued_amount' => 15.5,
    'list_amount' => 16.7,
    'skin_in_the_game' => 23,
    'repaid_amount' => 11.5,
    'debt_amount' => 7.13,
    'schedule_type' => 'INTEREST_ONLY',
    'interest_rate' => '89',
    'apr' => '7.3',
    'extendable_schedule' => true,
    'purpose' => 'some purpose',
    'buyback_guarantee' => false,
    'saldo' => 13,
    'remaining_principal' => 21,
    'term_date' => "2020-09-17",
    'due_date' => "2020-09-19",
    'borrower_name' => "Test borrower_name",
    'period' => 52,
    'borrower_interest' => 11.5,
    'loan_schedule' => [
        'schedule' => [
            [
                'rowno' => 1,
                'date' => '2020-09-03',
                'capital' => 200.11,
                'interest' => 2.21,
                'capitalDebInterest' => 11.01,
                'schedule_components' => [
                    'capital' => 'principal',
                    'interest' => 'interest',
                    'capitalDebInterest' => 'interest',
                ],
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
                    ],
                ],
            ],
        ],
    ],
    'timezone' => 'America/Anguilla',
]);

if ($result) {
    print 'Loan created. income_loan_id: ' . $result['income_loan_id'];
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print 'Error message: ' . $sdk->getErrorMessage() . "\n";
    print 'Errors:' . "\n";
    print_r($sdk->getErrors());
}