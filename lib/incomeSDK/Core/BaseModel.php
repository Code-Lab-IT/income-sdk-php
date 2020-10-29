<?php

namespace incomeSDK\Core;

class BaseModel
{
    /**
     * @var array
     */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param $items
     * @return static[]
     */
    public static function createArrayFromArrays($items): array
    {
        $list = [];

        if (!empty($items) && is_array($items)) {
            foreach ($items as $item) {
                $list[] = new static($item);
            }
        }

        return $list;
    }

    /**
     * @param string $name
     * @return mixed|string
     */
    public function __get($name)
    {
        return $this->data[$name] ?? '';
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }
}