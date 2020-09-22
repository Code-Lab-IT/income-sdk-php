<?php

namespace incomeSDK\HttpClient;

/**
 * Class HttpRequest
 * @package incomeSDK\HttpClient
 *
 * Request object that holds all the necessary information required by HttpClient
 *
 * @see HttpClient
 */
class HttpRequest
{
    /**
     * @var string
     */
    public $path;

    /**
     * @var array | string
     */
    public $body;

    /**
     * @var array
     */
    public $headers;

    /**
     * @var string
     */
    public $apiKey;

    /**
     * HttpRequest constructor.
     * @param string $path
     * @param string $apiKey
     * @param null $body
     * @throws IOException
     */
    public function __construct($path, $apiKey, $body = null)
    {
        $this->path = $path;
        $this->apiKey = $apiKey;
        $this->headers = ['content-type' => 'application/json'];

        if (!is_null($body)) {
            $this->body = JsonSerializer::encode($body);
        }
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        $headers = HttpHeadersHelper::prepareHeaders($this->headers);

        return HttpHeadersHelper::serializeHeaders($headers);
    }


    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->path . '?api_key=' . $this->apiKey;
    }
}
