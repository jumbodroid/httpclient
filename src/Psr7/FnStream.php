<?php

namespace Jumbodroid\HttpClient\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Compose stream implementations based on a hash of functions.
 *
 * Allows for easy testing and extension of a provided stream without needing
 * to create a concrete class for a simple extension point.
 */
class FnStream implements StreamInterface
{
    /** 
     * @var array 
     * 
     */
    private $methods;

    /** @var array Methods that must be implemented in the given array */
    private static $slots = ['__toString', 'close', 'detach', 'rewind',
        'getSize', 'tell', 'eof', 'isSeekable', 'seek', 'isWritable', 'write',
        'isReadable', 'read', 'getContents', 'getMetadata'];

    /**
     * @param array $methods Hash of method name to a callable.
     */
    public function __construct(array $methods)
    {
        $this->methods = $methods;

        // Create the functions on the class
        foreach ($methods as $name => $fn) {
            $this->{'_fn_' . $name} = $fn;
        }
    }

    /**
     * Lazily determine which methods are not implemented.
     * @throws \BadMethodCallException
     */
    public function __get($name)
    {
        throw new \BadMethodCallException(str_replace('_fn_', '', $name)
            . '() is not implemented in the FnStream');
    }

    /**
     * The close method is called on the underlying stream only if possible.
     */
    public function __destruct()
    {
        if (isset($this->_fn_close)) {
            call_user_func($this->_fn_close);
        }
    }

    /**
     * An unserialize would allow the __destruct to run when the unserialized value goes out of scope.
     * @throws \LogicException
     */
    public function __wakeup()
    {
        throw new \LogicException('FnStream should never be unserialized');
    }

    /**
     * Adds custom functionality to an underlying stream by intercepting
     * specific method calls.
     *
     * @param StreamInterface $stream  Stream to decorate
     * @param array           $methods Hash of method name to a closure
     *
     * @return FnStream
     */
    public static function decorate(StreamInterface $stream, array $methods)
    {
        // If any of the required methods were not provided, then simply
        // proxy to the decorated stream.
        foreach (array_diff(self::$slots, array_keys($methods)) as $diff) {
            $methods[$diff] = [$stream, $diff];
        }

        return new self($methods);
    }

    public function __toString() : string
    {
        return call_user_func($this->_fn___toString);
    }

    public function close() : void
    {
        // return call_user_func($this->_fn_close);
    }

    public function detach()
    {
        return call_user_func($this->_fn_detach);
    }

    public function getSize() : ?int
    {
        return call_user_func($this->_fn_getSize);
    }

    public function tell() : int
    {
        return call_user_func($this->_fn_tell);
    }

    public function eof() : bool
    {
        return call_user_func($this->_fn_eof);
    }

    public function isSeekable() : bool
    {
        return call_user_func($this->_fn_isSeekable);
    }

    public function rewind() : void
    {
        call_user_func($this->_fn_rewind);
    }

    public function seek(int $offset, int $whence = SEEK_SET) : void
    {
        call_user_func($this->_fn_seek, $offset, $whence);
    }

    public function isWritable() : bool
    {
        return call_user_func($this->_fn_isWritable);
    }

    public function write(string $string) : int
    {
        return call_user_func($this->_fn_write, $string);
    }

    public function isReadable() : bool
    {
        return call_user_func($this->_fn_isReadable);
    }

    public function read(int $length) : string
    {
        return call_user_func($this->_fn_read, $length);
    }

    public function getContents() : string
    {
        return call_user_func($this->_fn_getContents);
    }

    public function getMetadata($key = null)
    {
        return call_user_func($this->_fn_getMetadata, $key);
    }
}
