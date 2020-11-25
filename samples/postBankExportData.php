<?php
require '../vendor/autoload.php';
require './env.php';

$sdk = new incomeSDK\Core\Client(API_KEY, DEV_MODE);

$result = $sdk->postBankExportData([
    [
        'account' => '109203920394',
        'transactions' => [
            [
                'event_uuid' => '2020102713534749764900-cd7eac39-4241-4d19-92c1-46f6fbae68e0',
                'amount' => 331.22,
                'bankTransactionId' => '1234567890',
                'date' => 20201001,
                'distribution' => [
                    [
                        'amount' => 300.22,
                        'loan_distribution' => [
                            'interest' => 44.1,
                            'monthly_fee' => 10,
                            'principal' => 246.12,
                        ],
                        'income_loan_ref' => 100001,
                        'type' => 'borrower repayment',
                    ],
                ],
                'optional_description' => 'For loan no 1088322',
                'optional_reference_number' => 10883222,
                'optional_senderAccount' => '032933323523402394',
                'optional_senderBank' => 'Bradesco',
                'optional_senderBankCode' => 'BR23AA',
                'optional_senderName' => 'Marguerita Consuela',
            ],
        ],
    ],
]);

if ($result) {
    print 'Bank Export Data imported';
} else {
    print 'Errors! Status Code:' . $sdk->getStatusCode() . "\n";
    print 'Error message: ' . $sdk->getErrorMessage() . "\n";
    print 'Errors:' . "\n";
    print_r($sdk->getErrors());
}