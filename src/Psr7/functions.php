<?php

namespace Rayalois22\HttpClient\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Create a new stream based on the input type.
 *
 * Options is an associative array that can contain the following keys:
 * - metadata: Array of custom metadata.
 * - size: Size of the stream.
 *
 * @param resource|string|null|int|float|bool|StreamInterface|callable|\Iterator $resource Entity body data
 * @param array                                                                  $options  Additional options
 *
 * @return StreamInterface
 * @throws \InvalidArgumentException if the $resource arg is not valid.
 */
function stream_for($resource = '', array $options = [])
{
    if (is_scalar($resource)) {
        $stream = fopen('php://temp', 'r+');
        if ($resource !== '') {
            fwrite($stream, $resource);
            fseek($stream, 0);
        }
        return new Stream($stream, $options);
    }

    switch (gettype($resource)) {
        case 'resource':
            return new Stream($resource, $options);
        case 'object':
            if ($resource instanceof StreamInterface) {
                return $resource;
            } elseif ($resource instanceof \Iterator) {
                return new PumpStream(function () use ($resource) {
                    if (!$resource->valid()) {
                        return false;
                    }
                    $result = $resource->current();
                    $resource->next();
                    return $result;
                }, $options);
            } elseif (method_exists($resource, '__toString')) {
                return stream_for((string) $resource, $options);
            }
            break;
        case 'NULL':
            return new Stream(fopen('php://temp', 'r+'), $options);
    }

    if (is_callable($resource)) {
        return new PumpStream($resource, $options);
    }

    throw new \InvalidArgumentException('Invalid resource type: ' . gettype($resource));
}


/**
 * Copy the contents of a stream into a string until the given number of
 * bytes have been read.
 *
 * @param StreamInterface $stream Stream to read
 * @param int             $maxLen Maximum number of bytes to read. Pass -1
 *                                to read the entire stream.
 * @return string
 * @throws \RuntimeException on error.
 */
function copy_to_string(StreamInterface $stream, $maxLen = -1)
{
    $buffer = '';

    if ($maxLen === -1) {
        while (!$stream->eof()) {
            $buf = $stream->read(1048576);
            // Using a loose equality here to match on '' and false.
            if ($buf == null) {
                break;
            }
            $buffer .= $buf;
        }
        return $buffer;
    }

    $len = 0;
    while (!$stream->eof() && $len < $maxLen) {
        $buf = $stream->read($maxLen - $len);
        // Using a loose equality here to match on '' and false.
        if ($buf == null) {
            break;
        }
        $buffer .= $buf;
        $len = strlen($buffer);
    }

    return $buffer;
}
