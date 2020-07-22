<?php


namespace MichaelLedin\FirebaseDynamicLink;

class BaseBuilder
{
    /** @var array */
    private $data;

    protected function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return static
     */
    protected function with(string $key, $value)
    {
        $copy = clone $this;
        $copy->data[$key] = $value;
        return $copy;
    }

    /**
     * @param self $builder
     * @return static
     */
    protected function merge(self $builder)
    {
        $new = clone $this;
        $new->data = array_merge($this->data, $builder->data);
        return $new;
    }

    protected function getData(): array
    {
        return $this->data;
    }
}
