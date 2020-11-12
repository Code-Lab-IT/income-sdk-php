<?php

namespace incomeSDK\ApiTraits;

use incomeSDK\Models\Loan;

trait LoansTrait
{
    /**
     * Create (list) new Loan
     * @param array $loanData
     * @return mixed
     */
    public function createLoan(array $loanData)
    {
        return $this->httpRequest(static::CREATE_LOAN_ENDPOINT_URL, ['loan' => $loanData], 'POST');
    }

    /**
     * Return loans list (array with Loan objects)
     * @return Loan[]
     */
    public function getLoansList(): array
    {
        $response = $this->httpRequest(static::GET_LOANS_LIST_ENDPOINT_URL);

        return Loan::createArrayFromArrays($response);
    }

    /**
     * Return details (Loan object)
     * @param int $id - income_loan_id or loan_id
     * @return Loan|null
     */
    public function getLoansDetails($id): ?Loan
    {
        $response = $this->httpRequest(static::GET_LOANS_DETAILS_ENDPOINT_URL . $id);

        return $response && is_array($response) ? new Loan($response) : null;
    }

    /**
     * Update loan schedule
     * @param int|string $loanId
     * @param array $scheduleData
     * @return bool
     */
    public function updateLoanSchedule($loanId, array $scheduleData): bool
    {
        $response = $this->httpRequest(
            static::UPDATE_LOAN_SCHEDULE_ENDPOINT_URL . $loanId,
            ['loan_schedule' => $scheduleData],
            'PATCH'
        );

        return (bool)$response;
    }

    /**
     * Return loan investment list
     * @param int $id - income_loan_id or loan_id
     * @return array|null
     */
    public function getLoanInvestments($id)
    {
        return $this->httpRequest(static::GET_LOAN_INVESTMENTS . $id);
    }
}