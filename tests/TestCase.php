<?php

namespace Jumbodroid\HttpClient\Tests;

use PHPUnit\Framework\TestCase as PHPUnit;

/**
 * Class TestCase
 *
 * @author  Alois Odhiambo  <rayalois22@gmail.com>
 */
class TestCase extends PHPUnit
{

    public function __construct()
    {
        parent::__construct();
    }

    public function setUp() : void
    {
        parent::setUp();
    }

    public function tearDown() : void
    {
        parent::tearDown();
    }

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();
    }
}
