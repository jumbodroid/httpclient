<?php

namespace Jumbodroid\HttpClient\Psr17;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Jumbodroid\HttpClient\Psr7;

class StreamFactory implements StreamFactoryInterface
{
    public function createStream(string $content = ''): StreamInterface
    {
        return Psr7\stream_for($content);
    }

    public function createStreamFromFile(string $file, string $mode = 'r'): StreamInterface
    {
        $resource = Psr7\try_fopen($file, $mode);

        return Psr7\stream_for($resource);
    }

    public function createStreamFromResource($resource): StreamInterface
    {
        return Psr7\stream_for($resource);
    }
}
