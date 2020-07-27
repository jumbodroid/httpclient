<?php

namespace Rayalois22\HttpClient;

class Constants
{
    const HEADER_HOST = 'Host';
    const HEADER_CONTENT_TYPE = 'Content-Type';
    const HEADER_CONTENT_LENGTH = 'Content-Length';

    const METHOD_GET = 'get';
    const METHOD_POST = 'post';
    const METHOD_PUT = 'put';
    const METHOD_DELETE = 'delete';
    const HTTP_METHODS = ['get','post','put','delete'];

    const STANDARD_PORTS = [ 'ftp' => 21, 'ssh' => 22, 'http' => 80, 'https' => 443 ];

    const CONTENT_TYPE_FORM_ENCODED = 'application/x-www-form-urlencoded';
    const CONTENT_TYPE_MULTI_FORM = 'multipart/form-data';
    const CONTENT_TYPE_JSON = 'application/json';
    const CONTENT_TYPE_HAL_JSON = 'application/hal+json';

    const DEFAULT_STATUS_CODE = 200;
    const DEFAULT_BODY_STREAM = 'php://input';
    const DEFAULT_REQUEST_TARGET = '/';

    const MODE_READ = 'r';
    const MODE_WRITE = 'w';
    const MODE_READ_WRITE = 'rw';

    // NOTE: not all error constants are shown to conserve space
    const ERROR_BAD = 'ERROR: ';
    const ERROR_UNKNOWN = 'ERROR: unknown';
    const ERROR_INVALID_URI = 'ERROR: invalid URI';
    const ERROR_MOVE_DONE = 'ERROR: move done';
    const ERROR_BAD_DIR = 'ERROR: bad dir';
    const ERROR_BAD_FILE = 'ERROR: bad file';
    const ERROR_FILE_NOT = 'ERROR: file not found';
    const ERROR_MOVE_UNABLE = 'ERROR: move unable';
    const ERROR_BODY_UNREADABLE = 'ERROR: body unreadable';
    const ERROR_HTTP_METHOD = 'ERROR: unknown HTTP method';
    const ERROR_NO_UPLOADED_FILES = 'ERROR: no uploaded files';
    const ERROR_INVALID_UPLOADED = 'ERROR: invalid uploaded';
    const ERROR_INVALID_STATUS = 'ERROR: invalid status';

    // NOTE: not all status codes are shown here!
    const STATUS_CODES = [
            200 => 'OK',
            301 => 'Moved Permanently',
            302 => 'Found',
            401 => 'Unauthorized',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            418 => 'I_m A Teapot',
            500 => 'Internal Server Error',
        ];
}
