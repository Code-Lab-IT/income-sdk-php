<?php

namespace incomeSDK\Core;

use incomeSDK\HttpClient\HttpClient;
use incomeSDK\HttpClient\IOException;
use incomeSDK\Models\Loan;

/**
 * Class incomeSDK
 * @package incomeSDK\Core
 */
class Client
{
    const BASE_URL_PROD = 'https://income-backoffice.code-lab.it/lo-api/';

    const BASE_URL_DEV = 'http://localhost:8180/lo-api/';

    /**
     * @var array
     */
    private $errors;

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
    public function __construct($apiKey, $devMode = false) {

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
     * Get response errors
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Create (list) new Loan
     * @param array $loanData
     * @return bool
     */
    public function createLoan(array $loanData): bool
    {
        try {
            $response = $this->client->request('loans/store', ['loan' => $loanData], 'POST');
            $this->statusCode = (int)$response->statusCode;

            if ($response->statusCode === 200 && $response->result['success']) {
                return true;
            }

            $this->errors = $response->result['message'] ?? [];

            return false;

        } catch (IOException $e) {
            $this->errors = $e->getMessage();
            return false;
        }
    }

    /**
     * @return Loan[]
     */
    public function getLoansList() {

    }
}