<?php

namespace incomeSDK\Core;

use incomeSDK\HttpClient\HttpClient;
use incomeSDK\HttpClient\IOException;
use incomeSDK\Models\BuybackItem;
use incomeSDK\Models\Loan;

/**
 * Class incomeSDK
 * @package incomeSDK\Core
 */
class Client
{
    private const BASE_URL_PROD = 'https://income-backoffice.code-lab.it/lo-api/';

    private const BASE_URL_DEV = 'http://localhost:8180/lo-api/';

    public const CREATE_LOAN_ENDPOINT_URL = 'loans/store';
    public const GET_LOANS_LIST_ENDPOINT_URL = 'loans/list';
    public const GET_LOANS_DETAILS_ENDPOINT_URL = 'loans/view/';
    public const UPDATE_LOAN_SCHEDULE_ENDPOINT_URL = 'loans/update-schedule/';
    public const BUYBACK_LOAN_ENDPOINT_URL = 'loans/buyback';

    /**
     * @var array
     */
    private $errors;

    /**
     * @var array
     */
    private $errorsMessage;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var HttpClient
     */
    private $client;

    /**
     * incomeSDK constructor.
     * @param string $apiKey Api key
     * @param bool $devMode - use localhost for base url
     */
    public function __construct($apiKey, $devMode = false)
    {
        $this->client = new HttpClient($devMode ? self::BASE_URL_DEV : self::BASE_URL_PROD, $apiKey);
    }

    /**
     * Get response errors
     * @return array|string
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Get response error message
     * @return array|string
     */
    public function getErrorMessage()
    {
        return $this->errorsMessage;
    }

    /**
     * Get response errors
     * @return int
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * Make http request
     * @param string $path
     * @param $data
     * @param string|null $method
     * @return mixed
     */
    public function httpRequest(string $path, $data = null, string $method = null)
    {
        try {
            $response = $this->client->request($path, $data, $method);
            $this->statusCode = (int)$response->statusCode;

            if ($response->statusCode === 200 && $response->result['success']) {
                return $response->result['data'] ?? $response->result;
            }

            $this->errorsMessage = $response->result['message'] ?? '';
            $this->errors = $response->result['errors'] ?? [];

            return false;

        } catch (IOException $e) {
            $this->errors = $e->getMessage();
            return false;
        }
    }

    /**
     * Create (list) new Loan
     * @param array $loanData
     * @return bool
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
    public function getBuybackLoans(string $dateFrom, string $dateTo)
    {
        $response = $this->httpRequest(static::BUYBACK_LOAN_ENDPOINT_URL, [
            'date_from' => $dateFrom,
            'date_to' => $dateTo
        ]);

        return BuybackItem::createArrayFromArrays($response);
    }
}