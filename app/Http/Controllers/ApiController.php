<?php

namespace App\Http\Controllers;

use App\Helpers\Api;
use Illuminate\Http\Request;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * ApiController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Respond not found
     *
     * @param string|array $msg
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondNotFound($msg = 'Resource not found.')
    {
        return Api::respondNotFound($msg);
    }

    /**
     * Respond that request is bad
     *
     * @param string|array $msg
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondBadRequest($msg = 'Bad request')
    {
        return Api::respondBadRequest($msg);
    }

    /**
     * Respond that not allowed
     *
     * @param string|array $msg
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondForbidden($msg = 'Forbidden.')
    {
        return Api::respondForbidden($msg);
    }

    /**
     * Return unauthorized
     *
     * @param string|array $msg
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondUnauthorized($msg = 'Unauthorized.')
    {
        return Api::respondUnauthorized($msg);
    }

    /**
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondServerError($msg = 'Internal server error.')
    {
        return Api::respondServerError($msg);
    }

    /**
     * Respond with error
     *
     * @param string|array $msg
     * @param int $code
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithError($msg = 'Some error occurred', $code = 500, array $headers = [])
    {
        return Api::respondWithError($msg, $code, $headers);
    }

    /**
     * Function for responding some data
     *
     * @param mixed $data
     * @param array $headers
     * @param bool $statusCode
     * @param string $rootWrapper
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respond($data, array $headers = [], $statusCode = false, $rootWrapper = 'data')
    {
        return Api::respond($data, $headers, $statusCode, $rootWrapper);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function respondSuccess()
    {
        return Api::respondSuccess();
    }

}
