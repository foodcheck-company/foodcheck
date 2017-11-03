<?php declare(strict_types = 1);

namespace App\Helpers;

/**
 * Class Api
 * @package App\Helpers
 */
class Api
{
    const HTTP_OK = 200;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_PAYMENT_REQUIRED = 402;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_NOT_ACCEPTABLE = 406;
    const HTTP_INTERNAL_SERVER_ERROR = 500;


    public static function respondNotFound($msg = 'Resource not found.')
    {
        return static::respondWithError($msg, self::HTTP_NOT_FOUND);
    }

    public static function respondBadRequest($msg = 'Bad request')
    {
        return static::respondWithError($msg, self::HTTP_BAD_REQUEST);
    }

    public static function respondForbidden($msg = 'Forbidden.')
    {
        return static::respondWithError($msg, self::HTTP_FORBIDDEN);
    }

    public static function respondUnauthorized($msg = 'Unauthorized.')
    {
        return static::respondWithError($msg, self::HTTP_UNAUTHORIZED);
    }

    public static function respondServerError($msg = 'Internal server error.')
    {
        return static::respondWithError($msg, self::HTTP_INTERNAL_SERVER_ERROR);
    }

    public static function respondWithError($msg = 'Error occurred', int $code = 500, array $headers = [])
    {
        return response()->json([
            'error' => [
                'messages' => is_array($msg) ? $msg : [$msg],
                'code' => $code
            ]
        ], $code, $headers, JSON_PRETTY_PRINT);
    }

    public static function respond($data, array $headers = [], $statusCode = false, $rootWrapper = 'data')
    {
        $code = $statusCode !== false ? $statusCode : 200;

        return response()->json([
            $rootWrapper => $data,
        ], $code, $headers);
    }

    public static function respondSuccess()
    {
        return response('', 204);
    }

}