<?php

namespace Rayalois22\HttpClient\Psr18;

use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\RequestInterface;

class RequestException extends \RuntimeException implements Exception, RequestExceptionInterface
{
    use RequestAwareTrait;

    /**
     * @param string $message
     */
    public function __construct($message, RequestInterface $request, \Exception $previous = null)
    {
        $this->setRequest($request);

        parent::__construct($message, 0, $previous);
    }
}
