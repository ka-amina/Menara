<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\SendPasswordNotification;
use Illuminate\Support\Str;

class UserRepository implements UserInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create($data){
        $randomPassword=Str::random(8);
        // dd($randomPassword);
        $user=User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'password' => bcrypt($randomPassword),
            'role'=>'interviewer'

        ]);
        
        if ($user->save()) {
            $tokenResult = $user->createToken('personal acces token');
            $token = $tokenResult->plainTextToken;

            $user->notify(
                new SendPasswordNotification(
                    $randomPassword,$user->name
                )
            );

            return response()->json([
                'message' => 'Successfully created user!',
                'accessToken' => $token,
            ], 201);
            
        } else {
            return response()->json(['error' => 'Provide proper details'], 500);
        }
    }
    public function findUserByEmail($email){
        return User::where('email',$email)->first();
    }
    public function updatePassword($user,$password){
        $user->password=bcrypt($password);
        return $user->save();
    }
    public function createOrUpdateToken($email,$token){
        $resetRequest=PasswordReset::where('email',$email)->first();
        if (!$resetRequest) {
            return PasswordReset::create([
                'email' => $email,
                'token' => $token,
            ]);
        } else {
            return $resetRequest->update([
                'token' => $token,
            ]);
        }
    }
    public function getTokenByEmail($email){
        return PasswordReset::where('email', $email)->first();
    }
    public function deleteTokenByEmail($email){
        return PasswordReset::where('email', $email)->delete();
    }
}
