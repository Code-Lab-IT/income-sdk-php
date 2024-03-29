<?php

namespace incomeSDK\Core;

use incomeSDK\ApiTraits\BankTransactionsTrait;
use incomeSDK\ApiTraits\BuybackTrait;
use incomeSDK\ApiTraits\LoansTrait;
use incomeSDK\HttpClient\HttpClient;
use incomeSDK\HttpClient\IOException;

/**
 * Class incomeSDK
 * @package incomeSDK\Core
 */
class Client
{
    use LoansTrait;
    use BuybackTrait;
    use BankTransactionsTrait;

    protected const BASE_URL_PROD = 'https://api.getincome.com/lo-api/';
    protected const BASE_URL_DEV = 'https://income-backoffice.code-lab.it/lo-api/';

    public const CREATE_LOAN_ENDPOINT_URL = 'loans/store';
    public const GET_LOANS_LIST_ENDPOINT_URL = 'loans/list';
    public const GET_LOANS_DETAILS_ENDPOINT_URL = 'loans/view/';
    public const GET_LOAN_INVESTMENTS = 'loans/investment/';
    public const UPDATE_LOAN_SCHEDULE_ENDPOINT_URL = 'loans/update-schedule/';
    public const BUYBACK_LOAN_ENDPOINT_URL = 'loans/buyback';
    public const BANK_TRANSFER_ENDPOINT_URL = 'loans/bank-transfer';
    public const UPLOAD_COLLATERAL = 'loans/upload-public-collateral/';
    public const UPLOAD_PRIVATE_COLLATERAL = 'loans/upload-private-collateral/';

    /**
     * @var array
     */
    protected $errors;

    /**
     * @var array
     */
    protected $errorsMessage;

    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var HttpClient
     */
    protected $client;

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

  public function httpRequest(string $path, $data = null, string $method = null)
  {
    try
    {
      $response = $this->client->request($path, $data, $method);
      $this->statusCode = (int)$response->statusCode;
      if ($response->statusCode === 200 && $response->result['success'])
      {
        return $response->result['data'] ?? $response->result;
      }
      if ($response->statusCode === 405)
      {
        $this->errorsMessage = '405 - Method not allowed! Accessing wrong / non-existing endpoint... out-dated SDK?';
        $this->errors = [];
        return false;
      }
      $this->errorsMessage = $response->result['message'] ?? '';
      $this->errors = $response->result['errors'] ?? [];
      return false;
    }
    catch (IOException $e)
    {
      $this->errors = $e->getMessage();
      return false;
    }
  }
    
}
