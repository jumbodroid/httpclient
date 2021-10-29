# httpclient

**httpclient** is a PHP & Laravel package, designed to help PHP developers build robust modern applications that interact with other applications and APIs in the backend to deliver experiences that users love.

**httpclient** adopts and adheres to or implements the following PHP Standards Recommendations (PSRs):
- [PSR-1](https://www.php-fig.org/psr/psr-1/)
- [PSR-7](https://www.php-fig.org/psr/psr-7/)
- [PSR-17](https://www.php-fig.org/psr/psr-17/)
- [PSR-18](https://www.php-fig.org/psr/psr-18/)


>Leverage httpclient to build modern interconnected applications for the web.

**httpclient** saves you the hustle of dealing with the more mundane and lower level APIs needed to create interconnected web applications.

## Installation  
`composer require jumbodroid/httpclient`  

## Usage  

### PSR-7  
PSR-7 describes common interfaces for representing HTTP messages as described in [RFC 7230](http://tools.ietf.org/html/rfc7230) and [RFC 7231](http://tools.ietf.org/html/rfc7231), and URIs for use with HTTP messages as described in [RFC 3986](http://tools.ietf.org/html/rfc3986). This package includes an implementation of [PSR-7](https://www.php-fig.org/psr/psr-7/).

#### Request | Response  
Use the `getHeaderLine()` method to retrieve a header value as a string containing all header values of a case-insensitive header by name concatenated with a comma.  
```php  
$response->withHeader('foo', 'bar')
    ->withAddedHeader('foo', 'baz');

$response->getHeaderLine('foo');
// outputs 'bar,baz'  
```  

Use `getHeader()` to retrieve an array of all the header values for a particular case-insensitive header by name.  
```php  
$response->getHeader('foo');  
// outputs ['bar', 'baz']
```

Note: Not all header values can be concatenated using a comma (e.g., `Set-Cookie`). When working with such headers, consumers of Request and Response classes SHOULD rely on the `getHeader()` method for retrieving such multi-valued headers.

#### Request  
```php
$request->getProtocolVersion();
$request->withProtocolVersion($version);
$request->getHeaders();
$request->hasHeader($name);
$request->getHeader($name);
$request->getHeaderLine($name);
$request->withHeader($name, $value);
$request->withAddedHeader($name, $value);
$request->withoutHeader($name);
$request->getBody();
$request->withBody(StreamInterface $body);
```

Outgoing, client-side request  

```php  
$request->getRequestTarget();
$request->withRequestTarget($requestTarget);
$request->getMethod();
$request->withMethod($method);
$request->getUri();
$request->withUri(UriInterface $uri, $preserveHost = false);
```  

Incoming, server-side request  

```php  
$request->getServerParams();
$request->getCookieParams();
$request->withCookieParams(array $cookies);
$request->getQueryParams();
$request->withQueryParams(array $query);
$request->getUploadedFiles();
$request->withUploadedFiles(array $uploadedFiles);
$request->getParsedBody();
$request->withParsedBody($data);
$request->getAttributes();
$request->getAttribute($name, $default = null);
$request->withAttribute($name, $value);
$request->withoutAttribute($name);
```  


#### Response   
```php
$response->getProtocolVersion();
$response->withProtocolVersion($version);
$response->getHeaders();
$response->hasHeader($name);
$response->getHeader($name);
$response->getHeaderLine($name);
$response->withHeader($name, $value);
$response->withAddedHeader($name, $value);
$response->withoutHeader($name);
$response->getBody();
$response->withBody(StreamInterface $body);
```

Outgoing, server-side response  

```php  
$response->getStatusCode();
$response->withStatus($code, $reasonPhrase = '');
$response->getReasonPhrase();
```  

#### Stream  
```php  
$stream->__toString();
$stream->close();
$stream->detach();
$stream->getSize();
$stream->tell();
$stream->eof();
$stream->isSeekable();
$stream->seek($offset, $whence = SEEK_SET);
$stream->rewind();
$stream->isWritable();
$stream->write($string);
$stream->isReadable();
$stream->read($length);
$stream->getContents();
$stream->getMetadata($key = null);
```  

#### Uri  
```php  
$uri->getScheme();
$uri->getAuthority();
$uri->getUserInfo();
$uri->getHost();
$uri->getPort();
$uri->getPath();
$uri->getQuery();
$uri->getFragment();
$uri->withScheme($scheme);
$uri->withUserInfo($user, $password = null);
$uri->withHost($host);
$uri->withPort($port);
$uri->withPath($path);
$uri->withQuery($query);
$uri->withFragment($fragment);
$uri->__toString();
```  

#### UploadedFile  
```php  
$uploadedFile->getStream();
$uploadedFile->moveTo($targetPath);
$uploadedFile->getSize();
$uploadedFile->getError();
$uploadedFile->getClientFilename();
$uploadedFile->getClientMediaType();
```  

### PSR-17  
[PSR-17](https://www.php-fig.org/psr/psr-17/) describes a common standard for factories that create PSR-7 compliant HTTP objects. This package provides an implementation of PSR-17.

#### RequestFactory  
```php  
RequestFactory::createRequest(string $method, $uri);
```  

#### ResponseFactory 
```php  
ResponseFactory::createResponse(int $code = 200, string $reasonPhrase = '');
```

#### ServerRequestFactory
```php  
ServerRequestFactory::createServerRequest(string $method, $uri, array $serverParams = []);
```  

#### StreamFactory  
```php  
StreamFactory::createStream(string $content = '');
StreamFactory::createStreamFromFile(string $filename, string $mode = 'r');
StreamFactory::createStreamFromResource($resource);
```  

#### UploadedFileFactory  
```php  
UploadedFileFactory::createUploadedFile(
        StreamInterface $stream,
        int $size = null,
        int $error = \UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    );
```  

#### UriFactory  
```php  
UriFactory::createUri(string $uri = '');
```  

### PSR-18
**Client** - A Client is a library that implements this specification for the purposes of sending PSR-7-compatible HTTP Request messages and returning a PSR-7-compatible HTTP Response message to a Calling library.  

**Calling Library** - A Calling Library is any code that makes use of a Client. It does not implement this specification's interfaces but consumes an object that implements them (a Client). 

#### Client  
```php  
$client->sendRequest(RequestInterface $request);
```  

#### ClientException

#### RequestException  
```php  
$requestException->getRequest();
```  

#### NetworkException  
```php  
$requestException->getRequest();
```  
