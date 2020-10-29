<?php

namespace incomeSDK\ApiTraits;

use incomeSDK\Models\BankTransaction;

trait BankTransactionsTrait
{
    /**
     * Buyback Loan
     * @param array $bankExportData
     * @return mixed
     */
    public function postBankExportData(array $bankExportData)
    {
        return $this->httpRequest(static::BANK_TRANSFER_ENDPOINT_URL, [
            'bankExportData' => $bankExportData,
        ], 'POST');
    }

    /**
     * Buyback Loans list
     *
     * @param string $dateFrom
     * @param string $dateTo
     * @return BankTransaction[]
     */
    public function getBankTransactions(string $dateFrom, string $dateTo): array
    {
        $response = $this->httpRequest(static::BANK_TRANSFER_ENDPOINT_URL, [
            'date_from' => $dateFrom,
            'date_to' => $dateTo
        ]);

        return BankTransaction::createArrayFromArrays($response);
    }
}