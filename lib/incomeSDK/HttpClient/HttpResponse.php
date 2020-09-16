<?php

namespace incomeSDK\HttpClient;

/**
 * Class HttpResponse
 * @package incomeSDK\HttpClient
 *
 * Object that holds your response details
 */
class HttpResponse
{
    /**
     * @var integer
     */
    public $statusCode;

    /**
     * @var array | string
     */
    public $result;

    /**
     * @var array
     */
    public $headers;

    /**
     * HttpResponse constructor.
     * @param Curl $curl
     * @throws HttpException
     */
    public function __construct($curl)
    {
        $headers = [];
        $curl->setOpt(CURLOPT_HEADERFUNCTION,
            static function ($curl, $header) use (&$headers) {
                $len = strlen($header);

                $k = "";
                $v = "";

                HttpHeadersHelper::deserializeHeader($header, $k, $v);

                if (!empty($k)) {
                    $headers[$k] = $v;
                }

                return $len;
            });

        $responseData = $curl->exec();
        $statusCode = $curl->getInfo(CURLINFO_HTTP_CODE);

        $errorCode = $curl->errNo();
        $error = $curl->error();

        if ($errorCode > 0) {
            throw new HttpException($error, $errorCode);
        }

        if ($statusCode < 200 || $statusCode >= 500) {
            throw new HttpException($responseData, $statusCode, $headers);
        }

        $responseBody = null;

        if (!empty($responseData)) {
            $responseBody = JsonSerializer::decode($responseData);
        }

        $this->statusCode = !$errorCode ? $statusCode : $errorCode;
        $this->result = $responseBody;
        $this->headers = $headers;
    }
}
