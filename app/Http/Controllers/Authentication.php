<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ApiResource;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class Authentication extends Controller
{
    public function Login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4'],
        ]);
        if ($validator->fails()) {
            return response()->json(new ApiResource(422, false, $validator->errors(), null), 422);
        }
        $validatedData = $validator->validated();
        if (Auth::attempt($validatedData)) {
            $user = User::where('email', $validatedData['email'])->first();
            $token = $user->createToken("token")->plainTextToken;
            return response()->json(new ApiResource(200, true, "Login Success", $token), 200);
        }
        else {            
            return response()->json(new ApiResource(401, false, "Login Failed", null), 401);
        }
    }
    
    public function Logout(Request $request) {
        
        if (Auth::user()) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();            
            $request->session()->regenerateToken();
            return response()->json(new ApiResource(200, true, "Logout Success", null), 200);
        } else {            
            return response()->json(new ApiResource(401, true, "Logout Failed", null), 401);
        }
    }    

    public function Register(Request $request) {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'min:8', Rules\Password::defaults()],
                'confirm_password' => ['required', 'min:8', 'same:password'],
                'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:12', 'unique:'.User::class],
                'role' => ['required', 'in:worker,hire']
            ]);
            if ($validator->fails()) {
                // DB::rollBack();
                return response()->json(new ApiResource(422, false, $validator->errors(), null), 422);
            }
            $validatedData = $validator->validated();
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'phone' => $validatedData['phone'],
                'role' => $validatedData['role']
            ]);
            DB::commit();
            return response()->json(new ApiResource(201, true, "Register Success", $user), 201);
            
        } catch(Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Register Failed, An Error Occurred", null), 500);
        }
    }
}
