<?php

namespace Rayalois22\HttpClient\Tests;

use Rayalois22\HttpClient\Config;
use Rayalois22\HttpClient\Sample;

/**
 * Class SampleTest
 *
 * @category Test
 * @package  Rayalois22\HttpClient\Tests
 * @author Alois Odhiambo <rayalois22@gmail.com>
 */
class SampleTest extends TestCase
{

    public function testSayHello()
    {
        $config = new Config();
        $sample = new Sample($config);

        $name = 'Alois Odhiambo';

        $result = $sample->sayHello($name);

        $expected = $config->get('greeting') . ' ' . $name;

        $this->assertEquals($result, $expected);

    }

}
