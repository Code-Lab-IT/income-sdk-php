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
     * @param int $income_loan_ref
     * @return Loan|null
     */
    public function getLoansDetails($income_loan_ref): ?Loan
    {
        $response = $this->httpRequest(static::GET_LOANS_DETAILS_ENDPOINT_URL . $income_loan_ref);

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
     * @param int $income_loan_ref
     * @return array|null
     */
    public function getLoanInvestments($income_loan_ref)
    {
        return $this->httpRequest(static::GET_LOAN_INVESTMENTS . $income_loan_ref);
    }

  /**
   * Upload public LO callateral file to Income. 
   * The uploaded file is displayed publicly on Income Marketplace, meaning that every person can access it. 
   * Public collateral file MUST NOT include sensitive info about the borrowers. (Example of sensitive data: borrower's full name, phone number, email address etc.)
   *
   * @param int $income_loan_ref
   * @param string $fileName
   * @param string $fileContents plain file contents
   * @return bool
   */
    public function uploadCollateral(int $income_loan_ref, string $fileName, string $fileContents): bool
    {
      $response = $this->httpRequest(
        static::UPLOAD_COLLATERAL . $income_loan_ref,
        ['file_name' => $fileName, 'file_contents' => base64_encode($fileContents)],
        'POST'
      );

      return (bool)$response;
    }

  /**
   * Upload private LO callateral file to Income.
   * Private collateral file can include sensitive info about the borrowers. (Example of sensitive data: borrower's full name, phone number, email address etc.)
   * 
   * @param int $income_loan_ref
   * @param string $fileName
   * @param string $fileContents plain file contents
   * @return bool
   */
  public function uploadPrivateCollateral(int $income_loan_ref, string $fileName, string $fileContents): bool
  {
    $response = $this->httpRequest(
      static::UPLOAD_PRIVATE_COLLATERAL . $income_loan_ref,
      ['file_name' => $fileName, 'file_contents' => base64_encode($fileContents)],
      'POST'
    );

    return (bool)$response;
  }
}