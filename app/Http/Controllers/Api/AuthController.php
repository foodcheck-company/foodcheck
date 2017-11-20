<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\{TokenExpiredException, TokenInvalidException, JWTException};
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['logout']]);
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password') + ['status' => 1];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required'
        ]);

        try {
            if (( ! $token = JWTAuth::attempt($this->credentials($request))) || ($validator->fails()))
            {
                return response()->json(['result' => false, 'error' => 'Invalid credentials'], 401);
            }

        } catch (JWTException $e) {

            return response()->json(['result' => false, 'error' => 'Could not create token'], 500);
        }

        return response()->json(['result' => true, 'token' => $token, 'id' => auth()->user()->id, 'role' => auth()->user()->role]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        JWTAuth::parseToken()->invalidate();

        return response()->json(['result'=>true]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkAuth(Request $request)
    {
        try {
            /**
             * Set current request for JWTAuth for tests
             */
            if (! $user = JWTAuth::setRequest($request)->parseToken()->authenticate()) {
                return response()->json(['result' => false, 'error' => 'user_not_found'], 404);
            }

        } catch (TokenExpiredException $e) {

            return response()->json(['result' => false, 'error' => 'token_expired'], $e->getStatusCode());

        } catch (TokenInvalidException $e) {

            return response()->json(['result' => false, 'error' => 'token_invalid'], $e->getStatusCode());

        } catch (JWTException $e) {
            return response()->json(['result' => false, 'error' => 'token_absent'], $e->getStatusCode());

        }

        return response()->json(['result' => true, 'id' => $user->id, 'role' => auth()->user()->role]);
    }

}
