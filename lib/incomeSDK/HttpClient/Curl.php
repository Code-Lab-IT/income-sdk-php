<?php

namespace incomeSDK\HttpClient;

/**
 * Class Curl
 * @package incomeSDK\HttpClient
 *
 * Curl wrapper used by HttpClient to make curl requests.
 * @see HttpClient
 */
class Curl
{
    /**
     * @var false|resource
     */
    protected $curl;

    public function __construct($curl = NULL)
    {
        if (is_null($curl)) {
            $curl = curl_init();
        }

        $this->curl = $curl;
    }

    public function setOpt($option, $value): Curl
    {
        curl_setopt($this->curl, $option, $value);
        return $this;
    }

    public function close(): Curl
    {
        curl_close($this->curl);
        return $this;
    }

    public function exec()
    {
        return curl_exec($this->curl);
    }

    public function errNo(): int
    {
        return curl_errno($this->curl);
    }

    public function getInfo($option)
    {
        return curl_getinfo($this->curl, $option);
    }

    public function error(): string
    {
        return curl_error($this->curl);
    }
}
