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
     * @param string $header
     * @param string $key
     * @param string $value
     */
    public static function deserializeHeader($header, &$key, &$value): void
    {
        if (!empty($header) && strpos($header, ':') !== false) {
            [$k, $v] = explode(":", $header);
            $key = trim($k);
            $value = trim($v);
        }
    }
}
