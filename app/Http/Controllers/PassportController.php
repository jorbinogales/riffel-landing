<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\SocialRequest;
use App\Http\Requests\User\LoginRequest;
use App\Mail\SucessFullRegister;
use Mail;

class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request)
    {
        try { 
            $user = User::create($request->validated());
            $token = $user->createToken('personal access token')->accessToken;
            return response()->json(['token' => $token], 200);
        } catch (Exception $e){
            return $e;
        }
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try { 

            $request->validated();
            if(auth()->attempt($credentials)){
                $token = auth()->user()->createToken('Personal acces token')->accessToken;
                return response()->json(['token' => $token], 200);
            } else { 
                 return response()->json(['error' => 'UnAuthorised'], 401);
            }
        } catch (Exception $e){
            return $e;
        }
    }

     /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginWithSocial(SocialRequest $request)
    {
        try { 

            $count = User::where('email', $request->email)->count();

            if($count == 0){
                
                $user = User::create([
                    'email' => $request->email,
                    'password' => 'undefined',
                    'passport' => $request->provider,
                ]);

                $lawyer = Lawyer::create([
                    'id_usuario' => $user->id,
                    'first_name' => $request->firstName,
                    'last_name' => $request->lastName,
                    'picture' => $request->photoUrl,
                ]);

                $token = $user->createToken('personal access token')->accessToken;

                Mail::to($user->email)->send(new SucessFullRegister());     

            } else { 

                $user = User::where('email', $request->email)->first();
                $token = $user->createToken('personal access token')->accessToken;
                
            }

            return [
                'token' => $token,
            ];

        } catch (Exception $e){

            return $e;

        }
    }


    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }


    
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    { 
        try{
            auth()->user()->token()->revoke();
            return response(['message' =>  200]);
        } catch (Exception $e){
            return $e;
        }
    
    }
}