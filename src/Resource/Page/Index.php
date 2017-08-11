<?php
namespace MyVendor\Locale\Resource\Page;

use BEAR\Resource\ResourceObject;
use Ray\Di\Di\Named;

class Index extends ResourceObject
{
    /**
     * @var string
     */
    private $greeting;

    /**
     * @Named("greeting")
     */
    public function __construct(string $greeting)
    {
        $this->greeting = $greeting;
    }

    public function onGet(string $name = 'BEAR.Sunday') : ResourceObject
    {
        $this['greeting'] = $this->greeting . ' ' . $name;

        return $this;
    }
}
