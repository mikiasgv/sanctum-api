<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_id' => 'required'
        ]);

        // $credentials = request(['email', 'password']);

        // if(!Auth::attempt($credentials)) {
        //     return response()->json([
        //         'status_code' => 500,
        //         'message' => 'Unauthorized'
        //     ]);
        // }


        $user = ModelsUser::where('email', $request->email)->first();

        //$tokenResult = $user->createToken('authToken')->plainTextToken;

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->device_id)->plainTextToken;
    }

    public function destroy(Request $request)
    {
        auth()->user()->tokens()->where('name', $request->device_id)->delete();
    }
}
