<?php

namespace Rayalois22\HttpClient\Psr17;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

class StreamFactory implements StreamFactoryInterface
{
    public function createStream(string $content = ''): StreamInterface
    {
        return \Rayalois22\HttpClient\Psr7\stream_for($content);
    }

    public function createStreamFromFile(string $file, string $mode = 'r'): StreamInterface
    {
        $resource = \Rayalois22\HttpClient\Psr7\try_fopen($file, $mode);

        return \Rayalois22\HttpClient\Psr7\stream_for($resource);
    }

    public function createStreamFromResource($resource): StreamInterface
    {
        return \Rayalois22\HttpClient\Psr7\stream_for($resource);
    }
}
