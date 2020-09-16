<?php

namespace incomeSDK\HttpClient;

/**
 * Class HttpException
 * @package incomeSDK\HttpClient
 *
 * Http exceptions handler
 */
class HttpException extends IOException
{
    /**
     * @var int
     */
    public $statusCode;

    /**
     * @var array
     */
    public $headers;

    /**
     * @param string $message
     * @param int $statusCode
     * @param array $headers
     */
    public function __construct($message, $statusCode, $headers = [])
    {
        parent::__construct($message);

        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }
}
