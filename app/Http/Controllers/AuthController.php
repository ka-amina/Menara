<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\PasswordResetNotification;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if ($user->save()) {
            $tokenResult = $user->createToken('personal acces token');
            $token = $tokenResult->plainTextToken;

            return response()->json([
                'message' => 'Successfully created user!',
                'accessToken' => $token,
            ], 201);
        } else {
            return response()->json(['error' => 'Provide proper details'], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'invalid credentials'
            ], 401);
        }
        $data['token'] = $user->createToken($request->name . 'Auth-Token')->plainTextToken;
        $data['user'] = $user;
        $response = [
            'status' => 'success',
            'message' => 'user is logged in successfuly.',
            'data' => $data,
        ];
        // if ($request->expectsJson()) {
            // return response()->json($response, 200);
        // }
        // return response()->json($response, 200);
        return redirect()->route('admindashboard');
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User is logged out',
        ], 200);
    }

    public function forgot(ForgotPasswordRequest $request)
    {
        // dd($request);
        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !$user->email) {
            return response()->json([
                'status' => 'failed',
                'message' => 'no record found',
            ], 404);
        }

        // generate a 4 digit random token
        $resetPasswordToken = str_pad(random_int(1, 9999), 4, '0', STR_PAD_LEFT);

        if (!$userPassReset = PasswordReset::where('email', $user->email)->first()) {
            PasswordReset::create([
                'email' => $user->email,
                'token' => $resetPasswordToken,
            ]);
        } else {
            $userPassReset->update([
                'email' => $user->email,
                'token' => $resetPasswordToken
            ]);
        }


        $user->notify(
            new PasswordResetNotification(
                $user,
                $resetPasswordToken,
            )
        );
        

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'the code is sent to your email',
        //     // 'token'=>$resetPasswordToken,
        // ], 200);
        return redirect()->route('reset');

        
    }

    public function reset (ResetPasswordRequest $request)
    {
        $attributes = $request->validated();
        $user=User::where('email',$attributes['email'])->first();

        if(!$user){
            return response()->json([
                'status' => 'faild',
                'message' => 'no record found',
            ], 404);
        }

        $resetRequest= PasswordReset::where('email', $user->email)->first();

        if(!$resetRequest || $resetRequest->token != $request->token){
            return response()->json([
                'status' => 'faild',
                'message' => 'token mismatch',
            ], 400);
        }
        $user->fill([
            'password' => bcrypt($attributes['password'])
        ]);

        $user->save();

        $user->tokens()->delete();

        $resetRequest->delete();

        $token=$user->createToken('Auth-Token')->plainTextToken;

        
        // return response()->json([
        //     'message' => 'password Reset success',
        //     'accessToken' => $token,
        // ], 201);
        return redirect()->route('interviewerdashboard');
        
    }
}
