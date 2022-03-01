<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Helpers\Auth\SocialiteHelper;
use Laravel\Socialite\Facades\Socialite;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Repositories\Frontend\Auth\UserRepository;

/**
 * @group Authentication
 *
 * Class AuthController
 *
 * Fullfills all aspects related to authenticate a user.
 */
class AuthController extends APIController
{
    /**
     * Attempt to login the user.
     *
     * If login is successfull, you get an api_token in response. Use that api_token to authenticate yourself for further api calls.
     *
     * @bodyParam email string required Your email id. Example: "user@test.com"
     * @bodyParam password string required Your Password. Example: "abc@123_4"
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/auth/login.json
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $credentials = $request->only(['email', 'password']);

        try {
            if (! Auth::attempt($credentials)) {
                return $this->throwValidation(trans('api.messages.login.failed'));
            }

            $user = $request->user();

            $passportToken = $user->createToken('API Access Token');

            // Save generated token
            $passportToken->token->save();

            $token = $passportToken->accessToken;
        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage());
        }

        return $this->respond([
            'message' => trans('api.messages.login.success'),
            'token' => $token,
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/auth/me.json
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(Auth::guard()->user());
    }

    /**
     * Attempt to logout the user.
     *
     * After successfull logut the token get invalidated and can not be used further.
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/auth/logout.json
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        try {
            $request->user()->token()->revoke();
        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage());
        }

        return $this->respond([
            'message' => trans('api.messages.logout.success'),
        ]);
    }

    /**
     * Social Login
     */
    public function socialLogin(Request $request,$provider)
    {
        $validation = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $userRepository = new UserRepository();

        $socialiteHelper = new SocialiteHelper();

        // If the provider is not an acceptable third party than kick back
        if (! in_array($provider, $socialiteHelper->getAcceptedProviders(), true)) {
            return $this->throwValidation(__('auth.socialite.unacceptable', ['provider' => e($provider)]));
        }

        $token = $request->input('access_token');
        //dd($token);

        // Create the user if this is a new social account or find the one that is already there.
        try {
            $user = $userRepository->findOrCreateProvider($this->getProviderUser($provider,$token), $provider);
        } catch (GeneralException $e) {
            return $this->throwValidation($e->getMessage());
        }

        if ($user === null) {
            return  $this->throwValidation(__('exceptions.frontend.auth.unknown'));
        }

        // Check to see if they are active.
        if (! $user->isActive()) {
            throw  $this->throwValidation(__('exceptions.frontend.auth.deactivated'));
        }

        // Account approval is on
        if ($user->isPending()) {
            throw  $this->throwValidation(__('exceptions.frontend.auth.confirmation.pending'));
        }

        try {


            $passportToken = $user->createToken('API Access Token');

            // Save generated token
            $passportToken->token->save();

            $token = $passportToken->accessToken;
        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage());
        }

        return $this->respond([
            'message' => trans('api.messages.login.success'),
            'token' => $token,
        ]);
    }

    /**
     * @param $provider
     *
     * @return mixed
     */
    protected function getProviderUser($provider, $token)
    {
        return Socialite::driver($provider)->userFromToken($token);
    }
}
