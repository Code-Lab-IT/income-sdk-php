<?php

namespace incomeSDK\HttpClient;

/**
 * Class Json
 * @package incomeSDK\HttpClient
 *
 * Serializer for JSON content types.
 */
class JsonSerializer
{
    /**
     * @param array|string $body
     * @return string representation of your data after being serialized.
     * @throws IOException
     */
    public static function encode($body): string
    {
        if (is_string($body)) {
            return $body;
        }

        if (is_array($body)) {
            return json_encode($body);
        }

        throw new IOException("Cannot serialize data. Unknown type");
    }

    /**
     * @param $data
     * @return mixed object/string representing the de-serialized response body.
     */
    public static function decode($data)
    {
        return json_decode($data, true);
    }
}
