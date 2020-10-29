<?php

namespace incomeSDK\ApiTraits;

use incomeSDK\Models\BuybackItem;
use incomeSDK\Models\Loan;

trait BuybackTrait
{
    /**
     * Buyback Loan
     * @param int $loanId
     * @param string|null $reason
     * @return Loan
     */
    public function buybackLoan(int $loanId, ?string $reason): ?Loan
    {
        $response = $this->httpRequest(static::BUYBACK_LOAN_ENDPOINT_URL, [
            'loan_id' => $loanId,
            'reason' => $reason
        ], 'POST');

        return $response && is_array($response) ? new Loan($response) : null;
    }

    /**
     * Buyback Loans list
     *
     * @param string $dateFrom
     * @param string $dateTo
     * @return BuybackItem[]
     */
    public function getBuybackLoans(string $dateFrom, string $dateTo): array
    {
        $response = $this->httpRequest(static::BUYBACK_LOAN_ENDPOINT_URL, [
            'date_from' => $dateFrom,
            'date_to' => $dateTo
        ]);

        return BuybackItem::createArrayFromArrays($response);
    }
}