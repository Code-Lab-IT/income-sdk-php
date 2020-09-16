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
    const BASE_URL = 'https://income-backoffice.code-lab.it/';

    /**
     * @var array
     */
    private $errors;

    /**
     * @var HttpClient
     */
    private $client;

    /**
     * incomeSDK constructor.
     * @param string $apiKey Api key
     */
    public function __construct($apiKey) {
        $this->client = new HttpClient(self::BASE_URL, $apiKey);
    }

    /**
     * Get response errors
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * Create (list) new Loan
     * @param array $loanData
     * @return bool
     */
    public function createLoan(array $loanData): bool
    {
        try {
            $response = $this->client->request('loans/store', ['loan' => $loanData]);

            if ($response->statusCode === 200 && $response->result['success']) {
                return true;
            }

            $this->errors = $response->result['message'] ?? null;

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