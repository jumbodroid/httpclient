<?php

namespace Rayalois22\HttpClient;

/**
 * Class Sample
 *
 * @author  Alois Odhiambo  <rayalois22@gmail.com>
 */
class Sample
{

    /**
     * @var  \Rayalois22\HttpClient\Config
     */
    private $config;

    /**
     * Sample constructor.
     *
     * @param \Rayalois22\HttpClient\Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param $name
     *
     * @return  string
     */
    public function sayHello($name)
    {
        $greeting = $this->config->get('greeting');

        return $greeting . ' ' . $name;
    }

}
