<?php

namespace incomeSDK\HttpClient;

/**
 * Class HttpClient
 * @package incomeSDK\HttpClient
 *
 * Client used to make HTTP requests.
 */
class HttpHeadersHelper
{
    /**
     * Returns an array representing headers with their keys to be lower case
     * @param $headers
     * @return array
     */
    public static function prepareHeaders($headers): array
    {
        return array_change_key_case($headers);
    }

    /**
     * Returns an array representing headers with their key in original cases and updated values
     * @param $rawHeaders
     * @param $formattedHeaders
     * @return array
     */
    public static function mapHeaders($rawHeaders, $formattedHeaders): array
    {
        $rawHeadersKey = array_keys($rawHeaders);

        foreach ($rawHeadersKey as $array_key) {
            if (array_key_exists(strtolower($array_key), $formattedHeaders)) {
                $rawHeaders[$array_key] = $formattedHeaders[strtolower($array_key)];
            }
        }

        return $rawHeaders;
    }

    /**
     * Created headers array for curl
     * @param $headers
     * @return array
     */
    public static function serializeHeaders($headers): array
    {
        $headerArray = [];

        if ($headers) {
            foreach ($headers as $key => $val) {
                $headerArray[] = $key . ": " . $val;
            }
        }

        return $headerArray;
    }

    /**
     * Deserialize header from curl
     * @param $header
     * @param $key
     * @param $value
     */
    public static function deserializeHeader($header, &$key, &$value)
    {
        if (!empty($header) && strpos($header, ':') !== false) {

            list($k, $v) = explode(":", $header);
            $key = trim($k);
            $value = trim($v);

        }
    }
}
