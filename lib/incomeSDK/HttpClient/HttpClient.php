<?php

namespace incomeSDK\HttpClient;

/**
 * Class HttpClient
 * @package incomeSDK\HttpClient
 *
 * Client used to make HTTP requests.
 */
class HttpClient
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * HttpClient constructor. Pass the baseUrl and ApiKey
     * @param string $baseUrl
     * @param string $apiKey
     */
    public function __construct($baseUrl, $apiKey)
    {
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }

    /**
     * The method that takes an HTTP request, serializes the request, makes a call to given environment, and deserialize response
     *
     * @param string $path
     * @param mixed $body
     * @param string $method
     * @param array $headers
     * @return HttpResponse
     * @throws HttpException
     * @throws IOException
     */
    public function request($path, $body = null, $method = null, $headers = []): HttpResponse
    {
        $curl = new Curl();
        $request = new HttpRequest($path, $this->apiKey, $body, $headers);

        $url = $this->baseUrl . $request->getUrl();
        $method = $method ?? 'GET';

        if ($method === 'GET' && !is_null($body)) {
            $query = http_build_query($body);
            $url .= '&' . $query;
        }

        $curl->setOpt(CURLOPT_URL, $url);

        // Allowed: DELETE, PUT, GET, POST
        $curl->setOpt(CURLOPT_CUSTOMREQUEST, $method);

        $curl->setOpt(CURLOPT_HTTPHEADER, $request->getHeaders());
        $curl->setOpt(CURLOPT_RETURNTRANSFER, 1);
        $curl->setOpt(CURLOPT_HEADER, 0);

        if ($method !== 'GET' && !is_null($request->body)) {
            $curl->setOpt(CURLOPT_POSTFIELDS, $request->body);
        }

        if (strpos($this->baseUrl, "https://") === 0) {
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, 2);
        }

        $response = new HttpResponse($curl);
        $curl->close();

        return $response;
    }
}
